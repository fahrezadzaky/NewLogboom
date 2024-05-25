<?php
include 'templates/header2.php';
require 'function.php';
if (isset($_POST['submit'])) {
    if (insertpelaporaniko($_POST) > 0) {
        echo "<script>alert('Data pelaporan anda berhasil terkirim.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data pelaporan anda gagal terkirim.'); window.location='form-iko.php';</script>";
    }
}

?>
<h1 style="margin-top: -40px;">Form Pelaporan Kegiatan IKO</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row p-3">
                <div class="form-group">
                    <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" name="tgl_kegiatan" id="tgl_kegiatan" class="form-control" required>
                    <div>
                <div class="form-group">
                    <label for="nama">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                <div>
                            <label for="tim">Tim Pelapor</label>
                            <select name="tim" id="tim" class="form-control">
                                <option value="Pancanaka 1">Pancanaka 1</option>
                                <option value="Pancanaka 2">Pancanaka 2</option>
                                <option value="Pancanaka 3">Pancanaka 3</option>
                                <option value="Tibum">Tibum</option>
                            </select>
                            <div>
                            <div>
                                <label for="ket">Keterangan</label>
                                <textarea name="ket" id="ket" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Tambahkan Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
                                <p style="color: red"> Ukuran maksimal 2 MB </p>
                            </div>
                            <div>
                                <input type="file" id="file-input" accept="image/*" style="display: none;">
                                <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-paper-plane mr-3"></span>Kirim</button>
                                <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-1"></span>Reset Form</button>
                            </div>
</form>