<?php 
require_once "../config/db.php";
require_once "../src/functions/HelperFunction.php";

$level = $_SESSION['user']->level;
$namaDokter = $_SESSION['user']->username;

?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">daftar pasien</h4>
            <p class="card-description ">
                daftar pasien yang ditangani oleh <?= $namaDokter; ?></code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Keluhan</th>
                            <th>Dokter</th>
                            <th>Tanggal Berobat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $query = $db->query("SELECT * FROM pasien JOIN dokter ON pasien.id_dokter = dokter.id_dokter WHERE dokter.nama_dokter='$namaDokter'"); ?>
                        <?php while ($data = $query->fetch_object()) { ?>
                        <tr>
                            <td><?= $data->nama_pasien; ?></td>
                            <td><?= $data->alamat; ?></td>
                            <td><?= $data->keluhan; ?></td>
                            <td><?= $data->nama_dokter; ?></td>
                            <td><?= $data->tgl_masuk; ?></td>
                            <td><a href='index.php?auth=dokter&act=detail&name=<?= $data->nama_pasien; ?>'
                                    class="badge badge-warning">Dalam Penanganan</a>
                            </td>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>