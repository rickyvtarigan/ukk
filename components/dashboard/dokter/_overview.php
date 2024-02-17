<?php include_once "../config/db.php"  ?>
<?php 

$getPasien = $db->query("SELECT COUNT(*) AS total FROM pasien")->fetch_object();


?>
<!-- WRAPPER CONTENT UTAMA -->
<div class="row">
    <div class='row mb-5'>
        <div class='col-lg-12'>
            <div class='row'>
                <div class="col-4">
                    <div class="card card-rounded card-warning">
                        <div class="card-body px-4 py-3">
                            <img src='../assets/images/pasienMasuk.svg' class="w-100" />
                            <p>Pasien Masuk</p>
                            <h4 class='fw-bold'><?= $getPasien->total; ?></h4>
                            <p>Orang</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-rounded">
                        <div class="card-body px-4 ">
                            <div class='row'>
                                <div class="col-4">
                                    <img src='../assets/images/pasienMasuk.svg' class="w-100" />
                                    <!-- <p>Pasien Sembuh</p> -->

                                </div>
                                <div class='col-4'>
                                    <h1 class='fw-bold text-primary'>10</h1>
                                </div>
                                <div class='col-4'>
                                    <span class='fw-bold'>Pasien Masuk</span>
                                </div>
                            </div>
                            <!-- <p>Orang</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class='card card-rounded'>
                        <div class='card-body'>
                            <h5 class='fw-bold'>Akses Cepat</h5>
                            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Daftar Pasien
                            </button>
                            <button class='btn btn-success text-white '>Tambah Dokter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT UTAMA-->
    <div class="col-lg-4 d-flex flex-column">
        <!-- BARIS CONTENT -->
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title card-title-dash">
                                Activities
                            </h4>
                            <p class="mb-0">20 finished, 5 remaining</p>
                        </div>
                        <ul class="bullet-line-list">
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Ben Tossell</span>
                                        assign you a task
                                    </div>
                                    <p>Just now</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Oliver Noah</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Jack William</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Leo Lucas</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Thomas Henry</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Ben Tossell</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="text-light-green">Ben Tossell</span>
                                        assign you a task
                                    </div>
                                    <p>1h</p>
                                </div>
                            </li>
                        </ul>
                        <div class="list align-items-center pt-3">
                            <div class="wrapper w-100">
                                <p class="mb-0">
                                    <a href="#" class="fw-bold text-primary">Show all
                                        <i class="mdi mdi-arrow-right ms-2"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BARIS CONTENT -->
    </div>
    <!-- CONTENT UTAMA-->
</div>
<!-- CONTENT UTAMA -->


<?php include_once "_daftar.php" ?>