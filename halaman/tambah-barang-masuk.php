<?php 	
include 'koneksitable.php';
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$hp = $_POST['hp'];
$jumlah = $_POST['jumlah'];
$connect = mysqli_connect($host, $user, $pass, "handphone");// Eksekusi/ Jalankan query dari variabel $query
$query ="INSERT INTO tabel_barangmasuk values ('','".$_POST['tanggal']."','".$_POST['hp']."','".$_POST['supplier']."','".$_POST['jumlah']."')";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
			header("location: entry-barangmasuk?pesan=oke.php"); // Redirectke halaman index.php
				}	

 ?>
 <?php
$hasil = $db->QUERY("SELECT * FROM tabel_handphone  WHERE  id ='$hp' ");
$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
$no =1;
foreach ($rows as $row):
?>
<?php $stok =$row['stok'];?>
		<?php
		$no++;
		endforeach;
		?>
<?php 	
$stokakhir = $stok + $jumlah;
$query2 ="UPDATE tabel_handphone set stok = '$stokakhir' where id='$hp'";
		$sql2 = mysqli_query($connect, $query2); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
			header("location: entry-barangmasuk.php?pesan=oke"); // Redirectke halaman index.php
				}	
 ?>