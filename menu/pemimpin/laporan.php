<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id_user'"));
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hai <?= $_SESSION['user']['nm_pengguna'] ?>, Silahkan Lihat Laporan Pengajuan Cuti Karyawan Anda !</h4>
                    <!-- Horizontal Form -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Id Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" name="id_user" class="form-control" id="inputText" value="<?= $data['id_user'] ?>" readonly>
                            </div>
                        </div> -->
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Awal</label>
                                <div class="col-sm-8">
                                    <input type="date" id="tgl_awal" name="tgl_awal" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Tanggal Akhir</label>
                                <div class="col-sm-8">
                                    <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Karyawan</label>
                                <div class="col-sm-8">
                                    <select name="id_karyawan" class="form-control" required>
                                        <option value="">Pilih Karyawan</option>
                                        <option value="Semua">Semua Karyawan</option>
                                        <?php
                                        $view = list_karyawan();
                                        while ($row = $view->fetch_array()) {
                                        ?>
                                            <option value="<?= $row['id_karyawan'] ?>"><?= $row['nm_karyawan'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="text" style="width: 100%;float:right">
                            <button type="submit" name="tampil_data" class="btn btn-success">Tampil Data</button>
                        </div>
                    </form><!-- End Horizontal Form -->
                </div>
            </div>
        </div>

        <!-- tampil data disini -->
        <?php
        include("functions/koneksi.php");
        if (isset($_POST['tampil_data'])) {
            $tgl_awal = $_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $id_karyawan = $_POST['id_karyawan'];

            if ($id_karyawan == "Semua") {
                $view = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti a,tb_karyawan b,tb_jenis_cuti c,tb_devisi d WHERE a.id_karyawan=b.id_karyawan and a.id_jenis_cuti=c.id_jenis_cuti and b.id_devisi= d.id_devisi and a.tgl_pengajuan between '$tgl_awal' and '$tgl_akhir' ORDER BY a.id_pengajuan_cuti DESC");
                $nama = "Semua Karyawan";
            } else {
                $view = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti a,tb_karyawan b,tb_jenis_cuti c,tb_devisi d WHERE a.id_karyawan=b.id_karyawan and a.id_jenis_cuti=c.id_jenis_cuti and b.id_devisi= d.id_devisi and a.tgl_pengajuan between '$tgl_awal' and '$tgl_akhir' and a.id_karyawan='$id_karyawan' ORDER BY a.id_pengajuan_cuti DESC");

                $dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'"));
                $nama = $dt['nm_karyawan'];
            }

        ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-top: 30px;margin-bottom:30px">
                            <div class="col-sm-12">
                                <h5 style="font-weight: bold;">Laporan Pengajuan Cuti Tertanggal : <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></h5>
                                <h5 style="font-weight: bold;">Nama Karyawan : <?= $nama ?></h5>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</button> -->
                            </div>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Pegawai</th>
                                    <th style="text-align: center;">Devisi - Jabatan</th>
                                    <th style="text-align: center;">Tanggal Pengajuan</th>
                                    <th style="text-align: center;">Tanggal Cuti</th>
                                    <th style="text-align: center;">Lama Cuti</th>
                                    <th style="text-align: center;">Jenis Cuti</th>
                                    <th style="text-align: center;">Keterangan Cuti</th>
                                    <th style="text-align: center;">Tanggal Validasi</th>
                                    <th style="text-align: center;">Status Pengajuan</th>
                                    <!-- <th style="text-align: center;">Aksi</th> -->
                                </tr>
                            </thead>
                            <!-- <tbody> -->
                            <?php
                            $no = 1;
                            while ($row = $view->fetch_array()) {
                            ?>
                                <tr style="text-align: center;">
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nm_karyawan'] ?></td>
                                    <td><?= $row['nm_devisi'] ?> - <?= $row['jabatan'] ?></td>
                                    <td><?= $row['tgl_pengajuan'] ?></td>
                                    <td><?= $row['tgl_cuti_awal'] ?> s/d <?= $row['tgl_cuti_akhir'] ?></td>
                                    <td><?= $row['lama_cuti'] ?></td>
                                    <td><?= $row['nm_jenis_cuti'] ?></td>
                                    <td><?= $row['keperluan_cuti'] ?></td>
                                    <td><?= $row['tgl_validasi'] ?></td>
                                    <td><?= $row['status_pengajuan'] ?></td>
                                    <!-- <td>
                                    <button class="btn btn-warning" id="edit" value="<?= $row['id_devisi'] ?>">Edit</button>
                                    <a href="proses/admin/devisi_hapus.php?id=<?= $row['id_devisi'] ?>" class="btn btn-danger">Hapus</a>
                                </td> -->
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="menu/pemimpin/laporan_cetak.php?tgl_awal=<?= $tgl_awal; ?>&tgl_akhir=<?= $tgl_akhir; ?>&id_karyawan=<?= $id_karyawan ?>" target="_blank" class="btn btn-warning">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>



        <?php
        }
        ?>



    </div>

</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel-data').DataTable({
            "responsive": true,
            "processing": true,
            "columnDefs": [{
                "orderable": false,
                "targets": [4]
            }]
        });

        $('#tabel-data').parent().addClass("table-responsive");
    });
</script>
<script>
    var app = {
        code: '0'
    };
</script>