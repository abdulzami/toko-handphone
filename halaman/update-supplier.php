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
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $notelepon = $_POST['notelepon'];

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tabel_supplier SET nama = '$nama', alamat = '$alamat', no_telepon = '$notelepon' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        header("location: table-supplier.php"); 
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: " . $koneksi->error;
    }



    $koneksi->close();
?>