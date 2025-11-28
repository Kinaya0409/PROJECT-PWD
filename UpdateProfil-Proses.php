<?php
session_start();
include 'koneksi.php';

$id = $_SESSION['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cek email duplikat kecuali email user sendiri
$cekEmail = mysqli_query($conn, 
"SELECT * FROM users WHERE email='$email' AND id_user != '$id'"
);

if (mysqli_num_rows($cekEmail) > 0) {
    echo "<script>alert('Email sudah digunakan!'); window.location='UpdateProfil.php';</script>";
    exit();
}

// Jika password diisi → hash
if (!empty($password)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users 
                    SET nama='$nama', email='$email', password='$passwordHash' 
                    WHERE id_user='$id'";
} else {
    // Jika password tidak diubah
    $updateQuery = "UPDATE users 
                    SET nama='$nama', email='$email' 
                    WHERE id_user='$id'";
}

if (mysqli_query($conn, $updateQuery)) {
    echo "<script>alert('Data berhasil diperbarui'); window.location='ReadProfil.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>
