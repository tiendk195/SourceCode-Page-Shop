<?php
include('core.php');

$type =  $_POST['type'];

if($type == 'create'){
$id = $_POST['id'];
$package = $connect->query("SELECT * FROM CpanelPackage WHERE id = '$id'")->fetch_array();
$getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$package['server']."'")->fetch_array();
$checkLimit = $connect->query("SELECT * FROM Hostings WHERE domain = '".$domain."' AND status != '2' OR status = '4' AND server = '".$getName['uname']."'")->num_rows;

$hostname = $getName['hostname'];
$whmusername = $getName['whmusername'];
$whmpassword = $getName['whmpassword'];
$ip = $getName['ip'];

$taikhoan = inThuongString('tmphostis'.RandStrings(7));
$matkhau = RandStrings(15);

$tienphaitra = $package['price'] * $_POST['hsd'];
$timehethan = time()+(2592000 * $_POST['hsd']);

if(!isset($_SESSION['users'])){
    echo json_api('Vui Lòng Đăng Nhập Để Tiếp Tục!','error');
} else if(empty($id)){
    echo json_api('Gói Hosting Bạn Chọn Không Hợp Lệ!','error');
} else if(empty($_POST['domain'])){
    echo json_api('Vui Lòng Nhập Tên Miền!','error');
} else if(empty($_POST['hsd']) || $_POST['hsd'] < 1){
    echo json_api('Hạn Đăng Ký Không Hợp Lệ!','error');
} else if($getUser['monney'] < $tienphaitra){
    echo json_api('Số Dư Không Đủ Để Thanh Toán!','error');
} else if($checkLimit == 1){
    echo json_api('Tên Miền Đã Tồn Tại Trên Máy Chủ Này!','error');
} else {
    
    $query = $hostname.':2087/json-api/createacct?api.version=1&username='.$taikhoan.'&domain='.$_POST['domain'].'&plan='.$getName['whmusername'].'_'.$package['package'].'&featurelist=jupiter&password='.$matkhau.'&ip=n&cgi=1&hasshell=1&contactemail='.$_POST['email'].'&cpmod=paper_lantern&language=vi'; 
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
    curl_setopt($curl, CURLOPT_HEADER,0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
    $header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpassword) . "\n\r";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl); 
    $data = json_decode($result, true);
    
    if ($result === false) {
        if($result == '') echo json_api('Hệ Thống Máy Chủ Này Đang Bận, Hãy Thử Lại Sau', 'error'); else echo json_api('Có lỗi xảy ra, hãy kiểm tra lại', 'error');
    } else {
        
        if(isset($data['metadata']['result'])){
             if($data['metadata']['result'] == 1){
                $inTrue = $connect->query("INSERT INTO `Hostings`(`id`, `username`, `domain`, `email`, `package`, `server`, `status`, `time`, `orvertime`, `taikhoan`, `matkhau`) VALUES (NULL,'".$getUser['username']."','".$_POST['domain']."','".$_POST['email']."','".$package['package']."','".$getName['uname']."','1','".time()."','$timehethan','$taikhoan','$matkhau')");
                if($inTrue){
                    $connect->query("UPDATE Users SET monney = monney - '".$tienphaitra."' WHERE username = '".$getUser['username']."'");
                    echo json_api('Mua Hosting Thành Công', 'success');
                } else {
                    echo json_api('Không Thể Lưu Dữ Liệu', 'error');
                }
               
        } else {
            echo json_api('Có Lỗi Xảy Ra, Hãy Thử Đăng Ký Với Tên Miền Khác', 'error');
        }
        } else {
            echo json_api('Lỗi máy chủ', 'error');
        }
        } 
        
        curl_close($curl); 
        
}

} else if($type == 'changepassword'){
    $query = $connect->query("SELECT * FROM `Hostings` WHERE `id` = '".$_POST['id']."'")->fetch_array();
    $getName = $connect->query("SELECT * FROM `ServerName` WHERE `uname` = '".$query['server']."'")->fetch_array();
    
    if(empty($_POST['id']) || $_POST['id'] != $query['id']){
        echo json_api('Dịch Vụ Không Tồn Tại','error');
    } else if($query['username'] != $getUser['username']){
        echo json_api('Bạn Không Có Quyền Quản Lý Dịch Vụ Này!','error');
    } else if(empty($_POST['password'])){
        echo json_api('Vui Lòng Nhập Mật Khẩu Mới','error');
    } else if($query['server'] != $getName['uname']) {
        echo json_api('Máy Chủ Không Còn Khả Dụng','error');
    } else {
        
        $query = $getName['hostname'].':2087/json-api/passwd?api.version=1&user='.$query['taikhoan'].'&password='.$_POST['password'].'&enabledigest=0&db_pass_update=1'; 
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $header[0] = "Authorization: Basic " . base64_encode($getName['whmusername'].":".$getName['whmpassword']) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl); 
        $data = json_decode($result, true);
        
        if ($result == false) {
          echo json_api('Đặt Lại Mật Khẩu Thất Bại! - '.$result, 'error');  
        } else {
            
            if(isset($data['metadata']['result'])){
             if($data['metadata']['result'] == 1){
                         
                    $updateTrue = mysqli_query($connect, "UPDATE Hostings SET matkhau = '".$_POST['password']."' WHERE id = '".$_POST['id']."'");
                     if($updateTrue){
                         echo json_api('Đặt Lại Mật Khẩu Thành Công!', 'success');
                     } else {
                         echo json_api('Đặt Lại Mật Khẩu Thất Bại', 'error');
                     }
                     
                 } else {
                    echo json_api('Vui Lòng Thử Với Mật Khẩu Bảo Mật Hơn', 'error');
                }
                } else {
                    echo json_api('Lỗi máy chủ', 'error');
                }
                
        
        }
        curl_close($curl); 

    }
} else if($type == 'giahan'){
        
$hsd = $_POST['hsd'];
$id = $_POST['id'];
$query = $connect->query("SELECT * FROM Hostings WHERE id = '$id'")->fetch_array();
$package = $connect->query("SELECT * FROM CpanelPackage WHERE package = '".$query['package']."'")->fetch_array();
$getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$package['server']."'")->fetch_array();
$tienphaitra = $package['price'] * $hsd;
$timedangco = $query['orvertime'];
$timesapco = 2592000 * $hsd;
$unsuspendacct = time()+(2592000*$hsd);
$tongtime = $timedangco + $timesapco;

