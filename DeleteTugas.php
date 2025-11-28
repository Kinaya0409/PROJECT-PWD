<?php
include("koneksi.php");

if(isset($_GET['id_tugas'])){

    $id_tugas = $_GET['id_tugas'];

    // cek data di database
    $cek = mysqli_query($koneksi, 
        "SELECT id_tugas FROM tugas WHERE id_tugas='$id_tugas'"
    ) or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek) == 0){
        echo '<script>window.history.back()</script>';
    } else {

        $del = mysqli_query($koneksi, 
            "DELETE FROM tugas WHERE id_tugas='$id_tugas'"
        ) or die(mysqli_error($koneksi));

        if($del){
            echo "<script>
                    alert('Tugas berhasil dihapus!');
                    window.location='ReadTugas.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus tugas!');
                    window.history.back();
                  </script>";
        }
    }

} else {
    echo '<script>window.history.back()</script>';
}
?>
