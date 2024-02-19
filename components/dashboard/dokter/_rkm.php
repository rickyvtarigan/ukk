<?php 
require_once "../config/db.php";
require_once '../src/functions/PasienFunction.php';
require_once "../src/functions/HelperFunction.php";

$level = $_SESSION['user']->level;
$namaDokter = $_SESSION['user']->username;

?>
<div class='col-lg-12 grid-margin stretch-card gap-2'>
    <?php 
    $data = getPasien(); 
    
    while($value = $data->fetch_object()) { 
    ?>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card" style="border-radius: 6px;">
            <p class=" border-bottom py-2 px-4 fw-bold">Poliklinik Umum</p>
            <div class="card-body">
                <h4 class="card-title fw-bold"><?= $value->nama_pasien ?></h4>
                <p class="card-description" style='margin-top:-5px'> 2 Hari yang lalu</p>
                <p class="card-description" style='margin-top:-5px'><span class='fw-bold'>Keluhan</span> :
                    <?= $value->keluhan; ?>
                </p>
                <p class="card-description" style='margin-top:-5px'><span class='fw-bold'>Dokter</span> :
                    <?= $namaDokter; ?></p>
            </div>
            <div class='px-4 pb-3'>
                <a href="index.php?auth=dokter&act=detail&name=<?= $value->nama_pasien ?>"
                    class='btn btn-primary text-white'>Tangani Pasien</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>