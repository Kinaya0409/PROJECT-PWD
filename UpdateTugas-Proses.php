<?php
include("koneksi.php");

if(isset($_POST['simpan'])){

    $id_tugas = $_POST['id_tugas'];
    $matakuliah2 = $_POST['matakuliah2'];
    $deskripsi = $_POST['deskripsi_tugas'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $update = mysqli_query($koneksi, 
        "UPDATE tugas SET
            matakuliah2='$matakuliah2',
            deskripsi_tugas='$deskripsi',
            deadline='$deadline',
            status='$status'
        WHERE id_tugas='$id_tugas'
    ") or die(mysqli_error($koneksi));

    if($update){
        echo "<script>
            alert('Tugas berhasil diupdate!');
            window.location='ReadTugas.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal update tugas!');
            window.history.back();
        </script>";
    }

} else {
    echo '<script>window.history.back()</script>';
}
?>
