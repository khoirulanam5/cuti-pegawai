<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-top: 30px;margin-bottom:30px">
                    <div class="col-sm-6">
                        <h5 style="font-weight: bold;">Data Pengguna Sistem</h5>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah Data</button>
                    </div>
                </div>


                <!-- Default Table -->

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Pengguna</th>
                            <th style="text-align: center;">Username</th>
                            <th style="text-align: center;">Password</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <!-- <tbody> -->
                    <?php
                    $no = 1;
                    $view = list_pengguna_sistem();
                    while ($row = $view->fetch_array()) {
                    ?>
                        <tr style="text-align: center;">
                            <td><?= $no++ ?></td>
                            <td><?= $row['nm_pengguna'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td>
                                <a href="proses/pemimpin/pengguna_hapus.php?id=<?= $row['id_user'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $row['nm_pengguna'];?>?');" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>
<!-- tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" style="color:aliceblue"><b>Tambah Data</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses/pemimpin/pengguna_tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-8">
                            <input type="text" name="nm_pengguna" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" name="password" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Level Pengguna</label>
                        <div class="col-sm-8">
                            <input type="text" name="level" class="form-control" autocomplete="off" value="admin" readonly>
                        </div>
                    </div>

                    <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Level Pengguna Sistem</legend>
                        <div class="col-sm-8">
                            <select name="level" class="form-select">
                                <option value="Admin">Admin</option>
                                <option value="Kurir">Kurir</option>
                            </select>
                        </div>
                    </fieldset> -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- edit -->
<div class="modal fade bd-example-modal-lg" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal_view">
            ...
        </div>
    </div>
</div>
<!-- <script src="assets/assets_administrasi/js/jquery-3.5.1.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).on('click', '#edit', function(e) {
        var id = $(this).val();
        console.log(id);
        $('#modal_edit').modal('show');
        var fileedit = 'menu/pemilik/supplier_detail.php';
        $.ajax({
            type: 'POST',
            url: fileedit,
            data: 'id_parameter=' + id,
            success: function(data) {
                $('#modal_view').html(data);
            }
        });
    });
</script>