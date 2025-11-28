<?php
include("koneksi.php");

if(isset($_POST['matakuliah'])){

    $id_user    = $_POST['id_user'];
    $matakuliah = $_POST['matakuliah'];
    $hari       = $_POST['hari'];
    $sesi       = $_POST['sesi'];

    $query = mysqli_query($koneksi, "
        INSERT INTO jadwal (id_user, matakuliah, hari, sesi)
        VALUES ('$id_user', '$matakuliah', '$hari', '$sesi')
    ") or die(mysqli_error($koneksi));

    if($query){
        echo "<script>
                alert('Jadwal berhasil ditambahkan!');
                window.location='ReadJadwal.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambah jadwal!');
                window.location='CreateJadwal.php';
              </script>";
    }

} else {
    echo "<script>window.history.back();</script>";
}
?>
