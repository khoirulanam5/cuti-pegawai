<?php
include "../../functions/koneksi.php";
include "../../functions/lib_function.php";
$id = isset($_POST['id_parameter']) ? $_POST['id_parameter'] : '';
$query = mysqli_query($con, "SELECT * FROM tb_devisi WHERE id_devisi='$id'");
$data = $query->fetch_array();
?>
<div class="modal-header bg-warning">
    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

</div>
<div class="modal-body">
    <form action="proses/admin/devisi_edit.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Nama Devisi Pekerjaan</label>
            <div class="col-sm-8">
                <input type="text" name="nm_devisi" class="form-control" autocomplete="off" value="<?= $data['nm_devisi'] ?>" required>
                <input type="hidden" name="id_devisi" class="form-control" autocomplete="off" value="<?= $data['id_devisi'] ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Simpan Data</button>
        </div>
    </form>
</div>