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
    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tabel_login SET status = 'aktif' WHERE id='".$_GET['id']."'";

    if ($koneksi->query($sql) === TRUE) {
        header("location: table-user-login.php"); 
    } else {
        // jika gagal tampil ini
         header("location: table-user-login.php"); 
    }



    $koneksi->close();
?>
