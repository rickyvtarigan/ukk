<?php 

// -----> AUTH FUNCTION <-----
session_start();
require_once "HelperFunction.php";



// function login
function login(string $username, string $password) {
    global $db;


    // validasi jika username salah 
    $isValidUsername = getUserByUsername($username);

    if(!$isValidUsername) {
        $_SESSION['username_fail'] = true;
        header("Location:".BASE_URL."pages/login.php");
        exit();
    }

    // validasi jika password salah
    $isValidPassword = checkPassword($isValidUsername, $password);


    if(!$isValidPassword) {
        $_SESSION['password_fail'] = true;
        header("Location:".BASE_URL."pages/login.php");
        exit();
    }

    $date = date("Y-m-d H:i:s"); 
    $updateOnLogin = $db->query("UPDATE user SET on_login='$date' WHERE username='$username'");

    // ketika lolos kedua validasi
    if($isValidUsername->level == 'dokter') {
        $_SESSION['user'] = $isValidUsername;
        header("Location:".BASE_URL."pages/index.php?auth=dokter");
    }
    if($isValidUsername->level == 'admin') {
        $_SESSION['user'] = $isValidUsername;
        header("Location:".BASE_URL."pages/index.php?auth=".$isValidUsername->level);
    }

}

















// function pendukung
function getUserByUsername(string $username) {
    global $db;

    $user = $db->query("SELECT * FROM user JOIN user_level ON user.id_level = user_level.id_level WHERE username='$username'");

    // kalau tidak ada
    if(!$user) {
        return false;
    }

    return $user->fetch_object();
}


function checkPassword($userAccount, string $password) {
    global $db;

    $user = $db->query("SELECT * FROM user WHERE username='$userAccount->username'")->fetch_object();

    // ketika password salah
    if(!password_verify($password, $user->password)) {
        return false;
    }    

    return true;
}