<?php
include('ini.php');

$type = $_POST['type'];
if($type == 'card_system'){
    $inTrue = $connect->query("UPDATE System32 SET partner_id = '".$_POST['partner_id']."', partner_key = '".$_POST['partner_key']."' WHERE id = '1'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        }
} else if($type == 'momo_system'){
    $inTrue = $connect->query("UPDATE System32 SET token_momo = '".$_POST['token_momo']."' WHERE id = '1'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        }
} else if($type == 'add_bank'){
    $inTrue = $connect->query("INSERT INTO `Banks`(`id`, `name`, `chutaikhoan`, `sotaikhoan`, `toithieu`, `image`) VALUES (NULL,'".$_POST['name']."','".$_POST['chutaikhoan']."','".$_POST['sotaikhoan']."','".$_POST['toithieu']."','".$_POST['image']."')");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        }
} else if($type == 'load_atm'){
    $id = $_POST['id'];
    $query = $connect->query("SELECT * FROM Banks WHERE id = '$id'")->fetch_array();
    if($query['id'] != $id){
        echo json_api('ID Ngân Hàng Không Hợp Lệ','error');
    } else {
        echo json_encode(['name' => $query['name'], 'chutaikhoan' => $query['chutaikhoan'], 'sotaikhoan' => $query['sotaikhoan'], 'toithieu' => $query['toithieu'], 'image' => $query['image'], 'status' => 'success']);
    }
} else if($type == 'edit_bank'){
    $inTrue = $connect->query("UPDATE `Banks` SET `name`='".$_POST['name']."',`chutaikhoan`='".$_POST['chutaikhoan']."',`sotaikhoan`='".$_POST['sotaikhoan']."',`toithieu`='".$_POST['toithieu']."',`image`='".$_POST['image']."' WHERE id = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thao Tác Thành Công','success');
        echo redirect('');
    } else {
        echo swal('Thao Tác Thất Bại','error');
    }
} else if($type == 'setting'){
    $inTrue = $connect->query("UPDATE `System32` SET `modal`='".AntiXss($_POST['modal_index'])."',`title`='".$_POST['title']."',`description`='".$_POST['description']."', `sitename`='".$_POST['site_name']."',`image`='".$_POST['image']."',`shortcut_icon`='".$_POST['shortcut_icon']."',`script`='".AntiXss($_POST['script'])."' WHERE id = '1'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        } 
} else if($type == 'selectOption'){
    $inTrue = $connect->query("UPDATE `System32` SET `value_hosting`='".$_POST['hosting']."',`value_domain`='".$_POST['domain']."' WHERE id = '1'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        } 
} else if($type == 'select_home'){
    $inTrue = $connect->query("UPDATE `System32` SET `home_style`='".$_POST['theme']."' WHERE id = '1'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('');
        } else {
            echo swal('Thao Tác Thất Bại','error');
        } 
}
?>