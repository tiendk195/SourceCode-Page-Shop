<?php
include('../system/config.php');

if(!isset($_SESSION['users'])){
    die('Bạn Không Có Quyền Truy Cập =))');
} else if($getUser['level'] != 'admin'){
    die('Bạn Không Có Quyền Truy Cập =))');
} 

$cpActive = $connect->query("SELECT * FROM DanhSachWeb WHERE status = '1'")->num_rows;
$cpExpires = $connect->query("SELECT * FROM DanhSachWeb WHERE status = '2'")->num_rows;
$domainList = $connect->query("SELECT * FROM DanhSachLogo WHERE status = '1'")->num_rows;
$domainPending = $connect->query("SELECT * FROM DanhSachLogo WHERE status = '0'")->num_rows;
$dataUser = $connect->query("SELECT * FROM `Users`");
$usersGetAll = $dataUser->num_rows;

foreach($dataUser as $row){
    $monneyUser = $monneyUser + $row['monney'];
}

$getCard = $connect->query("SELECT * FROM DataCard WHERE status = '1' AND date = '".date('d/m/Y')."'");
foreach($getCard as $row){
    $doanhThuCard = $doanhThuCard + $row['amount'];
}

$getMomo = $connect->query("SELECT * FROM TranIDMomo WHERE status = '1' AND date = '".date('d/m/Y')."'");
foreach($getMomo as $row){
    $doanhThuMomo = $doanhThuMomo + $row['amount'];
}

$doanhThuToday = $doanhThuCard + $doanhThuMomo;


$getCard2 = $connect->query("SELECT * FROM DataCard WHERE status = '1' AND date = '".date('d/m/Y')."'");
foreach($getCard2 as $row){
    $doanhThuCard2 = $doanhThuCard2 + $row['amount'];
}

$getMomo2 = $connect->query("SELECT * FROM TranIDMomo WHERE status = '1' AND date = '".date('d/m/Y')."'");
foreach($getMomo2 as $row){
    $doanhThuMomo2 = $doanhThuMomo2 + $row['amount'];
}

$tongDoanhThu = $doanhThuCard2 + $doanhThuMomo2;
?>