<?php
// Cek apakah tombol simpan ditekan
if (isset($_POST['simpan'])) {

    // Koneksi ke database
    include('koneksi.php');

    // Ambil data dari form
    $id_jadwal   = $_POST['id_jadwal'];
    $matakuliah  = $_POST['matakuliah'];
    $hari        = $_POST['hari'];
    $sesi        = $_POST['sesi'];

    // Query UPDATE data Jadwal
    $update = mysqli_query($koneksi, "
        UPDATE jadwal SET 
            matakuliah='$matakuliah',
            hari='$hari',
            sesi='$sesi'
        WHERE id_jadwal='$id_jadwal'
    ") or die(mysqli_error($koneksi));

    // Jika berhasil update jadwal
    if ($update) {
        echo "<script>
                alert('Jadwal berhasil diperbarui!');
                window.location='ReadJadwal.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui jadwal!');
                window.location='EditJadwal.php?id_jadwal=$id_jadwal';
              </script>";
    }

} else {
    // Jika file diakses tanpa klik simpan
    echo "<script>window.history.back();</script>";
}
?>
