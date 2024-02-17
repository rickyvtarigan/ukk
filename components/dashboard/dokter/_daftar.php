<?php require_once "../config/db.php" ?>
<div class="modal fade modal" id="staticBackdrop" data-bs-backdrop='static' tabindex="-1" data-bs-keyboard=' false'
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pendaftaran Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action='../src/process/Pasien.php' method='POST'>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name='nama' type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input name='tgl_lahir' type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tmpt_lahir">Tempat Lahir</label>
                        <input name='tmpt_lahir' type="text" class="form-control" id="tmpt_lahir"
                            placeholder="Tempat lahir" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-select" name='jk' aria-label="Default select example">
                            <option selected>Jenis Kelamin</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name='alamat' type="text" class="form-control" id="alamat" placeholder="alamat">
                    </div>
                    <div class="form-group">
                        <label for='notelp'>No. Telp</label>
                        <input name='notelp' type="text" class='form-control' id='notelp' placeholder='No. Telp' />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input name='tgl_masuk' type="date" class="form-control">
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" name='keluhan'></textarea>
                        <label for="floatingTextarea2 " class=''>Keluhan yang pasien alami</label>
                    </div>
                    <div class="form-group">
                        <select class='form-select' name='nama_dokter'>
                            <option>Pilih Dokter</option>
                            <?php 
                            $dokter = $db->query("SELECT * FROM dokter");
                            foreach($dokter as $d) :
                            ?>
                            <option value='<?= $d['id_dokter']; ?>'><?= $d['nama_dokter']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2" name='tambahPasien'>Submit</button>
                    <button class="btn btn-light d-relative" data-bs-dismiss="modal" aria-label="Close"
                        type='button'>Cancel</button>
                </form>
            </div>

        </div>
    </div>
</div>