<?php 
session_start(); // start session

// import
require_once '../src/functions/HelperFunction.php';

// validasi auth
if(!isset($_SESSION['user'])) {
    header("Location:".BASE_URL."pages/login.php");
}

$authUser = isset($_GET['auth']) ? $_GET['auth'] : false;

// ketika query get authUser kosong
if($authUser == '') {
    $authUser = 'admin';

}
?>


<!-- HTML  -->
<?php include_once '../components/header.php'; ?>
<?php include $authUser ? $authUser . ".php" : "" ?>
<?php include_once "../components/footer.php" ?>
<!-- HTML  -->