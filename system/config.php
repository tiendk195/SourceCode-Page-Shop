<?php
session_start();

$localhost = 'localhost';
$database = 'topc5io3j0i_mphat';
$userbase = 'topc5io3j0i_mphat';
$passbase = 'topc5io3j0i_mphat';

$connect = mysqli_connect($localhost, $database, $userbase, $passbase) or die('Không Thể Kết Nối Đến Cơ Sở Dữ Liệu :D');;
$connect->query("SET NAMES 'UTF8'");
date_default_timezone_set('Asia/Ho_Chi_Minh'); 

if(isset($_SESSION['users'])){
    $getUser = $connect->query("SELECT * FROM Users WHERE username = '".$_SESSION['users']."'")->fetch_array();
    if($_SESSION['users'] != $getUser['username']){
        unset($_SESSION['users']);
    }
    
    $connect->query("UPDATE `Users` SET `date_online`='".time()."'WHERE username = '".$getUser['username']."'");
}

function distanceTime($thoiDiem){
    $thoiGianHienTai = time();
    $khoangCach = $thoiGianHienTai - $thoiDiem;

    if ($khoangCach < 60) {
        return $khoangCach . " giây trước";
    } elseif ($khoangCach < 3600) {
        return round($khoangCach / 60) . " phút trước";
    } elseif ($khoangCach < 86400) {
        return round($khoangCach / 3600) . " giờ trước";
    } else {
        return round($khoangCach / 86400) . " ngày trước";
    }
}

function json_api($text, $status){
    echo json_encode(['message' => $text, 'status' => $status]);
}

function sendEmail($receiverEmail, $receiverName, $subject, $content, $bccEmail){
    global $smtpUsername, $smtpPassword;
    
    include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.smtp.php';
    include $_SERVER['DOCUMENT_ROOT'].'/SMTP/PHPMailerAutoload.php';
    include $_SERVER['DOCUMENT_ROOT'].'/SMTP/class.phpmailer.php';

    // Sử dụng thư viện PHPMailer
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0; // Bật chế độ debug ở mức 0 để tắt debug hoàn toàn
    $mail->Debugoutput = "html"; // Ghi lại thông tin debug dưới dạng HTML
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername; // Địa chỉ email Gmail gửi
    $mail->Password = $smtpPassword; // Mật khẩu email Gmail gửi
    $mail->SMTPSecure = 'tls';
    $mail->protocol = 'mail';
    $mail->Port = 587;
    $mail->setFrom($smtpUsername, $bccEmail);
    $mail->addAddress($receiverEmail, $receiverName);
    $mail->addReplyTo($smtpUsername, $bccEmail);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $content;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}

function calculatePercentage($amount, $percentage) {
    return ($amount * $percentage) / 100;
}

function tinhNgay($time, $timedn){
    $ngayMua = new DateTime("@" . $time);
    $ngayHetHan = new DateTime("@" . $timedn);
    $soNgay = $ngayHetHan->diff($ngayMua)->days;
    
    return $soNgay;
}

function checkGia($price, $giam) {
    $result = $price - ($price * ($giam / 100));
    return $result;
}

function TruTienDichVu($time, $amount, $hsd){
$ngayMua = $time; 
$ngayHienTai = time(); 
$soNgay = floor(($ngayHienTai - $ngayMua) / (60 * 60 * 24));

$giaDichVu = $amount; 
$tienConDu = max(0, $giaDichVu - ($soNgay * ($giaDichVu / $hsd)));
return $tienConDu;
}

function ToTime($time){
    return date('d/m/Y - h:i:s', $time);
}

function inHoaString($text){
    return strtoupper($text);
}

function inOneString($text){
    return ucwords($text);
}

function inThuongString($text){
    return strtolower($text);
}

function redirect($url){
    return('<meta http-equiv="refresh" content="0;url='.$url.'">');
}

function ReturnXss($text){
    return htmlspecialchars_decode($text, ENT_QUOTES);
}

