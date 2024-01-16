<?php
include('core.php');

$type = $_POST['type'];

if($type == 'login'){
    $gettrueAcc = $connect->query("SELECT * FROM Users WHERE username = '".AntiXss($_POST['username'])."' AND password = '".AntiXss(md5($_POST['password']))."'")->num_rows;
    
    if(empty($_POST['username'])){
       echo json_api('Vui lòng nhập tên đăng nhập!', 'error');
    } else if(empty($_POST['password'])){
        echo json_api('Vui lòng nhập mật khẩu!', 'error');
    } else if($gettrueAcc == 1) {
        echo json_api('Đăng nhập thành công!', 'success');
        $_SESSION['users'] = AntiXss($_POST['username']);
    } else {
        echo json_api('Đăng nhập thất bại!','error');
    }
} else if($type == 'register'){
    
    $limitCheck = $connect->query("SELECT * FROM Users WHERE username = '".AntiXss($_POST['username'])."' OR email = '".AntiXss($_POST['email'])."'")->num_rows;
    
    if(empty($_POST['username'])){
         echo json_api('Vui lòng nhập tên đăng nhập!', 'error');
    } else if(empty($_POST['password'])){
         echo json_api('Vui lòng nhập mật khẩu!', 'error');
    } else if(empty($_POST['email'])){
         echo json_api('Vui lòng nhập email!', 'error');
    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo json_api('Email không hợp lệ, vui lòng đổi email khác!', 'error');
    } else if($limitCheck >= 1){
        echo json_api('Thông tin đăng ký đã được sử dụng!','error');
    } else {
        $inTrue = $connect->query("INSERT INTO `Users`(`id`, `username`, `password`, `email`, `monney`, `time`, `level`, `date_online`) VALUES (NULL,'".AntiXss($_POST['username'])."','".AntiXss(md5($_POST['password']))."','".AntiXss($_POST['email'])."','0','".time()."',NULL,NULL)");
        if($inTrue){
            echo json_api('Đăng ký tài khoản thành công!', 'success');
            $_SESSION['users'] = AntiXss($_POST['username']);
        } else {
            echo json_api('Không thể lưu dữ liệu', 'error');
        }
    }
} else if($type == 'forgotpassword'){
    $query = $connect->query("SELECT * FROM Users WHERE email = '".$_POST['email']."'");
    $checkUser = $query->num_rows;
    $fetch = $query->fetch_array();
    if($_SESSION['counts'] >= 2){
        echo json_api('Bạn Đã Yêu Cầu Mật Khẩu Mới Quá Số Lần Trong 1 Lúc','error');
    } else {
        if($checkUser < 1){
            echo json_api('Không Tìm Thấy Tài Khoản Liên Kết Với Email Này','error');
        } else {
            $newPassword = RandStrings(12);
            $connect->query("UPDATE Users SET password = '".md5($newPassword)."' WHERE username = '".$fetch['username']."'");
    
            $siteDomain = $_SERVER['HTTP_HOST'];
            $content = 'Xin Chào '.$fetch['name'].', Bạn Vừa Yêu Cầu Đặt Lại Mật Khẩu <br> 
            - Mật Khẩu Mới Của Bạn Là: '.$newPassword.'<br>
            - IP Yêu Cầu: '.$_SERVER['REMOTE_ADDR'].'<br>
            <strong style="color: red"> Cảnh Báo: Nếu Bạn Không Thực Hiện Thao Tác Này Hãy Kiểm Tra Lại Các Thông Tin Đăng Nhập Của Tài Khoản Ngay Bây Giờ </strong> <br>
            <strong style="color: blue"> '.inHoaString($siteDomain).' Hân Hạn Được Phục Vụ Quý Khách </strong>';
            
            $receiverName = 'Khôi Phục Mật Khẩu - '.inHoaString($siteDomain);
            $receiverEmail = $fetch['email'];
            $subject = 'Khôi Phục Mật Khẩu - '.inHoaString($siteDomain);
            $bccEmail = $siteDomain;
            $senderName = inHoaString($siteDomain);
            $smtpUsername = 'nguyenthanhflex@gmail.com';
            $smtpPassword = 'vfqwneejwzwafddv';
    
    
            if (sendEmail($receiverEmail, $receiverName, $subject, $content, $bccEmail)) {
                echo json_api('Chúng Tôi Đã Gửi Email Đặt Lại Mật Khẩu Cho Bạn!','success');
                $_SESSION['counts']+=1;
            } else {
                 echo json_api('Không Thể Gửi Email!','error');
            }
        }
    } 
}
?>