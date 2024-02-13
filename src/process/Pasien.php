<!-- TAMBAH PASIEN -->

<?php 

require_once "../functions/PasienFunction.php";
require_once "../../config/db.php";


// add user
if(isset($_POST['tambahPasien'])) {
    $_nama = mysqli_real_escape_string($db, $_POST['nama']);
    $_tgl_lahir = mysqli_real_escape_string($db, $_POST['tgl_lahir']);
    $_tmpt_lahir = mysqli_real_escape_string($db, $_POST['tmpt_lahir']);
    $_jk = mysqli_real_escape_string($db, $_POST['jk']);
    $_alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $_notelp = mysqli_real_escape_string($db, $_POST['notelp']);
    $_keluhan = mysqli_real_escape_string($db, $_POST['keluhan']);
    $_dokter = mysqli_real_escape_string($db, $_POST['nama_dokter']);
    $_tgl_masuk = mysqli_real_escape_string($db, $_POST['tgl_masuk']);


    $pasien = addPasien($_nama, $_tgl_lahir, $_tmpt_lahir, $_jk, $_alamat, $_notelp, $_keluhan, $_dokter, $_tgl_masuk);


    if(!$pasien) {
        var_dump('gagal');
        $_SESSION['success'] = false;
        header("location:../../pages/index.php?act=rkm");
        exit();
    } else {
        var_dump('berhasil');
        $_SESSION['success'] = true;
        header("location:../../pages/index.php?act=rkm");
        exit();
    }
}