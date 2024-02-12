<?php 

$act = isset($_GET['act']) ? $_GET['act'] : 'overview';

?>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once "../components/dashboard/_navbar.php";  ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- <?php include_once "../components/dashboard/_settings-panel.php" ?> -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas  rounded-end" id="sidebar">
            <ul class="nav" id="navbar-sidebar">
                <li class="nav-item">
                    <a class="nav-link d-none">
                        <i class="mdi mdi-grid-large menu-icon "></i>
                        <span class="menu-title fs-6">OKE</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='index.php'>
                        <i class="mdi mdi-grid-large menu-icon "></i>
                        <span class="menu-title fs-6">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Pasien Action</li>
                <li class="nav-item">
                    <a class="nav-link link" id='daftar'>
                        <i class="fa-solid fa-plus fs-5 me-3"></i>
                        <span class="menu-title">Pendaftaran</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" id='rkm'>
                        <i class="fa-solid fa-person-breastfeeding fs-5 me-3"></i>
                        <span class="menu-title">Pasien</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>


                <li class="nav-item nav-category">DATA</li>

                <li class="nav-item">
                    <a class="nav-link link" id='daftar_user'>
                        <i class="fa-solid fa-hospital-user fs-5 me-3"></i>
                        <span class="menu-title">Akun</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" id='dokter'>
                        <i class="fa-solid fa-user-doctor fs-5 me-3"></i>
                        <span class="menu-title">Dokter</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            <div class="d-sm-flex align-items-center justify-content-end border-bottom">
                                <!-- <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab"
                                            href="#overview" role="tab" aria-controls="overview"
                                            aria-selected="true">Pasien</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                            role="tab" aria-selected="false">More</a>
                                    </li>
                                </ul> -->
                                <div>
                                    <!-- TAB -->
                                    <?php include_once "../components/dashboard/_tab.php"  ?>
                                    <!-- TAB -->
                                </div>
                            </div>
                            <div class="tab-content tab-content-basic">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview">
                                    <!-- INFORMASI -->
                                    <?php include_once "../components/dashboard/admin/_" . $act . ".php" ?>
                                </div>
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show " id="more" role="tabpanel"
                                        aria-labelledby="Audiences">
                                        <h2>AUDIENCES</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium
                        <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                            template</a> from
                        BootstrapDash.</span>
                    <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright
                        © 2021. All
                        rights reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->