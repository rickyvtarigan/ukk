<?php 

session_start();

require_once "../../config/db.php";
require_once "../functions/UserFunction.php";


// Tambah User
if(isset($_POST['tambah_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $userLevel = mysqli_real_escape_string($db, $_POST['user_level']);

    $no_telp = isset($_POST['no_telp']) ? mysqli_real_escape_string($db, $_POST['no_telp']) : $_POST['no_telp'];
    $poli = isset($_POST['poli']) ? mysqli_real_escape_string($db, $_POST['poli']) : $_POST['poli'];


    
    $user = checkUser($username); // klo ada false, klo gda true
    $level_ondb = $db->query("SELECT * FROM user_level WHERE level='$userLevel'")->fetch_object();

    // 1. cek jika username sudah ada
    if(!$user) {
        $_SESSION['add_fail'] = true;
        header("Location:../../pages/index.php?act=daftarUser");
        exit();
    };


    // KETIKA LEVEL = DOKTER
    if($userLevel == 'dokter') {
        // ADD DOKTER
        $user = addUser($password, $username, $level_ondb);
        $dokter = addDokter($username, $poli, $no_telp);

        if(!$user && !$dokter) {
            $_SESSION['fail'] = true;
            header("Location:../../pages/index.php?act=daftarUser");
            exit();
        }
        header("Location:../../pages/index.php?act=daftarUser");
    } else {
        $_SESSION['success_add'] = true;
        $user = addUser($password, $username, $level_ondb);
        header("Location:../../pages/index.php?act=daftarUser");
    }

}


// Edit User
if(isset($_POST['edit_user'])) {
    global $db;
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $userLevel = mysqli_real_escape_string($db, $_POST['user_level']);
    $idUser = $_POST['id_user'];

    if(!$idUser) {
        $_SESSION['edit_fail'] = true;
        header("Location:../pages/index.php?auth=admin&act=daftarUser");
        exit();
    }

    if($userLevel == 'Hak Akses') {
        $_SESSION['edit_fail'] = true;
        header("Location:../pages/index.php?auth=admin&act=daftarUser");
        exit();
    }

    $getLevel = $db->query("SELECT id_level FROM user_level WHERE level = '$userLevel'")->fetch_object();
    $sql = "UPDATE user SET username='$username', password='$password', id_level='$getLevel->id_level' WHERE id_user = '$idUser'";
    $query = $db->query($sql);
    
    if($query) {
        $_SESSION['update_success'] = true;
        header("Location:../../pages/index.php?auth=admin&act=daftarUser");
        exit();
    }

}


// Hapus User
if(isset($_GET['id'])) {
    $idUser = $_GET['id'];


    // ambil data user dan cek jika role = dokter dan munculkan alert 
    $getUser = $db->query("SELECT username, level FROM user JOIN user_level ON user.id_level = user_level.id_level WHERE id_user = '$idUser'")->fetch_object();
    


    if($getUser->level === 'dokter') {
        $_SESSION['ask_alert'] = true;

        

        header('Location:../../pages/index.php?auth=admin&act=daftarUser');
        exit();
    }

        
    // query hapus user
    $query = $db->query("DELETE FROM user WHERE id_user = '$idUser'");

    // kalau gagal
    if(!$query) {
        header('Location:../../pages/index.php?auth=admin&act=daftarUser');
        exit();
    }

    $_SESSION['deleteUser_success'] = true;
    header('Location:../../pages/index.php?auth=admin&act=daftarUser');
}