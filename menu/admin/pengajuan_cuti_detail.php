<?php
include "../../functions/koneksi.php";
include "../../functions/lib_function.php";
$id = isset($_POST['id_parameter']) ? $_POST['id_parameter'] : '';
$query = mysqli_query($con, "SELECT * FROM tb_pengajuan_cuti WHERE id_pengajuan_cuti='$id'");
$data = $query->fetch_array();
?>
<div class="modal-header bg-warning">
    <h5 class="modal-title" id="exampleModalLabel">Validasi Data</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

</div>
<div class="modal-body">
    <form action="proses/admin/pengajuan_cuti_validasi.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Validasi Admin</label>
            <div class="col-sm-8">
                <input type="text" name="validasi_cuti" class="form-control" autocomplete="off" value="" required>
                <input type="hidden" name="id_pengajuan_cuti" value="<?= $data['id_pengajuan_cuti'] ?>">
                <input type="hidden" name="status_pengajuan" value="Proses">
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Pengajuan Cuti Karyawan</legend>
            <div class="col-sm-8">
                <select class="col-sm-12 col-form-label">
                    <option value="">Pilih Validasi</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
        </fieldset>



        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Simpan Data</button>
        </div>
    </form>
</div>