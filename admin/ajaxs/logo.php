<?php
include('ini.php');
$type = $_POST['type'];

if($type == 'them_logo'){
    $inTrue = $connect->query("INSERT INTO `MauLogo`(`id`, `name`, `image`, `price`) VALUES (NULL,'".$_POST['name']."','".$_POST['image']."','".$_POST['price']."')");
    if($inTrue){
        echo swal('Thêm Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thêm Thất Bại','error');
    }
} else if($type == 'load_info'){
    $query = $connect->query("SELECT * FROM DanhSachLogo WHERE id = '".$_POST['id']."'")->fetch_array();
    $theme = $connect->query("SELECT * FROM MauLogo WHERE id = '".$query['theme']."'")->fetch_array();
    if($query['id'] != $_POST['id']){
        echo json_api('Không Tìm Thấy Thông Tin','error');
    } else {
        echo json_encode(['dmmm' => $query['status'] ,'logo_output' => $query['logo_output'], 'name' => $query['name'], 'username' => $query['username'], 'name_theme' => $theme['name'], 'image_theme' => $theme['image']]);
    }
} else if($type == 'update_logo'){
    $inTrue = $connect->query("UPDATE `DanhSachLogo` SET `status`='".$_POST['status']."', `logo_output`='".$_POST['note']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thao Tác Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thao Tác','error');
    }
} else if($type == 'edit_logo'){
    $inTrue = $connect->query("UPDATE `MauLogo` SET `name`='".$_POST['name']."',`image`='".$_POST['image']."',`price`='".$_POST['price']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thao Tác Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thao Tác','error');
    }
}
?>