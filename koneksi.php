<?php
// menghubungkan ke MySQL
$koneksi = mysqli_connect("localhost", "root", "", "planner_db");

// cek koneksi
if (!$koneksi) {
    die("Gagal terkoneksi: " . mysqli_connect_error());
}
?>
