<?php 
include 'config.php';
$user=$_POST['user'];
$lama=$_POST['lama'];
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];
$kode=$_POST['id'];
	
$cek=mysql_query("select * from tabel_login where pass='$lama' and id ='$kode'");
if(mysql_num_rows($cek)==1){
	if($baru==$ulang){
		$b = $baru;
		mysql_query("update tabel_login set pass='$b' where id ='$kode'");
		header("location:ganti-password.php?pesan=oke");
	}else{
		header("location:ganti-password.php?pesan=tdksama");
	}
}else{
	header("location:ganti-password.php?pesan=gagal");
}

 ?>	