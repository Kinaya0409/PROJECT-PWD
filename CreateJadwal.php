<?php
// sementara id_user statis seperti contohmu
$id_user = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" type="text/css" href="css/jadwal.css">
</head>
<body>

<div class="container">
    <h1>Tambah Jadwal</h1>
    <p>Isi data jadwal kuliah baru</p>

    <form action="CreateJadwal-proses.php" method="post" id="jadwal-form">

        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

        <div class="form-row">
            <label>Mata Kuliah</label>
            <input type="text" name="matakuliah" required>
        </div>

        <div class="form-row">
            <label>Hari</label>
            <select name="hari" required>
                <option value="">-- Pilih Hari --</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
            </select>
        </div>

        <div class="form-row">
            <label>Sesi</label>
            <select name="sesi" required>
                <option value="">-- Pilih Sesi --</option>
                <option value="1">Sesi 1</option>
                <option value="2">Sesi 2</option>
                <option value="3">Sesi 3</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">Simpan</button>
            <a href="ReadJadwal.php" class="btn btn-ghost">Batal</a>
        </div>

    </form>

</div>

</body>
</html>
