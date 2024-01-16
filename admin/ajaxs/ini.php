<?php
include('../../system/config.php');

if(!isset($_SESSION['users'])){
    echo json_api('Login?', 'error');
} else if($getUser['level'] != 'admin'){
    echo json_api('Level User?', 'auth_die');
} 

?>