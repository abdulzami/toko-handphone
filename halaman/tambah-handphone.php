<?php 	
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, "handphone"); // Koneksi ke MySQL
// $query ="INSERT INTO tabel_handphone values ('','".$_POST['merk']."','".$_POST['tipe']."','".$_POST['harga']."',0,'".$_POST['gambar']."')";
// 		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
// 		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
// 						// Jika Sukses, Lakukan :
// 			header("location: table-handphone.php"); // Redirectke halaman index.php
// 				}	
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$merk=$_POST['merk'];
$tipe=$_POST['tipe'];
$harga=$_POST['harga'];
$stok = 0;

// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
	if($ukuran_file <= 10000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
		// Proses upload
		if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
			// Jika gambar berhasil diupload, Lakukan :	
			// Proses simpan ke Database
			$query = "INSERT INTO tabel_handphone (id,merk_hp,tipe_hp,harga,stok,gambar) VALUES('','".$merk."','".$tipe."','".$harga."','".$stok."','".$nama_file."')";
			$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
			
			if($sql){ // Cek jika proses simpan ke database sukses atau tidak
				// Jika Sukses, Lakukan :
				header("location: table-handphone.php"); // Redirectke halaman index.php
			}else{
				// Jika Gagal, Lakukan :
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='table-handphone.php'>Kembali Ke Form</a>";
			}
		}else{
			// Jika gambar gagal diupload, Lakukan :
			echo "Maaf, Gambar gagal untuk diupload.";
			echo "<br><a href='table-handphone.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika ukuran file lebih dari 1MB, lakukan :
		echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
		echo "<br><a href='table-handphone.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
	echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	echo "<br><a href='table-handphone.php'>Kembali Ke Form</a>";
}
 ?>