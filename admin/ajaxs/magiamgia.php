<?php
include('ini.php');

    if(empty($_POST['code'])){
        $code = RandStrings(10);
    } else {
        $code = $_POST['code'];
    }
    
    $inTrue = $connect->query("INSERT INTO `MaGiamGia`(`id`, `code`, `gioihan`, `luotdung`, `loai`, `amount`) VALUES (NULL,'".$code."','".$_POST['gioihan']."','0','".$_POST['type']."','".$_POST['amount']."')");
    if($inTrue){
        echo swal('Thao tác thành công','success');
        echo redirect('');
    } else {
        echo swal('Thao tác thất bại','error');
    }

?>