<?php 	
include 'koneksitable.php';
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$hp = $_POST['hp'];
$jumlah = $_POST['jumlah'];

$connect = mysqli_connect($host, $user, $pass, "handphone");// Eksekusi/ Jalankan query dari variabel $query
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
if ($jumlah > $stok) {
	header("location: pembeli-form.php?pesan=kurang");
}else {
	$query ="INSERT INTO tabel_transaksi values ('','".$_POST['tanggal']."','".$_POST['pembeli']."','".$_POST['hp']."','".$_POST['jumlah']."','belumdibayar')";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
			header("location: pembeli-form.php?pesan=sukses"); // Redirectke halaman index.php
				}	
}
		

 ?>