<?php 

// import 
require_once '../../config/db.php';
require_once "../functions/AuthFunction.php";


// ambil data dari form login
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// jalankan function Auth
login($username, $password);