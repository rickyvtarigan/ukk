<?php 
require_once "../config/db.php";
$detailedPasien = isset($_GET['name']) ? $_GET['name'] : false;

if(!$detailedPasien) {
    header("Location:../pages/index.php?auth=dokter&act=rkm");
}

$pasien = $db->query("SELECT * FROM pasien JOIN dokter ON pasien.id_dokter = dokter.id_dokter WHERE nama_pasien='$detailedPasien'")->fetch_object();

?>
<div class="row">
    <div class="col-8">
        <h3 class='mb-3 fw-bold'>Detail Pasien</h3>
        <div class='row'>
            <p>Pasien <span class='fw-bold'><?= $pasien->nama_pasien; ?></span> terdaftar pada klinik yang di tangani
                oleh
                <span class='fw-bold'><?= $pasien->nama_dokter; ?></span>
            </p>
        </div>
        <div class='row mt-4'>

            <div class='card' style="padding: 0;">
                <div class="bg-primary rounded-top px-3 pt-4 text-center border-bottom border-3">
                    <h5 class='card-title fw-bold text-light'>Informasi Klinis Pasien</h5>
                    <p class="card-description text-light">Informasi keluhan dan klinis pasien lainnya</p>
                </div>
                <div class="card-body">
                    <h3 style="font-weight: 900;">Keluhan</h3>
                    <div class=' mt-3 rounded'><?= $pasien->keluhan; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="bg-primary rounded-top px-3 pt-4 text-center">
                <h5 class='card-title fw-bold  text-light'>Biodata</h5>
                <p class="card-description text-light">Biodata dan informasi kontak pasien</p>
            </div>
            <div class="card-body">
                <div class='mt-2'>
                    <div class='mb-3 text-center mb-4'>
                        <h3 class="fw-bold"><?= $pasien->nama_pasien; ?></h3>
                        <p>MMR <?= $pasien->mmr_pasien; ?></p>
                    </div>
                    <div class='mb-3'>
                        <h5 class='fw-bold'>Tempat Lahir</h5>
                        <span><?= $pasien->tmp_lahir; ?></span>
                    </div>
                    <div class='mb-3'>
                        <h5 class='fw-bold'>Tanggal Lahir</h5>
                        <span><?= $pasien->tgl_lahir; ?></span>
                    </div>
                    <div class='mb-3'>
                        <h5 class='fw-bold'>Alamat</h5>
                        <span><?= $pasien->alamat; ?></span>
                    </div>
                    <div class='mb-3'>
                        <h5 class='fw-bold'>Nomor Telepon</h5>
                        <span><?= $pasien->no_telp; ?></span>
                    </div>
                    <div class='mb-3'>
                        <h5 class='fw-bold'>Jenis Kelamin</h5>
                        <span><?= $pasien->jk_pasien; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-md-6 grid-margin stretch-card">
    <div class="card ">
        <div class="card-body">
            <h4 class="card-title">Horizontal Form</h4>
            <p class="card-description">
                Horizontal form layout
            </p>
            <form class="forms-sample">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputConfirmPassword2"
                            placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div> -->