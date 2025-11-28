<?php
// untuk sementara id_user masih statis dulu ya
$id_user = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <link rel="stylesheet" type="text/css" href="css/noteTugas.css" />
</head>
<body>

<div class="container">
    <h1>Tambah Tugas</h1>
    <p>Isi informasi tugas baru</p>

    <form action="CreateTugas-proses.php" method="post" id="task-form">

        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

        <div class="form-row">
            <label>Mata Kuliah</label>
            <input type="text" name="matakuliah" required>
        </div>

        <div class="form-row">
            <label>Deskripsi Tugas</label>
            <input type="text" name="deskripsi_tugas" required>
        </div>

        <div class="form-row">
            <label>Deadline</label>
            <input type="date" name="deadline" required>
        </div>

        <div class="form-row">
            <label>Status</label>
            <select name="status" required>
                <option value="Belum">Belum</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">Simpan</button>
            <a href="ReadTugas.php" class="btn btn-ghost">Batal</a>
        </div>
    </form>

</div>

</body>
</html>
