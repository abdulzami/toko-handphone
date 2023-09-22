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
     $pass = $_POST['pass'];
    $user = $_POST['user'];
    $level = $_POST['level'];

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tabel_login SET uname = '$user', pass = '$pass', level = '$level' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        header("location: table-user-login.php?pesan=suksesul"); 
    } else {
        // jika gagal tampil ini
         header("location: table-user-login.php?pesan=gagalul"); 
    }



    $koneksi->close();
?>
