<?php
include('../system/config.php');

    $requestid = $_GET['request_id'];
    $status = $_GET['status'];
    $amount = $_GET['amount'];

    if($status == '1'){
        $getUU = $connect->query("SELECT * FROM `DataCard` WHERE `requestid` = '".$requestid."'")->fetch_array();
    	$connect->query("UPDATE DataCard SET `status` = '1' WHERE `requestid` = '".$requestid."'");
    	$connect->query("UPDATE Users SET `monney` = `monney` + '".$amount."' WHERE `username` = '".$getUU['username']."'");
    } else {
        $connect->query("UPDATE DataCard SET `status` = '2' WHERE `requestid` = '".$requestid."'");
    }

?>