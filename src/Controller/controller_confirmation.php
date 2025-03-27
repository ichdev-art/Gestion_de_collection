<?php 

session_start();

if(isset($_SESSION['user_id'])){
    header('Location: controller_profil.php');
    exit;
}

include_once '../View/view_confirmation.php' 

?>