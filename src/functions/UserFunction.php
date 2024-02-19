<?php 

require_once "../../config/db.php";


function createId() {
    $day = getdate()['mday'];
    $month = getdate()['mon'];
    $year = getdate()['year'];
    $time = time();

    $id = "{$day}{$month}{$year}{$time}";

    return $id;
}     


function checkUser(string $username) {
    global $db;

    $result = $db->query("SELECT * FROM user WHERE username='$username'")->fetch_object();

    if(!$result) {
        return true;
    }
    return false;
}

function addUser(string $password, string $username, $level) {
    global $db;
    
    // memasukkan id level sebagai foreign key
    
    $id = createId();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (id_user, username, password, id_level) VALUES('$id', '$username', '$password', '$level->id_level')";
    $db->query($sql);

    if($db->affected_rows > 0) {
        return $id;
    }

    return false;
}


function addDokter(string $nama_dokter, string $poli, string $no_telp) {
    global $db;
    
    if(empty($nama_dokter) && empty($poli) && empty($no_telp)) {
        return false;
    }
    
    $isAlreadyDoctor = checkDokter($nama_dokter); // klo gda false, klo ada true
    $userAccount = $db->query("SELECT * FROM user WHERE username='$nama_dokter'")->fetch_object();
    $id_dokter = createId();


    // validasi ketika dokter sudah ada
    if($isAlreadyDoctor) {
        return false;   
    }


    // kalau akun dengan nama dokter sudah terdaftar di database masukkan relasi id sesuai dengan id akun
    if($userAccount) {
        $sql = "INSERT INTO dokter VALUES ('$id_dokter','$nama_dokter','$no_telp', '$poli','$userAccount->id_user') ";
        $data = $db->query($sql);

        return $data;
    }else {
        $sql = "INSERT INTO dokter (id_dokter, nama_dokter, no_telp, poli) VALUES ('$id_dokter','$nama_dokter','$no_telp', '$poli') ";
        $data= $db->query($sql);
          
        return $data;
    }
}

function checkDokter(string $nama_dokter) {
    global $db;

    $data = $db->query("SELECT * FROM dokter WHERE nama_dokter='$nama_dokter'")->fetch_object();

    if(!$data) {
        return false;
    }

    return true;
}


function getLevel(string $level) {
    global $db;
    
    $data = $db->query("SELECT * FROM user_level WHERE level='$level'");

    if(!$data) {
        return false;
    } 

    return $data->fetch_object();
}