<!-- FUNCTION TAMBAH PASIEN -->

<?php 

function addPasien($_nama, $_tgl_lahir, $_tmpt_lahir, $_jk, $_alamat, $_notelp, $_keluhan, $_dokter, $_tgl_masuk) {
    global $db;

    $date=date_create();
    $mmr_pasien = strval(date_timestamp_get($date));

    if($_nama !== '' && $_tgl_lahir !== '' && $_tmpt_lahir !== '' && $_jk !== '' && $_alamat !== '' && $_notelp !== '' && $_keluhan !== '' && $_dokter !== '' && $_tgl_masuk !== '') {
        
        $query = "INSERT INTO pasien(mmr_pasien, nama_pasien, jk_pasien, tgl_lahir, tmp_lahir, alamat, no_telp, keluhan, id_dokter, tgl_masuk) VALUES('$mmr_pasien', '$_nama','$_jk','$_tgl_lahir','$_tmpt_lahir','$_alamat', '$_notelp', '$_keluhan', '$_dokter', '$_tgl_masuk' )";
        $data = $db->query($query);

        return $data; // true if success
    }
}


function getPasien() {
    global $db;

    $pasiens = $db->query("SELECT * FROM pasien");

    if(!$pasiens) {
        return false;
    }

    return $pasiens;
}