function AntiXss($text){
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function Monney($monney){
    return str_replace(".", ",", number_format($monney));
}

function swal($text, $status){
    return '<script>swal("Thông Báo", "'.$text.'", "'.$status.'");</script>';
}


function StatusAdminHost($status){
    if($status == 'on'){
        echo '<span class="badge bg-info"> Hiển Thị </span>';
    } else {
         echo '<span class="badge bg-danger"> Ẩn </span>';
    }
}


function Title($text){
    return '<title> '.$text.' </title>';
}

function checkSession(){
    if(!isset($_SESSION['users'])){
        echo redirect('/Login');
        exit;
    }
}


function StatusHost($status){
    if($status == '0'){
        return '<div class="badge space-x-2.5 rounded-full bg-info/10 text-info dark:bg-info/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Đang Xử Lí </span></div>';
    } else if($status == '1'){
        return '<div class="badge space-x-2.5 rounded-full bg-success/10 text-success dark:bg-success/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Hoạt Động </span></div>';
    } else if($status == '2'){
        return '<div class="badge space-x-2.5 rounded-full bg-danger/10 text-danger dark:bg-danger/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Hết Hạn </span></div>';
    } else if($status == '3'){
        return '<div class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warni/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Tạm Khóa  </span></div> ';
    } else if($status == '4'){
        return '<div class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warni/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Chờ Gia Hạn </span></div>';
    } else if($status == '5'){
        return '<div class="badge space-x-2.5 rounded-full bg-danger/10 text-danger dark:bg-danger/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Bị Khóa </span></div>';
    } else if($status == '6'){
        return '<div class="badge space-x-2.5 rounded-full bg-danger/10 text-danger dark:bg-danger/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Không Khả Dụng </span></div>';
    } else {
        return '<div class="badge space-x-2.5 rounded-full bg-danger/10 text-danger dark:bg-danger/15"><div class="h-2 w-2 rounded-full bg-current"></div><span> Không Xác Định </span></div>';
    }
}


function StatusLogo($status, $id){
    if($status == '0'){
        return '<button style="background-color:#FFCC33;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Đang Tạo </button>';
    } else if($status == '1'){
        return '<button style="background-color:#1db35c;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Hoàn Thành </button>';
    } else if($status == '2'){
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Bị Hủy </button>';
    } else {
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Không Xác Định </button>';
    }
}

function StatusShop($status, $id){
    if($status == '0'){
        return '<button style="background-color:#FFCC33;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Đang Tạo </button>';
    } else if($status == '1'){
        return '<button style="background-color:#1db35c;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Hoạt Động </button>';
    } else if($status == '2'){
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Chờ Gia Hạn </button>';
    } else if($status == '3'){
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Hết Hạn </button>';
    } else if($status == '4'){
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Bị Hủy </button>';
    } else if($status == '5'){
        return '<button style="background-color:#FFCC33;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Đang Xét Duyệt </button>';
    } else {
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Không Xác Định </button>';
    }
}

function StatusMomo($status){
    if($status == '0'){
        return '<button style="background-color:#FFCC33;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Đang Xử Lí </button>';
    } else if($status == '1'){
        return '<button style="background-color:#1db35c;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Hoàn Thành </button>';
    } 
}

function StatusCard($status){
     if($status == '0'){
        return '<button style="background-color:#FFCC33;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Đang Xử Lí </button>';
    } else if($status == '1'){
        return '<button style="background-color:#1db35c;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Thẻ Đúng </button>';
    } else if($status == '2'){
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Thẻ Sai </button>';
    } else {
        return '<button style="background-color:#fd6074;" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"> Không Xác Định</button>';
    }
}


function StatusDomain($status){
    if($status == '0'){
        return '<button class="btn btn-primary"> Đang Xử Lý </button>';
    } else if($status == '1'){
        return '<button class="btn btn-success"> Hoạt Động </button>';
    } else if($status == '2'){
        return '<button class="btn btn-danger"> Hết Hạn </button>';
    } else if($status == '3'){
        return '<button class="btn btn-danger"> Bị Hủy </button>';
    } else if($status == '4'){
        return '<button class="btn btn-danger"> Bị Hủy & Hoàn Tiền </button>';
    } else {
        return '<button class="btn btn-danger"> Không Xác Định </button>';
    }
}


function RandStrings($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}

$system32 = $connect->query("SELECT * FROM System32 WHERE id = '1'")->fetch_array();

?>
