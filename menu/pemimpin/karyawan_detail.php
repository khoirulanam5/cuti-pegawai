<?php
include "../../functions/koneksi.php";
include "../../functions/lib_function.php";
$id = isset($_POST['id_parameter']) ? $_POST['id_parameter'] : '';
$query = mysqli_query($con, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'");
$data = $query->fetch_array();
?>
<div class="modal-header bg-warning">
    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
</div>
<div class="modal-body">
    <form action="proses/admin/karyawan_edit.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
            <div class="col-sm-8">
                <input type="text" name="nm_karyawan" class="form-control" autocomplete="off" value="<?= $data['nm_karyawan'] ?>">
                <input type="hidden" name="id_karyawan" class="form-control" autocomplete="off" value="<?= $data['id_karyawan'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">NIS</label>
            <div class="col-sm-8">
                <input type="text" name="NIS" class="form-control" autocomplete="off" value="<?= $data['NIS'] ?>">
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
                        <option <?php if ($data['id_devisi'] == $row['id_devisi']) {
                                    echo "SELECTED";
                                } ?> value="<?= $row['id_devisi'] ?>"><?= $row['nm_devisi'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </fieldset>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Jabatan Karyawan</label>
            <div class="col-sm-8">
                <input type="text" name="jabatan" class="form-control" autocomplete="off" value="<?= $data['jabatan'] ?>">
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin Karyawan</legend>
            <div class="col-sm-8">
                <select name="jenis_kelamin" class="form-select">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option <?php if ($data['jenis_kelamin'] == "Pria") {
                                echo "SELECTED";
                            } ?> value="Pria">Pria</option>
                    <option <?php if ($data['jenis_kelamin'] == "Wanita") {
                                echo "SELECTED";
                            } ?> value="Wanita">Wanita</option>
                </select>
            </div>
        </fieldset>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Alamat Karyawan</label>
            <div class="col-sm-8">
                <input type="text" name="alamat" class="form-control" autocomplete="off" value="<?= $data['alamat'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">No Telp Karyawan</label>
            <div class="col-sm-8">
                <input type="text" name="no_karyawan" class="form-control" autocomplete="off" value="<?= $data['no_karyawan'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-4 col-form-label">Foto Karyawan</label>
            <div class="col-sm-8">
                <input type="file" name="foto_karyawan" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Simpan Data</button>
        </div>
    </form>
</div>