<?php
session_start();
include 'koneksi.php';

$message = "";

// Jika user klik tombol daftar
if (isset($_POST['register'])) {

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Cek apakah email sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $message = "Email sudah digunakan!";
    } else {
        // Hash password
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Insert user baru
        $query = "INSERT INTO user (nama, email, password) 
                  VALUES ('$nama', '$email', '$hashed')";

        if (mysqli_query($koneksi, $query)) {
            $message = "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
        } else {
            $message = "Gagal menyimpan: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { width: 300px; margin-top: 20px; }
        input { width: 100%; padding: 8px; margin: 6px 0; }
        button { width: 100%; padding: 10px; cursor: pointer; }
        .msg { margin-top: 15px; color: red; }
    </style>
</head>
<body>

<h2>Form Registrasi</h2>

<?php if ($message != "") echo "<div class='msg'>$message</div>"; ?>

<form action="" method="POST">

    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit" name="register">Daftar</button>
</form>

<p>Sudah punya akun? <a href="login.php">Login</a></p>

</body>
</html>
