<?php
include('ini.php');
$type = $_POST['type'];

if($type == 'them_danh_muc'){
    $inTrue = $connect->query("INSERT INTO `DanhMuc`(`id`, `name`, `image`, `time_date`) VALUES (NULL,'".$_POST['name']."','".$_POST['image']."','".time()."')");
    if($inTrue){
        echo swal('Thêm danh mục thành công','success');
        echo redirect('./giaodien.php');
    } else {
        echo swal('Không thể xử lí','error');
    }
} else if($type == 'themgiaodien'){
    $inTrue = $connect->query("INSERT INTO `Products`(`id`, `danhmuc`, `name`, `description`, `image`, `images`, `price`) VALUES (NULL,'".$_POST['id']."','".$_POST['name']."','".$_POST['description']."','".$_POST['image']."','NULL','".$_POST['price']."')");
    if($inTrue){
        echo swal('Thêm giao diện thành công','success');
    } else { 
        echo swal('Không thể xử lí','error');
    }
} else if($type == 'edit_category'){
    
     $inTrue = $connect->query("UPDATE `DanhMuc` SET `name`='".$_POST['name']."',`image`='".$_POST['image']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Thêm giao diện thành công','success');
    } else {
        echo swal('Không thể xử lí','error');
    }
} else if($type == 'load_info'){
    $query = $connect->query("SELECT * FROM DanhSachWeb WHERE id = '".$_POST['id']."'")->fetch_array();
    if($query['id'] != $_POST['id']){
        echo json_api('Không Tìm Thấy Thông Tin','error');
    } else {
        echo json_encode(['dmmm' => $query['status'] ,'note' => $query['ghichu'], 'domain' => $query['domain'], 'username' => $query['username'], 'theme' => $query['theme'], 'taikhoan' => $query['taikhoan'], 'matkhau' => $query['matkhau'], 'orvertime' => ToTime($query['orvertime'])]);
    }
} else if($type == 'edit_theme'){
    $inTrue = $connect->query("UPDATE `Products` SET `name`='".$_POST['name']."',`description`='".$_POST['description']."',`image`='".$_POST['image']."',`price`='".$_POST['price']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Cập nhật giao diện thành công','success');
        echo redirect('');
    } else {
        echo swal('Không thể xử lí','error');
    }
} else if($type == 'update_web'){
    $inTrue = $connect->query("UPDATE `DanhSachWeb` SET `status`='".$_POST['status']."', `ghichu`='".$_POST['note']."' WHERE `id` = '".$_POST['id']."'");
    if($inTrue){
        echo swal('Cập nhật thành công','success');
        echo redirect('');
    } else {
        echo swal('Không thể xử lí','error');
    }
}
?>