<!DOCTYPE html>
<html>
<head>
    <title>CRUD Jadwal Belajar</title>
    <link rel="stylesheet" type="text/css" href="css/noteTugas.css" />
</head>
<body>
<h2>CRUD Jadwal Belajar</h2>
<p><a href="ReadJadwal.php">Beranda</a> / <a href="CreateJadwal.php">Tambah Jadwal</a></p>

<h3>Data Jadwal</h3>

<table cellpadding="5" cellspacing="0" border="1">
    <tr bgcolor="#CCCCCC">
        <th>No.</th>
        <th>Mata Kuliah</th>
        <th>Hari</th>
        <th>Sesi</th>
    </tr>

    <?php
    include("koneksi.php");

    $query = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id_jadwal DESC") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($query) == 0){
        echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
    } else {
        $no = 1;
        while($data = mysqli_fetch_assoc($query)){
            echo '<tr>';
            echo '<td>'.$no.'</td>';
            echo '<td>'.$data['matakuliah'].'</td>';
            echo '<td>'.$data['hari'].'</td>';
            echo '<td>Sesi '.$data['sesi'].'</td>';
            echo '<td><a href="Edit.php?id='.$data['id_jadwal'].'">Edit</a> / 
                       <a href="Delete.php?id='.$data['id_jadwal'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
            echo '</tr>';
            $no++;
        }
    }
    ?>
</table>

</body>
</html>