$timesuspended = time()+(86400*3);

if($package['price'] < 1000){
    $hsd = '0';
}

if(empty($id)){
    echo json_api('Dịch Vụ Không Hợp Lệ!','error');
} else if(empty($hsd) || $hsd < 1 || $hsd > 12){
    echo json_api('hạn Dùng Không Hợp Lệ','error');
} else if($getUser['monney'] < $tienphaitra){
    echo json_api('Không Đủ Tiền Để Gia Hạn','error');
} else {
    
    if($query['status'] == '4'){
        $query = $getName['hostname'].':2087/json-api/unsuspendacct?api.version=1&user='.$query['taikhoan'].'&password='.$query['matkhau'].'&enabledigest=0&db_pass_update=1'; 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($curl, CURLOPT_HEADER,0); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $header[0] = "Authorization: Basic " . base64_encode($getName['whmusername'].":".$getName['whmpassword']) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($curl, CURLOPT_URL, $query); 
        $result = curl_exec($curl); 
        
        if ($result == false) {
            echo swal('Không Thể Kết Nối Đến Cpanel','error');
        } else {
            $inUpdate = $connect->query("UPDATE Hostings SET orvertime = '$unsuspendacct', status = '1', timesuspended = '' WHERE id = '$id'");
            if($inUpdate){
                echo json_api('Gia Hạn Thành Công!','success');
                $connect->query("UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$getUser['username']."'");
            } else {
                echo json_api('Gia Hạn Thất Bại','error');
            }
        }
        curl_close($curl);
    
    
    } else {
    
    $inUpdate = $connect->query("UPDATE Hostings SET orvertime = '$tongtime' WHERE id = '$id'");
    if($inUpdate){
        echo json_api('Gia Hạn Thành Công!','success');
        $connect->query("UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$getUser['username']."'");
    } else {
        echo json_api('Gia Hạn Thất Bại','error');
    }
    
    }
}

} else if($type == 'nangcap'){
        
    $package = $_POST['packagee'];
    $id = $_POST['id'];
    $query = $connect->query("SELECT * FROM Hostings WHERE id = '$id'")->fetch_array();
    $old_package = $connect->query("SELECT * FROM CpanelPackage WHERE package = '".$query['package']."'")->fetch_array();
    $new_package = $connect->query("SELECT * FROM CpanelPackage WHERE id = '$package'")->fetch_array();
    $getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$new_package['server']."'")->fetch_array();
    
    $tienConLai  = TruTienDichVu($query['time'], $old_package['price'], $hsd);
    $tienphaitra = $new_package['price'] - $tienConLai;
    
    if($query['status'] == '1'){
    if(empty($id) || $id != $query['id']){
        echo json_api('Dịch Vụ Không Hợp Lệ','error');
    } else if(empty($package) || $package != $new_package['id']){
        echo json_api('Gói Không Hợp Lệ','error');
    } else if(!isset($_SESSION['users'])){
        echo json_api('Vui Lòng Đăng Nhập!','error');
    } else if($getUser['monney'] < $tienphaitra){
        echo json_api('Không Đủ Tiền Để Nâng Cấp!','error');
    } else if($new_package['price'] < $old_package['price']){
        echo json_api('Bạn Phải Đăng Ký Gói Cao Hơn Gói Hiện Tại!','error');
    } else {
        
        $query = $getName['hostname'].':2087/json-api/changepackage?api.version=1&user='.$query['taikhoan'].'&pkg='.$getName['whmusername'].'_'.$new_package['package']; 
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0); 
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
        $header[0] = "Authorization: Basic " . base64_encode($getName['whmusername'].":".$getName['whmpassword']) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl); 
        
        if ($result == false) {
            echo json_api('Không Thể Kết Nối Đến WHM','error');
        } else {
            $inUpdate = mysqli_query($connect, "UPDATE `Hostings` SET `package`='".$new_package['package']."' WHERE id = '$id'");
            if($inUpdate){
                mysqli_query($connect, "UPDATE Users SET monney = monney - $tienphaitra WHERE username = '".$getUser['username']."'");
                echo json_api('Nâng Cấp Thành Công Lên Gói '.inHoaString(AntiXss($new_package['package'])),'success');
            } else {
                echo json_api('Không Thể Thực Hiện Yêu Cầu!'. $response['metadata']['reason'],'error');
            }
        }
    
    
        curl_close($curl);
    }
    
} else {
    echo json_api('Tính Năng Chỉ Khả Dụng Khi Dịch Vụ Hoạt Động','error');
}
}
?>