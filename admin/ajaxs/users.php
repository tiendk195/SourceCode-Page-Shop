<?php
include('ini.php');

$type = $_POST['type'];

if($type == 'edit_users'){
    $inTrue = $connect->query("UPDATE `Users` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`level`='".$_POST['level']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thao Tác Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thao Tác Thất Bại','error');
    }
} else if($type == 'edit_monney'){
    if($_POST['type_ac'] == 'cong'){
        $inTrue = $connect->query("UPDATE `Users` SET `monney`=`monney` + '".$_POST['monney']."' WHERE `id` = '".$_POST['id']."'");
        if($inTrue){
            echo swal('Cộng Thành Công ('.Monney($_POST['monney']).')!','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        }
    } else {
    $inTrue = $connect->query("UPDATE `Users` SET `monney`=`monney` - '".$_POST['monney']."' WHERE `id` = '".$_POST['id']."'");
        if($inTrue){
            echo swal('Trừ Thành Công ('.Monney($_POST['monney']).')!','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        }
    }
}
?>