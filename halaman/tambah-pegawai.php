<?php 	
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, "handphone"); // Koneksi ke MySQL
$query ="INSERT INTO tabel_pegawai values ('','".$_POST['nama']."','".$_POST['jeniskelamin']."','".$_POST['alamat']."','".$_POST['notelepon']."')";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
			header("location: table-pegawai.php"); // Redirectke halaman index.php
				}	
 ?>