<?php
include("../../functions/koneksi.php");
$id_jenis_cuti = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_jenis_cuti WHERE id_jenis_cuti='$id_jenis_cuti'"));
?>

<label for="inputEmail" class="col-sm-4 col-form-label">Keterangan Jenis Cuti</label>
<div class="col-sm-8">
    <textarea name="keterangan" class="form-control" readonly><?= $data['ket_jenis_cuti'] ?></textarea>
    <input type="hidden" name="max_cuti" value="<?= $data['durasi_cuti_max'] ?>">
    <input type="hidden" name="status_jenis_cuti" value="<?= $data['status_jenis_cuti'] ?>">
</div>