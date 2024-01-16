<?php
include('core.php');

$type = $_POST['type'];

if($type == '1'){
    $domain = $_POST['domain'];
    $dot = $_POST['dot'];
    $ddomain = $domain.'.'.$dot;
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $id = $_POST['id'];
    $hsd = $_POST['hsd'];
    $query = $connect->query("SELECT * FROM Products WHERE id = '$id'")->fetch_array();    
    $dots = $connect->query("SELECT * FROM Dots WHERE dot = '$dot'")->fetch_array();
    $checkLimit = $connect->query("SELECT * FROM `DanhSachWeb` WHERE `domain` = '$ddomain' AND (status = '0' OR status = '1')")->num_rows;
    
    $orvertime = time()+(2592000 * $hsd);
    $expo = $query['price'] * $hsd;
    $tienphaitra = $expo + $dots['price'];
    
    if($id != $query['id']){
        echo json_api('ID Giao Diện Không Hợp Lệ','error');
    } else if(empty($domain)){
        echo json_api('Vui Lòng Nhập Miền','error');
    } else if(empty($dot)){
        echo json_api('Vui Lòng Chọn Đuôi Miền','error');
    } else if($hsd < 1){
        echo json_api('Vui Lòng Chọn Hạn Sử Dụng','error');
    } else if(empty($taikhoan) || empty($matkhau)){
        echo json_api('Vui Lòng Nhập Tài Khoản & Mật Khẩu','error');
    } else if($getUser['monney'] < $tienphaitra) {
        echo json_api('Không Đủ Tiền Để Thanh Toán!','error');
    } else if($dots['dot'] != $dot) {
        echo json_api('Đuôi Miền Không Hợp Lệ','error');
    } else if($checkLimit >= 1){
        echo json_api('Tên Miền Đã Được Sử Dụng','error');
    } else {
        $inTrue = $connect->query("INSERT INTO `DanhSachWeb`(`id`, `username`, `domain`, `taikhoan`, `matkhau`, `status`, `theme`, `time`, `orvertime`) VALUES (NULL,'".$getUser['username']."','".AntiXss($domain.'.'.$dot)."','".AntiXss($taikhoan)."','".AntiXss($matkhau)."','0','$id','".time()."','$orvertime')");
        if($inTrue){
            $connect->query("UPDATE `Users` SET `monney`=`monney` - '$tienphaitra' WHERE `username` = '".$getUser['username']."'");
            echo json_api('Thanh Toán Thành Công, Đơn Hàng Đang Được Xử Lí','success');
        } else {
            echo json_api('Không Thể Xử Lí','error');
        }
        
    }
} else if($type == '2'){
    $id = $_POST['id'];
    $magiamgia = $_POST['magiamgia'];
    $query = $connect->query("SELECT * FROM SourceCode WHERE id = '$id'")->fetch_array();
    $tienphaitra = $query['price'];

    if($id != $query['id']){
        echo json_api('Mã Nguồn Không Tồn Tại','error');
    } else if(!empty($magiamgia)){
        $checkcode = $connect->query("SELECT * FROM `MaGiamGia` WHERE `code` = '$magiamgia'")->fetch_array();
        if($checkcode['code'] != $magiamgia){
         echo json_api('Mã Giảm Giá Không Hợp Lệ','error');   
         $code = false;
        } else if($checkcode['luotdung'] >= $checkcode['gioihan']){
            echo json_api('Mã Giảm Giá Đã Hết Lượt Sử Dụng','error');   
            $code = false;
        } else {
            if($checkcode['loai'] == 'tien'){
                $tienphaitra = $tienphaitra - $checkcode['amount'];
            } else if($checkcode['loai'] == 'phantram'){
                $tienphaitra = checkGia($tienphaitra, $checkcode['amount']);
            }
            
            if($getUser['monney'] < $tienphaitra){
                echo json_api('Không Đủ Tiền Để Thanh Toán!','error');
            } else {
                 $inTrue = $connect->query("INSERT INTO `DanhSachCode`(`id`, `username`, `name`, `theme`, `time`, `price`) VALUES (NULL,'".$getUser['username']."','".$query['name']."','".$query['id']."','".time()."','$tienphaitra')");
                if($inTrue){
                    $connect->query("UPDATE `MaGiamGia` SET `luotdung`=`luotdung` + '1' WHERE `code` = '$magiamgia'");
                    $connect->query("UPDATE `Users` SET `monney`=`monney` - '$tienphaitra' WHERE `username` = '".$getUser['username']."'");
                    echo json_api('Mua Mã Nguồn Thành Công','success');
                } else {
                    echo json_api('Không Thể Xử Lí','error');
                }
            }
            
           
        }
        
    } else {
         if($getUser['monney'] < $tienphaitra){
                echo json_api('Không Đủ Tiền Để Thanh Toán!','error');
            } else {
                 $inTrue = $connect->query("INSERT INTO `DanhSachCode`(`id`, `username`, `name`, `theme`, `time`, `price`) VALUES (NULL,'".$getUser['username']."','".$query['name']."','".$query['id']."','".time()."','$tienphaitra')");
                if($inTrue){
                    $connect->query("UPDATE `Users` SET `monney`=`monney` - '$tienphaitra' WHERE `username` = '".$getUser['username']."'");
                    echo json_api('Mua Mã Nguồn Thành Công','success');
                } else {
                    echo json_api('Không Thể Xử Lí','error');
                }
            }
    }
    
    
} else if($type == '3'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $query = $connect->query("SELECT * FROM MauLogo WHERE id = '$id'")->fetch_array();
    $tienphaitra = $query['price'];
    
    if($id != $query['id']){
        echo json_api('Mẫu Logo Không Hợp Lệ','error');
    } else if(empty($name)){
        echo json_api('Vui Lòng Nhập Tên Logo','error');
    } else if($getUser['monney'] < $tienphaitra){
        echo json_api('Không Đủ Số Dư Để Thanh Toán','error');
    } else {
        $inTrue = $connect->query("INSERT INTO `DanhSachLogo`(`id`, `username`, `name`, `theme`, `status`, `time`, `logo_output`) VALUES (NULL,'".$getUser['username']."','".$_POST['name']."','".$_POST['id']."','0','".time()."', ' ')");
        if($inTrue){
            $connect->query("UPDATE `Users` SET `monney`=`monney` - '$tienphaitra' WHERE `username` = '".$getUser['username']."'");
            echo json_api('Thanh Toán Thành Công, Đơn Hàng Đang Được Xử Lí','success');
        } else {
            echo json_api('Không Thể Xử Lí','error');
        }
    }
} else if($type == '4'){
    $id = $_POST['id'];
    $hsd = $_POST['hsd'];
    $query = $connect->query("SELECT * FROM DanhSachWeb WHERE id = '$id'")->fetch_array();
    $product = $connect->query("SELECT * FROM Products WHERE id = '".$query['theme']."'")->fetch_array();
    $tienphaitra = $product['price'] * $hsd;
    $timenew = $query['orvertime'] + 2592000 * $hsd;
    
    if($id != $query['id']){
        echo json_api('Đơn Hàng Không Hợp Lệ','error');
    } else if($hsd < 1) {
        echo json_api('Hạn Sử Dụng Không Hợp Lệ','error');
    } else if($getUser['monney'] < $tienphaitra) {
        echo json_api('Không Đủ Số Dư Để Thanh Toán','error');
    } else {
        $inTrue = $connect->query("UPDATE DanhSachWeb SET orvertime = '$timenew' WHERE id = '$id'");
        if($inTrue){
            $connect->query("UPDATE `Users` SET `monney`=`monney` - '$tienphaitra' WHERE `username` = '".$getUser['username']."'");
            echo json_api('Gia Hạn Thành Công '.$hsd.' Tháng','success');
        } else {
            echo json_api('Không Thể Xử Lí','error');
        }
    }
}
?>