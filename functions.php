<?php 
     //koneksi  ke database
     $conn = mysqli_connect("localhost", "root", "", "datasiswa");
     


     function query($query) {
         global $conn;
         $result = mysqli_query($conn, $query);
         $rows = [];
         while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
         } 
         return $rows;
    }


function tambah($data) {
        // ambil data dari tiap elemen dalam from
        global $conn;
        $nama =htmlspecialchars($data["nama"]) ;
        $nis =htmlspecialchars($data["nis"]) ;
        $jurusan =htmlspecialchars($data["jurusan"]) ;
        $email =htmlspecialchars($data["email"]) ;
       
        // upload gambar
        $gambar = upload();
        if( !$gambar) {
            return false;
        }


         //  query insert data
    $query = "INSERT INTO siswa 
    VALUES 
    ('', '$nama', '$nis', '$jurusan', '$email', '$gambar')
";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);


}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah gambar di upload atau tidak
    if( $error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
             </script>";
             return false;
    }

    // cek yang di uupload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg' , 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
        alert('Yang anda upload bukan gambar!!!');
     </script>";
     return false;

    }

    // cek jika ukuran terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
     </script>";
     return false;
    }


    // lolos pengecekan, gambar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");


    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nama =htmlspecialchars($data["nama"]) ;
    $nis =htmlspecialchars($data["nis"]) ;
    $jurusan =htmlspecialchars($data["jurusan"]) ;
    $email =htmlspecialchars($data["email"]) ;
    $gambarLama =htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru agtau tidak
    if( $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    }else {
        $gambar = upload() ;
    }
    


     //  query insert data
$query = "UPDATE siswa SET 
            nama = '$nama',
            nis = '$nis', 
            jurusan = '$jurusan', 
            email = '$email',
            gambar = '$gambar'
        WHERE id = $id 

        ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

function cari($keyword) {
    $query = "SELECT * FROM siswa 
                WHERE 
                nama LIKE '%$keyword%' OR 
                jurusan  LIKE '%$keyword%' OR
                nis LIKE '%$keyword%'
                ";
    return query($query);            
}






?>


