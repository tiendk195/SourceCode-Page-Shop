<?php
include('ini.php');

$type = $_POST['type'];

if($type == 'them_code'){
    $inTrue = $connect->query("INSERT INTO `SourceCode`(`id`, `name`, `description`, `price`, `code`, `image`) VALUES (NULL,'".$_POST['name']."','".$_POST['description']."','".$_POST['price']."','".$_POST['code']."','".$_POST['image']."')");
    if($inTrue){
        echo swal('Thêm Mã Nguồn Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thêm thất bai','error');
    }
} else if($type == 'edit_code'){
    $inTrue = $connect->query("UPDATE `SourceCode` SET `name`='".$_POST['name']."',`description`='".$_POST['description']."',`price`='".$_POST['price']."',`code`='".$_POST['code']."',`image`='".$_POST['image']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thao Tác Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thao Tác thất bai','error');
    }
}
?>