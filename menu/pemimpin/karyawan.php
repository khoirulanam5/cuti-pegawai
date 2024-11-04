<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 30px;margin-bottom:30px">
                        <div class="col-sm-6">
                            <h5 style="font-weight: bold;">Data Karyawan</h5>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</button> -->
                        </div>
                    </div>


                    <!-- Default Table -->

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Karyawan</th>
                                <th style="text-align: center;">NIS</th>
                                <th style="text-align: center;">Devisi</th>
                                <th style="text-align: center;">Jabatan</th>
                                <th style="text-align: center;">Jenis Kelamin</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">No Karyawan</th>
                                <th style="text-align: center;">Foto</th>
                                <!-- <th style="text-align: center;">Aksi</th> -->
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                        $no = 1;
                        $view = list_karyawan();
                        while ($row = $view->fetch_array()) {
                        ?>
                            <tr style="text-align: center;">
                                <td><?= $no++ ?></td>
                                <td style="width:15%"><?= $row['nm_karyawan'] ?></td>
                                <td><?= $row['NIS'] ?></td>
                                <td><?= $row['nm_devisi'] ?></td>
                                <td><?= $row['jabatan'] ?></td>
                                <td><?= $row['jenis_kelamin'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['no_karyawan'] ?></td>
                                <td>
                                    <img src="assets/foto_karyawan/<?= $row['foto_karyawan'] ?>" style="width:25%">
                                </td>
                                <!-- <td>
                                    <button class="btn btn-warning" id="edit" value="<?= $row['id_karyawan'] ?>">Edit</button>
                                    <a href="proses/admin/karyawan_hapus.php?id=<?= $row['id_karyawan'] ?>" class="btn btn-danger">Hapus</a>
                                </td> -->
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
</section>
<!-- tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" style="color:aliceblue"><b>Tambah Data</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses/admin/karyawan_tambah.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" name="nm_karyawan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">NIS</label>
                        <div class="col-sm-8">
                            <input type="text" name="NIS" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Nama Devisi</legend>
                        <div class="col-sm-8">
                            <select name="id_devisi" class="form-select">
                                <option value="">Pilih Devisi</option>
                                <?php
                                $view = list_devisi();
                                while ($row = $view->fetch_array()) {
                                ?>
                                    <option value="<?= $row['id_devisi'] ?>"><?= $row['nm_devisi'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </fieldset>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Jabatan Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jabatan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin Karyawan</legend>
                        <div class="col-sm-8">
                            <select name="jenis_kelamin" class="form-select">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </fieldset>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Alamat Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" name="alamat" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">No Telp Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_karyawan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Foto Karyawan</label>
                        <div class="col-sm-8">
                            <input type="file" name="foto_karyawan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Edit -->
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
        var fileedit = 'menu/pemimpin/karyawan_detail.php';
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
<!-- Hapus -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapus_data(dt) {
        var menu = 'supplier';
        var id = $(dt).data('id');
        console.log(id);
        swal.fire({
                title: "Yakin Ingin menghapus?",
                text: "Data Yang Terhapus Akan Hilang Secara Permanen!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                confirmButtonClass: "btn btn-success md-10",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: !1,
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST', // Metode pengiriman data menggunakan POST
                        url: 'proses/pemilik/supplier_hapus.php', // File yang akan memproses data
                        data: {
                            'id': id,
                            'menu': menu
                        },
                        dataType: "html",
                        success: function(response) {
                            // console.log(response)
                            setTimeout(function() {
                                Swal.fire({
                                    title: 'Berhasil Menghapus',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }, 10);
                            window.setTimeout(function() {
                                window.location.replace('?menu=' + menu);
                            }, 1000);
                        }
                    });
                }
            })
    }
</script>