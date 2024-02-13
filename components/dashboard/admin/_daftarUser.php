<?php include_once "../config/db.php" ?>
<div class="col-lg-10 grid-margin stretch-card">
    <!-- TOAST IF SUCCESS -->
    <?php if(isset($_SESSION['delete_fail'])):?>
    <!-- Flexbox container for aligning the toasts -->
    <!-- Then put toasts within -->
    <div class="toast show align-items-center text-bg-success text-white shadow-lg mt-0 border-0 tral top-0 start-50 translate-middle-x position-relative"
        role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body fw-bold">
                Update Data Dokter Berhasil Dilakukan!
            </div>
            <button type="button" onclick="<?php unset($_SESSION['update_success']); ?>"
                class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>
    <!-- TOAST IF SUCCESS -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Akun Pengguna</h4>
            <p class="card-description">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Daftarkan Akun
                </button>
                <?= isset($_SESSION['add_fail']) ? "NAMA SUDAH TERDAFTAR" : '' ?>

            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Level</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $data = $db->query("SELECT * FROM user JOIN user_level ON user.id_level = user_level.id_level");
                            foreach($data as $d => $value) :
                        ?>
                        <tr>
                            <td><?= $value['username']; ?></td>
                            <td><?= $value['level']; ?></td>
                            <td>
                                <a type='button' class=' btn btn-warning text-white' data-bs-toggle="modal"
                                    data-bs-target="#editModal<?php echo $value['id_user']; ?>">Edit</a>
                                <a class='btn btn-danger text-white  <?= $value['username'] == 'jojo' ? 'd-none' : '' ?>'
                                    href='../srcode/process/_hapusUser.php?id=<?= $value['id_user'];
                                    ?>&act=daftar_user'>Delete</a>
                            </td>
                        </tr>
                        <!-- EDIT MODAL -->
                        <div class="modal fade" id="editModal<?php echo $value['id_user']; ?>" tabindex="-1"
                            aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Edit Credential Akun</h4>

                                                    <form class="forms-sample" action='../src/process/User.php'
                                                        method='POST'>
                                                        <div class="form-group">
                                                            <input name='id_user' type="id_user" class='form-control'
                                                                id='id_user' placeholder='No Telepon' required
                                                                value="<?= $value['id_user']; ?>" hidden />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input name='username' type="text"
                                                                class="form-control fw-bold" id="username"
                                                                placeholder="username"
                                                                value="<?= $value['username']; ?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for='password'>Password</label>
                                                            <input name='password' type="password" class='form-control'
                                                                id='password' placeholder='masukkan password baru'
                                                                required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for='user_level'>User Level</label>
                                                            <select class="form-select" name='user_level'
                                                                aria-label="Default sele ct example" id='user_level '
                                                                required>
                                                                <?php 
                                                                    $userLevel = $db->query("SELECT * FROM user_level");
                                                                ?>
                                                                <option selected>Hak Akses</option>
                                                                <?php foreach($userLevel as $val): ?>
                                                                <option value="<?= $val['level']; ?>">
                                                                    <?= $val['level']?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary me-2 text-white"
                                                            name='edit_user'>Update</button>
                                                        <button type='button' class="btn btn-light"
                                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- EDIT MODAL -->
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD USER-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah User</h4>

                            <form class="forms-sample" action='../src/process/User.php' method='POST'>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name='username' type="text" class="form-control" id="username"
                                        placeholder="username" required>
                                </div>

                                <div class="form-group">
                                    <label for='password'>Password</label>
                                    <input name='password' type="password" class='form-control' id='password'
                                        placeholder='password' required />
                                </div>
                                <div class="form-group">
                                    <label for='user_level'>User Level</label>

                                    <select class="form-select" name='user_level' aria-label="Default sele ct example"
                                        id='user_level' required onchange="showOptionValue()">
                                        <?php 
                                            $userLevel = $db->query("SELECT * FROM user_level");
                                        ?>
                                        <option selected>Hak Akses</option>
                                        <?php foreach($userLevel as $val): ?>
                                        <option value="<?= $val['level']; ?>" id='optionValue'>
                                            <?= $val['level']  ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form_dokter_wrapper d-none">
                                    <span class='mb-3 fw-bold'>Dokter Form</span>
                                    <div class="form-group">
                                        <label for="no_telp">No Telepon</label>
                                        <input name='no_telp' type="text" class="form-control" id="no_telp"
                                            placeholder="No Telp">
                                    </div>
                                    <div class="form-group">
                                        <label for="poli">Poliklinik</label>
                                        <input name='poli' type="text" class="form-control" id="poli"
                                            placeholder="Poliklinik">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary me-2" name='tambah_user'>Submit</button>
                                <button type='button' class="btn btn-light " data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ADD USER-->