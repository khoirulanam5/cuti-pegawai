<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user a,tb_karyawan b WHERE a.id_user=b.id_user and a.id_user='$id_user'"));
?>
<section class="section">
    <div class="row">
        <div class="col-lg-8" style="margin-left: 15%;">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hai <?= $_SESSION['user']['nm_pengguna'] ?>, Silahkan Kelola Data Anda Disini !</h4>
                    <!-- Horizontal Form -->
                    <form action="proses/karyawan/update_profile.php" method="post" enctype="multipart/form-data">
                        <!-- <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Id Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" name="id_user" class="form-control" id="inputText" value="<?= $data['id_user'] ?>" readonly>
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" name="nm_karyawan" class="form-control" id="inputText" value="<?= $data['nm_karyawan'] ?>" autocomplete="off" readonly>
                                <input type="hidden" name="id_user" class="form-control" id="inputText" value="<?= $data['id_user'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" name="NIS" class="form-control" id="inputText" value="<?= $data['NIS'] ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">No Telp</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_karyawan" class="form-control" id="inputText" value="<?= $data['no_karyawan'] ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control" id="inputText" value="<?= $data['alamat'] ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Foto Karyawan</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_karyawan" class="form-control" accept="image/*">
                                    <input type="hidden" name="foto_old" value="<?= $data['foto_karyawan']?>">
                                </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Foto Anda</label>
                            <div class="col-sm-8">
                                <input type="file" name="foto_karyawan" class="form-control" id="inputText" autocomplete="off">
                            </div>
                        </div> -->



                        <hr>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" id="inputText" value="<?= $data['username'] ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control" id="inputText" value="<?= $data['password'] ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>
        </div>

    </div>
</section>