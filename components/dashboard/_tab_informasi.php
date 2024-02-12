<?php 
require_once "../config/db.php";
// HITUNG JUMLAH PASIEN YANG MASUK
$data = $db->query("SELECT count(mmr_pasien) AS jumlah_pasien FROM pasien")->fetch_object();

?>

<div class="row" id="informasi">
    <div class="col-sm-12">
        <div class="statistics-details d-flex align-items-center justify-content-start gap-5">
            <!-- PASIEN MASUK -->
            <div>
                <p class="statistics-title">
                    Pasien Masuk
                </p>
                <h3 class="rate-percentage">
                    <?= $data->jumlah_pasien; ?>
                </h3>
                <p class="text-primary d-flex">
                    <span>Orang</span>
                </p>
            </div>
            <!-- PASIEN MASUK -->
            <!-- PASIEN SEMBUH -->
            <div>
                <p class="statistics-title">
                    Pasien Sembuh
                </p>
                <h3 class="rate-percentage">
                    21
                </h3>
                <p class="text-success d-flex">
                    <span>Orang</span>
                </p>
            </div>
            <!-- PASIEN SEMBUH -->

            <!-- <div>
                <p class="statistics-title">
                    New
                    Sessions
                </p>
                <h3 class="rate-percentage">
                    68.8
                </h3>
                <p class="text-danger d-flex">
                    <i class="mdi mdi-menu-down"></i><span>68.8</span>
                </p>
            </div>
            <div class="d-none d-md-block">
                <p class="statistics-title">
                    Avg.
                    Time
                    on
                    Site
                </p>
                <h3 class="rate-percentage">
                    2m:35s
                </h3>
                <p class="text-success d-flex">
                    <i class="mdi mdi-menu-down"></i><span>+0.8%</span>
                </p>
            </div>
            <div class="d-none d-md-block">
                <p class="statistics-title">
                    New
                    Sessions
                </p>
                <h3 class="rate-percentage">
                    68.8
                </h3>
                <p class="text-danger d-flex">
                    <i class="mdi mdi-menu-down"></i><span>68.8</span>
                </p>
            </div>
            <div class="d-none d-md-block">
                <p class="statistics-title">
                    Avg.
                    Time
                    on
                    Site
                </p>
                <h3 class="rate-percentage">
                    2m:35s
                </h3>
                <p class="text-success d-flex">
                    <i class="mdi mdi-menu-down"></i><span>+0.8%</span>
                </p>

            </div> -->
        </div>
    </div>
</div>