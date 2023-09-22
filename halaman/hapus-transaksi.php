<?php 	
include 'koneksitable.php';
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, "handphone");// Eksekusi/ Jalankan query dari variabel $query
?>

<?php
	$query ="DELETE FROM tabel_transaksi where id='".$_GET['id']."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
			header("location: entry-transaksi.php?pesan=hapus"); // Redirectke halaman index.php
		}	else {
			echo "gaga;";
		}
 ?>

