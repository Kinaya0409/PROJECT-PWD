<?php
session_start();
include("koneksi.php");

// Jika user belum login
if(!isset($_SESSION['id_user'])){
    echo '<script>alert("Silakan login dahulu!"); window.location="login.php";</script>';
    exit();
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, 
    "SELECT * FROM users WHERE id_user='$id_user'"
) or die(mysqli_error($koneksi));

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="css/noteTugas.css"> <!-- Gunakan CSS yang sama dulu -->
</head>

<body>

<div class="container">
    <h1>Edit Profil</h1>
    <p>Perbarui informasi profilmu</p>

    <form action="UpdateProfil-proses.php" method="post" id="profile-form">

        <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">

        <div class="form-row">
            <label>Nama</label>
            <input type="text" name="nama" required 
                   value="<?= $data['nama']; ?>">
        </div>

        <div class="form-row">
            <label>Email</label>
            <input type="email" name="email" required 
                   value="<?= $data['email']; ?>">
        </div>

        <div class="form-row">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" 
                   placeholder="Kosongkan jika tidak ingin mengganti">
        </div>

        <div class="form-actions">
            <button type="submit" name="simpan" class="btn">Simpan</button>
            <a href="ReadProfil.php" class="btn btn-ghost">Batal</a>
        </div>

    </form>
</div>

</body>
</html>
