<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_user='$id_user'"));
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 30px;margin-bottom:30px">
                        <div class="col-sm-6">
                            <h5 style="font-weight: bold;">Data Pengajuan Cuti Anda</h5>
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
                                <th style="text-align: center;">Tanggal Pengajuan</th>
                                <th style="text-align: center;">Tanggal Cuti</th>
                                <th style="text-align: center;">Lama Cuti</th>
                                <th style="text-align: center;">Jenis Cuti</th>
                                <!-- <th style="text-align: center;">Keperluan Cuti</th> -->
                                <th style="text-align: center;">Foto Bukti</th>
                                <th style="text-align: center;">Validasi Admin</th>
                                <th style="text-align: center;">Validasi Pemimpin</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                        $no = 1;
                        $view = list_pengaujuan_cuti();
                        while ($row = $view->fetch_array()) {
                        ?>
                            <tr style="text-align: center;">
                                <td><?= $no++ ?></td>
                                <td><?= $row['nm_karyawan'] ?></td>
                                <td>
                                    <?php
                                    if ($row['status_pengajuan'] != "Diterima") {
                                    ?>
                                        <?= $row['tgl_pengajuan'] ?>
                                    <?php
                                    } else {
                                    ?>
                                        <div style="color: blue;"><b><?= $row['tgl_pengajuan'] ?></b></div>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td><?= $row['tgl_cuti_awal'] ?> s/d <?= $row['tgl_cuti_akhir'] ?></td>
                                <td><?= $row['lama_cuti'] ?> Hari</td>
                                <td><?= $row['nm_jenis_cuti'] ?></td>
                                <!-- <td><?= $row['keperluan_cuti'] ?></td> -->
                                <td>
                                    <?php
                                    if (!empty($row['foto_bukti'])) {
                                        $fotoBukti = 'assets/foto_bukti/' . $row['foto_bukti'];
                                        echo '<a href="' . $fotoBukti . '" download>';
                                        echo '<img src="' . $fotoBukti . '" style="max-width: 100px; max-height: 100px;" alt="Foto Bukti">';
                                        echo '</a>';
                                    } else {
                                        echo 'Tidak Ada Foto';
                                    }
                                    ?>
                                </td>
                                <td><?= $row['validasi_admin'] ?></td>
                                <td><?= $row['validasi_pemimpin'] ?></td>
                                <td>

                                <?php
                                    if ($row['status_pengajuan'] == "Proses") {
                                        ?>
                                        <button class="btn btn-warning" id="edit" value="<?= $row['id_pengajuan_cuti'] ?>"><i class="bi bi-eye-fill"></i></button>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="proses/pemimpin/pengajuan_cuti_hapus.php?id=<?= $row['id_pengajuan_cuti'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data cuti <?= $row['nm_karyawan'];?> pada tanggal <?= $row['tgl_pengajuan'];?>?');" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    <?php
                                    }
                                    ?>                         
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
</section>
<!-- tambah -->
<!-- <div class="modal fade" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" style="color:aliceblue"><b>Tambah Data</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses/karyawan/pengajuan_tambah.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" name="nm_karyawan" class="form-control" autocomplete="off" value="<?= $data['nm_karyawan'] ?>" readonly>
                            <input type="hidden" name="id_karyawan" class="form-control" autocomplete="off" value="<?= $data['id_karyawan'] ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Tanggal Pengajuan Cuti</label>
                        <div class="col-sm-8">
                            <input type="date" name="tgl_pengajuan" class="form-control" autocomplete="off" value="<?= date("Y-m-d") ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Jenis Cuti Yang Diambil</label>
                        <div class="col-sm-8">
                            <select name="id_jenis_cuti" id="id_jenis_cuti" class="form-select" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <?php
                                $view = list_jenis_cuti();
                                while ($row = $view->fetch_array()) {
                                ?>
                                    <option value="<?= $row['id_jenis_cuti'] ?>"><?= $row['nm_jenis_cuti'] ?> - Max Days : <?= $row['durasi_cuti_max'] ?> Hari</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> -->

                    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script>
                        $(function() {
                            $('#id_jenis_cuti').change(function() {
                                var id = $(this).val();
                                console.log(id);
                                $.get("menu/karyawan/get_keterangan_jenis_cuti.php", {
                                    id: id
                                }, function(data) {
                                    console.log(data);
                                    $('#ket_jenis_cuti').html(data);
                                });
                            });
                        });
                    </script>

                    <div class="row mb-3" id="ket_jenis_cuti">

                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Tanggal Mulai Cuti</label>
                        <div class="col-sm-8">
                            <input type="date" name="tgl_awal" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Tanggal Selesai Cuti</label>
                        <div class="col-sm-8">
                            <input type="date" name="tgl_akhir" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Lama Pengambilan Cuti (Hari)</label>
                        <div class="col-sm-8">
                            <input type="text" name="keperluan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Keperluan Cuti</label>
                        <div class="col-sm-8">
                            <input type="text" name="keperluan" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Foto Bukti Surat Izin <span style="font-size: 12px;color:red;">jika diperlukan</span></label>
                        <div class="col-sm-8">
                            <input type="file" name="foto_bukti" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <!-- <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div> -->
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
        var fileedit = 'menu/pemimpin/pengajuan_cuti_detail.php';
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