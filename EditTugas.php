<?php
include("koneksi.php");

if(!isset($_GET['id_tugas'])){
    echo '<script>window.history.back()</script>';
    exit();
}

$id_tugas = $_GET['id_tugas'];

$query = mysqli_query($koneksi, 
    "SELECT * FROM tugas WHERE id_tugas='$id_tugas'"
) or die(mysqli_error($koneksi));

if(mysqli_num_rows($query) == 0){
    echo '<script>window.history.back()</script>';
    exit();
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <link rel="stylesheet" type="text/css" href="css/noteTugas.css" />
</head>

<body>

<div class="container">
    <h1>Edit Tugas</h1>
    <p>Ubah informasi tugas</p>

    <form action="EditTugas-proses.php" method="post" id="task-form">

        <input type="hidden" name="id_tugas" value="<?= $data['id_tugas']; ?>">

        <div class="form-row">
            <label>Mata Kuliah</label>
            <input type="text" name="matakuliah2" required 
                   value="<?= $data['matakuliah2']; ?>">
        </div>

        <div class="form-row">
            <label>Deskripsi Tugas</label>
            <input type="text" name="deskripsi_tugas" required 
                   value="<?= $data['deskripsi_tugas']; ?>">
        </div>

        <div class="form-row">
            <label>Deadline</label>
            <input type="date" name="deadline" required 
                   value="<?= $data['deadline']; ?>">
        </div>

        <div class="form-row">
            <label>Status</label>
            <select name="status" required>
                <option value="Belum"   <?= ($data['status']=="Belum") ? "selected":""; ?>>Belum</option>
                <option value="Selesai" <?= ($data['status']=="Selesai") ? "selected":""; ?>>Selesai</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" name="simpan" class="btn">Simpan</button>
            <a href="ReadTugas.php" class="btn btn-ghost">Batal</a>
        </div>

    </form>
</div>

</body>
</html>
