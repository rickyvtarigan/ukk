<!-- Import Header -->
<?php include '../components/header.php'; ?>
<!-- Import Header -->


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="../../assets/images/logo.svg" alt="logo klinik">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="fw-light">login untuk melanjutkan</h6>
                        <form class="pt-3" method="post" action="../src/process/Auth.php">
                            <div class="form-group">
                                <input type="username" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="Username" required autocomplete="off" name='username'>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Password" required autocomplete="off" name='password'>
                            </div>
                            <div class="mt-3">
                                <button type='submit'
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    href="">Login</button>
                            </div>
                            <div class="text-center mt-4 fw-normal text-body-secondary">
                                jika belum punya akun, hubungi admin.
                                <!-- Don't have an account? <a href="register.html" class="text-primary">Create</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- Import Header -->
<?php include '../components/footer.php'; ?>
<!-- Import Header -->