<?php
include("koneksi.php");

// sementara id_user = 1
$id_user = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Belajar</title>

    <link rel="stylesheet" href="css/noteTugas.css">
</head>

<body>
<div class="container">

    <h1>Jadwal Belajar</h1>
    <p>Daftar jadwal mingguan</p>

    <a href="CreateJadwal.php" class="btn">➕ Tambah Jadwal</a><br><br>

    <div class="table-wrap">
        <table class="tasks">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Sesi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi,
                    "SELECT * FROM jadwal WHERE id_user='$id_user' ORDER BY id_jadwal DESC");

                if(mysqli_num_rows($query) == 0){
                    echo '<tr><td colspan="6">Belum ada jadwal!</td></tr>';
                } else {
                    while($data = mysqli_fetch_assoc($query)){
                        echo "
                        <tr>
                            <td>{$no}</td>
                            <td>{$data['matakuliah']}</td>
                            <td>{$data['hari']}</td>
                            <td>Sesi {$data['sesi']}</td>
                            <td class='actions'>
                                <a href='UpdateJadwal.php?id={$data['id_jadwal']}' class='btn btn-small'>Edit</a>
                                <a href='DeleteJadwal.php?id={$data['id_jadwal']}' 
                                   class='btn btn-small btn-danger'
                                   onclick='return confirm(\"Yakin hapus data?\")'>
                                   Hapus
                                </a>
                            </td>
                        </tr>";
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="nav-buttons">
        <a class="link-back btn" href="profil.html">Kembali ke Profil</a>
        <a class="link-back btn" href="ReadTugas.php">Ke Tugas</a>
    </div>
</div>

</body>
</html>
