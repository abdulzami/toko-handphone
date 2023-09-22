<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "handphone";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    //menangkap parameter yang dikirimkan dari detail.php
    $id = $_POST['id'];
     $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tabel_handphone SET merk_hp = '$merk', tipe_hp = '$tipe', harga = '$harga', stok = '$stok' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        header("location: table-handphone.php"); 
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: " . $koneksi->error;
    }



    $koneksi->close();
?>
