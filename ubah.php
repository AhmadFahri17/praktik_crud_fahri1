<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];
// query data siswa sesuai id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];


// mengecek tombol telah di submit atau belum

if( isset($_POST["submit"])) {
   
// cek apakah data berhasil diubah atau tidak
  if( ubah($_POST)  > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
  }else {
    echo "
    <script>
        alert('dsta gagal diubah!');
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
    <title>ubah Data Siswa</title>
</head>
<body>
    <h1>Ubah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa["gambar"]; ?>">
    <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required value="<?= $siswa["nama"];?>">        
        </li>
        <li>
            <label for="nis">Nis : </label>
            <input type="text" name="nis" id="nis" required value="<?= $siswa["nis"];?>">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $siswa["jurusan"];?>">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" value="<?= $siswa["email"];?>">
        </li>
        <li>
            
            <label for="gambar">Gambar : </label> <br>
            <img src="img/<?= $siswa['gambar'];?>" width="40"  alt=""> <br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data</button>
        </li>
    </ul>
    
    </form>


    
</body>
</html>