<?php
include_once "../config/db.php";
?>



<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">

        <!-- TOAST IF SUCCESS -->
        <?php if (isset($_SESSION['update_success'])) : ?>
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

        <!-- TOAST IF SUCCESS -->
        <?php if (isset($_SESSION['delete_success'])) : ?>
        <!-- Flexbox container for aligning the toasts -->
        <!-- Then put toasts within -->
        <div class="toast show align-items-center text-bg-primary text-white shadow-lg mt-0 border-0 tral top-0 start-50 translate-middle-x position-relative"
            role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fw-bold">
                    Data Dokter berhasil di hapus
                </div>
                <button type="button" onclick="<?php unset($_SESSION['delete_success']); ?>"
                    class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        <?php endif; ?>
        <!-- TOAST IF SUCCESS -->

        <div class="card-body">
            <h4 class="card-title">Dokter Klinik</h4>
            <p class="card-description">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Tambahkan Dokter
                </button>
                <?= isset($_SESSION['add_fail']) ? "NAMA SUDAH TERDAFTAR" : '' ?>
            </p>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Telepon</th>
                            <th>Poli Spesialis</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $db->query("SELECT * FROM dokter");
                        foreach ($data as $d => $value) :
                        ?>
                        <tr>
                            <td><?= $value['nama_dokter']; ?></td>
                            <td><?= $value['no_telp']; ?></td>
                            <td><?= $value['poli']; ?></td>
                            <td>
                                <a type='button'
                                    class=' btn btn-warning text-white <?= $value['id_user'] == null ? '' : 'w-75'; ?>'
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal<?php echo $value['id_dokter']; ?>">Edit</a>
                                <a class='btn btn-danger text-white  <?= $value['id_user'] == null ? '' : 'd-none'; ?>'
                                    href='../srcode/process/_hapusUser.php?id=<?= $value['id_dokter']; ?>&act=dokter'>Delete</a>
                            </td>
                        </tr>
                        <!-- EDIT MODAL -->
                        <div class="modal fade" id="editModal<?php echo $value['id_dokter']; ?>" tabindex="-1"
                            aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Edit Data Dokter</h4>

                                                    <form class="forms-sample"
                                                        action='../process/admin/_tambah.process.php' method='POST'>
                                                        <div class="form-group">
                                                            <label for="nama_dokter">nama_dokter</label>
                                                            <input name='nama_dokter' type="text"
                                                                class="form-control fw-bold" id="nama_dokter"
                                                                placeholder="nama_dokter"
                                                                value="<?= $value['nama_dokter']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name='id_dokter' type="id_dokter"
                                                                class='form-control' id='id_dokter'
                                                                placeholder='No Telepon' required
                                                                value="<?= $value['id_dokter']; ?>" hidden />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for='no_telp'>no_telp</label>
                                                            <input name='no_telp' type="no_telp" class='form-control'
                                                                id='no_telp' placeholder='No Telepon' required
                                                                value="<?= $value['no_telp']; ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="poli">Poliklinik</label>
                                                            <input name='poli' type="text" class="form-control"
                                                                id="poli" placeholder="Poliklinik" required
                                                                value='<?= $value['poli']; ?>'>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary me-2 text-white"
                                                            name='update_dokter'>Update</button>
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
                        <?php endforeach; ?>
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
                            <h4 class="card-title">Tambah Dokter Baru</h4>

                            <form class="forms-sample" action='../srcode/process/_tambahUser.php' method='POST'>
                                <div class="form-group">
                                    <label for="nama">Nama Dokter</label>
                                    <input name='nama_dokter' type="text" class="form-control" id="nama"
                                        placeholder="Nama Dokter" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telepon</label>
                                    <input name='no_telp' type="text" class="form-control" id="no_telp"
                                        placeholder="No. Telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="poli">Poliklinik</label>
                                    <input name='poli' type="text" class="form-control" id="poli"
                                        placeholder="Poliklinik" required>
                                </div>

                                <button type="submit" class="btn btn-primary me-2 text-white"
                                    name='tambah_dokter'>Tambah</button>
                                <button type='button' class="btn btn-light" href="index.php?act=daftar_user"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ADD USER -->