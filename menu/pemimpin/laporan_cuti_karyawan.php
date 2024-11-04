<?php
include("functions/koneksi.php");
$id_user = $_SESSION['user']['id_user'];
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hai <?= $_SESSION['user']['nm_pengguna'] ?>, Silahkan Lihat Laporan Cuti Karyawan Anda !</h4>
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
                $view = mysqli_query($con, "SELECT * FROM tb_karyawan a,tb_devisi b WHERE a.id_devisi=b.id_devisi ORDER BY a.id_karyawan DESC");
                $nama = "Semua Karyawan";
            } else {
                $view = mysqli_query($con, "SELECT * FROM tb_karyawan a,tb_devisi b WHERE a.id_devisi=b.id_devisi and a.id_karyawan='$id_karyawan' ORDER BY a.id_karyawan DESC");
                $dt = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'"));
                $nama = $dt['nm_karyawan'];
            }
        ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-top: 30px;margin-bottom:30px">
                            <div class="col-sm-12">
                                <h5 style="font-weight: bold;">Laporan Total Cuti Karyawan Tertanggal : <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></h5>
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
                                    <th style="text-align: center;">Total Cuti Normatif (Hari)</th>
                                    <th style="text-align: center;">Total Cuti Non Normatif (Hari)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            while ($row = $view->fetch_array()) {
                                $id = $row['id_karyawan'];
                                // normatif
                                $data = mysqli_fetch_array(mysqli_query($con, "SELECT sum(lama_cuti) as tot_cuti_normatif FROM tb_pengajuan_cuti a,tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti and b.status_jenis_cuti='Normatif' and a.status_pengajuan !='Pengajuan' and a.id_karyawan='$id'"));
                                // non normatif
                                $data1 = mysqli_fetch_array(mysqli_query($con, "SELECT sum(lama_cuti) as tot_cuti_non_normatif FROM tb_pengajuan_cuti a,tb_jenis_cuti b WHERE a.id_jenis_cuti=b.id_jenis_cuti and b.status_jenis_cuti='Non Normatif' and a.status_pengajuan !='Pengajuan'  and a.id_karyawan='$id'"));
                            ?>
                                <tr style="text-align: center;">
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nm_karyawan'] ?></td>
                                    <td><?= $row['nm_devisi'] ?> - <?= $row['jabatan'] ?></td>
                                    <td><?= $data['tot_cuti_normatif'] ?> </td>
                                    <td><?= $data1['tot_cuti_non_normatif'] ?> </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a href="menu/pemimpin/laporan_cuti_karyawan_cetak.php?tgl_awal=<?= $tgl_awal; ?>&tgl_akhir=<?= $tgl_akhir; ?>&id_karyawan=<?= $id_karyawan ?>" target="_blank" class="btn btn-warning">Cetak</a>
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