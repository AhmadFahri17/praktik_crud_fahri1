<?php
require 'functions.php';
// mengecek tombol telah di submit atau belum

if( isset($_POST["submit"])) {


   
// cek apakah data berhasil di tambahkan atau tidak
  if( tambah($_POST)  > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
  }else {
    echo "
    <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
    </script>
";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required>        
        </li>
        <li>
            <label for="nis">Nis : </label>
            <input type="text" name="nis" id="nis" required>
        </li>
        <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required>
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Tambah Data</button>
        </li>
    </ul>
    
    </form>


    
</body>
</html>