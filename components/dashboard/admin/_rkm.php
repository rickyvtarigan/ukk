<?php require_once "../config/db.php" ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Pasien</h4>

            <div class="table-responsive">
                <table class="table">
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
                        <?php $query = $db->query("SELECT * FROM pasien JOIN dokter ON pasien.id_dokter = dokter.id_dokter"); ?>
                        <?php while ($data = $query->fetch_object()) { ?>
                        <tr>
                            <td><?= $data->nama_pasien; ?></td>
                            <td><?= $data->alamat; ?></td>
                            <td><?= $data->keluhan; ?></td>
                            <td><?= $data->nama_dokter; ?></td>
                            <td><?= $data->tgl_masuk; ?></td>
                            <td><label class="badge badge-warning">Dalam Penanganan</label></td>
                        </tr>
                        <?php }  ?>
                        <!-- <tr>
                            <td>Okky</td>
                            <td>Sekupang</td>
                            <td>Demam dan Batuk Berdahak</td>
                            <td>dr. Olivia Anderson</td>
                            <td>20 May 2017</td>
                            <td><label class="badge badge-success">Sembuh</label></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>