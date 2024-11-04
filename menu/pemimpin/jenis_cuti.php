<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 30px;margin-bottom:30px">
                        <div class="col-sm-6">
                            <h5 style="font-weight: bold;">Data Jenis Cuti</h5>
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
                                <th style="text-align: center;">Nama Jenis Cuti</th>
                                <th style="text-align: center;">Status Jenis Cuti</th>
                                <th style="text-align: center;">Durasi Max Cuti</th>
                                <th style="text-align: center;">Keterangan</th>
                                <!-- <th style="text-align: center;">Aksi</th> -->
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                        $no = 1;
                        $view = list_jenis_cuti();
                        while ($row = $view->fetch_array()) {
                        ?>
                            <tr style="text-align: center;">
                                <td><?= $no++ ?></td>
                                <td><?= $row['nm_jenis_cuti'] ?></td>
                                <td><?= $row['status_jenis_cuti'] ?></td>
                                <td><?= $row['durasi_cuti_max'] ?> Hari</td>
                                <td><?= $row['ket_jenis_cuti'] ?></td>
                                <!-- <td>
                                    <button class="btn btn-warning" id="edit" value="<?= $row['id_jenis_cuti'] ?>">Edit</button>
                                    <a href="proses/admin/jenis_cuti_hapus.php?id=<?= $row['id_jenis_cuti'] ?>" class="btn btn-danger">Hapus</a>
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
                <form action="proses/admin/jenis_cuti_tambah.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Nama Jenis Cuti</label>
                        <div class="col-sm-8">
                            <input type="text" name="nm_jenis_cuti" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Durasi Max Cuti (Hari)</label>
                        <div class="col-sm-8">
                            <input type="text" name="durasi_cuti_max" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Keterangan Jenis Cuti</label>
                        <div class="col-sm-8">
                            <input type="text" name="ket_jenis_cuti" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Status Cuti</legend>
                        <div class="col-sm-8">
                            <select name="status_jenis_cuti" class="form-select">
                                <option value="Normatif">Normatif</option>
                                <option value="Non Normatif">Non Normatif</option>
                            </select>
                        </div>
                    </fieldset>

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
        var fileedit = 'menu/admin/jenis_cuti_detail.php';
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