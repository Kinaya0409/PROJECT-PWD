<?php
// Cek tombol simpan ditekan
if (isset($_POST['simpan'])) {

    // Koneksi DB
    include('koneksi.php');

    // Ambil data dari form edit
    $id_tugas = $_POST['id_tugas'];
    $matakuliah = $_POST['matakuliah'];
    $deskripsi_tugas = $_POST['deskripsi_tugas'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    // Query UPDATE data tugas
    $update = mysqli_query($koneksi, "
        UPDATE tugas SET 
            matakuliah='$matakuliah',
            deskripsi_tugas='$deskripsi_tugas',
            deadline='$deadline',
            status='$status'
        WHERE id_tugas='$id_tugas'
    ") or die(mysqli_error($koneksi));

    // Jika berhasil
    if ($update) {
        echo "<script>
                alert('Tugas berhasil diperbarui!');
                window.location='ReadTugas.php'; // kembali ke halaman daftar tugas
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui tugas!');
                window.location='EditTugas.php?id_tugas=$id_tugas';
              </script>";
    }

} else {
    // Jika akses file ini tanpa klik tombol simpan
    echo "<script>window.history.back();</script>";
}
?>
