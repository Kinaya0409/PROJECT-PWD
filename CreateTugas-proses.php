<?php
include("koneksi.php");

if(isset($_POST['matakuliah'])){

    $id_user = $_POST['id_user'];
    $matakuliah2 = $_POST['matakuliah'];
    $deskripsi = $_POST['deskripsi_tugas'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $query = mysqli_query($koneksi, "
        INSERT INTO tugas (id_user, matakuliah2, deskripsi_tugas, deadline, status)
        VALUES ('$id_user', '$matakuliah2', '$deskripsi', '$deadline', '$status')
    ") or die(mysqli_error($koneksi));

    if($query){
        echo "<script>
                alert('Tugas berhasil ditambahkan!');
                window.location='ReadTugas.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambah tugas!');
                window.location='CreateTugas.php';
              </script>";
    }

} else {
    echo "<script>window.history.back();</script>";
}
?>
