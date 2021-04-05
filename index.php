<?php 
require 'functions.php';
$siswa = query("SELECT * FROM siswa");

//tombol cari ditekan
if( isset($_POST["cari"]) ) {
 $siswa = cari($_POST["keyword"]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>



<body>
<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Siswa</a>
<br><br>
<form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword Pencarian.." autocomplete="off">
    <button type="submit" name="cari" >Cari!</button>

</form>
<br><br>

<table border="1" cellpadding="10" cellspacing="0" class="table table-striped">
        <tr>
            <th>No</th>
             <th>Gambar</th> 
           <th>Nama</th>
           <th>Nis</th>
             <th>Jurusan</th>
             <th>Email</th>
            <th>Aksi</th>
        
        </tr>
        <?php $i = 1; ?>
    <?php foreach ( $siswa as $row) :?>

    <tr>
        <td><?= $i; ?></td>
          <td>
            <img src="img/<?= $row["gambar"];?>" width="50">
        </td>

        <td><?= $row["nama"]?></td>
        <td><?= $row["nis"]?></td>
        <td><?= $row["jurusan"]?></td>
        <td><?= $row["email"]?></td>

        <td>
            <a href="hapus.php?id=<?= $row["id"];?>" style="text-decoration:none" onclick="return confirm('yakin?');">Hapus</a> |
            <a href="ubah.php ?id=<?= $row["id"];?>" style="text-decoration:none">Ubah</a>
        </td>
        
        
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>    

</table>
</body>
</html>