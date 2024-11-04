<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id_user'"));
?>
<section class="section">
    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hai <?= $_SESSION['user']['nm_pengguna'] ?>, Silahkan Kelola Akun Anda Disini !</h4>
                    <!-- Horizontal Form -->
                    <form action="proses/update_profile.php" method="post" enctype="multipart/form-data">
                        <!-- <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Id Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" name="id_user" class="form-control" id="inputText" value="<?= $data['id_user'] ?>" readonly>
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" name="nm_pengguna" class="form-control" id="inputText" value="<?= $data['nm_pengguna'] ?>" autocomplete="off">
                            </div>
                        </div>
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