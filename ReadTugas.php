<?php
include("koneksi.php");

// sementara id_user = 1
$id_user = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Mingguan</title>

    <link rel="stylesheet" href="css/noteTugas.css">
    <script type="text/javascript" src="js/tugas.js" defer></script>


</head>

<body>
<div class="container">
    <h1>Tugas Mingguan</h1>
    <p>Daftar tugas mingguan</p>

    <a href="CreateTugas.php" class="btn">➕ Tambah Tugas</a><br><br>

    <div class="table-wrap">
        <table class="tasks">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody id="taskTable">
                <?php
                $no = 1;
                $query = mysqli_query($koneksi,
                    "SELECT * FROM tugas WHERE id_user='$id_user' ORDER BY id_tugas DESC");

                if(mysqli_num_rows($query) == 0){
                    echo '<tr><td colspan="6">Belum ada tugas!</td></tr>';
                } else {
                    while($data = mysqli_fetch_assoc($query)){
                        $deadline = date("d-m-Y", strtotime($data['deadline']));
                        echo "
                        <tr data-id='{$data['id_tugas']}'>
                            <td>{$no}</td>
                            <td>{$data['matakuliah2']}</td>
                            <td>{$data['deskripsi_tugas']}</td>
                            <td>{$deadline}</td>
                            <td data-status='{$data['status']}'>{$data['status']}</td>
                            <td class='actions'>
                                <button class='btn btn-small edit'>Edit</button>
                                <button class='btn btn-small btn-danger delete'>Hapus</button>
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
        <a class="link-back btn" href="ReadJadwal.php">Ke Jadwal</a>
    </div>
</div>

</body>
</html>
