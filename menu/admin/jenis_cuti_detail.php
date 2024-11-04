<?php
include "../../functions/koneksi.php";
include "../../functions/lib_function.php";
$id = isset($_POST['id_parameter']) ? $_POST['id_parameter'] : '';
$query = mysqli_query($con, "SELECT * FROM tb_jenis_cuti WHERE id_jenis_cuti='$id'");
$data = $query->fetch_array();
?>
<div class="modal-header bg-warning">
    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

</div>
<div class="modal-body">
    <form action="proses/admin/jenis_cuti_edit.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Nama Jenis Cuti</label>
            <div class="col-sm-8">
                <input type="text" name="nm_jenis_cuti" class="form-control" autocomplete="off" value="<?= $data['nm_jenis_cuti'] ?>" required>
                <input type="hidden" name="id_jenis_cuti" value="<?= $data['id_jenis_cuti'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Durasi Max Cuti</label>
            <div class="col-sm-8">
                <input type="text" name="durasi_cuti_max" class="form-control" autocomplete="off" value="<?= $data['durasi_cuti_max'] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Keterangan Jenis Cuti</label>
            <div class="col-sm-8">
                <input type="text" name="ket_jenis_cuti" class="form-control" autocomplete="off" value="<?= $data['ket_jenis_cuti'] ?>" required>
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Status Cuti</legend>
            <div class="col-sm-8">
                <select name="status_jenis_cuti" class="form-select" required>
                    <option <?php if ($data['status_jenis_cuti'] == "Normatif") {
                                echo "SELECTED";
                            } ?> value="Normatif">Normatif</option>
                    <option <?php if ($data['status_jenis_cuti'] == "Non Normatif") {
                                echo "SELECTED";
                            } ?> value="Non Normatif">Non Normatif</option>
                </select>
            </div>
        </fieldset>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Simpan Data</button>
        </div>
    </form>
</div>