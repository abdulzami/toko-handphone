<?php 
include 'config.php';
$pilihan=$_POST['pilihan'];
$id=$_POST['id'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$ulang=$_POST['ulang'];

if ($pilihan == 'pembeli') {
	$cek=mysql_query("select * from tabel_login where id_pegatpem ='$id' and level = 'pembeli' ");
	$cek2=mysql_query("select * from tabel_pembeli where id ='$id'");
	$cek3=mysql_query("select * from tabel_login where uname ='$user'");
	if (mysql_num_rows($cek)==1) {
		header("location:registrasi-form.php?pesan=gagal");
	}else if (mysql_num_rows($cek2)==0) {
		header("location:registrasi-form.php?pesan=gagal2");
	}else if (mysql_num_rows($cek3)==1) {
		header("location:registrasi-form.php?pesan=gagal3");
	}else if ($pass==$ulang) {
		mysql_query("INSERT INTO tabel_login values ('','$user','$pass','noimage.jpg','pembeli','$id')");
		header("location:registrasi-form.php?pesan=oke");
	}else {
		header("location:registrasi-form.php?pesan=tdksama");
	}
}else {
	$cek=mysql_query("select * from tabel_login where id_pegatpem ='$id' and level = 'kasir' ");
	$cek2=mysql_query("select * from tabel_pegawai where id ='$id'");
	$cek3=mysql_query("select * from tabel_login where uname ='$user'");
	if (mysql_num_rows($cek)==1) {
		header("location:registrasi-form.php?pesan=gagal");
	}else if (mysql_num_rows($cek2)==0) {
		header("location:registrasi-form.php?pesan=gagal2");
	}else if (mysql_num_rows($cek3)==1) {
		header("location:registrasi-form.php?pesan=gagal3");
	}else if ($pass==$ulang) {
		mysql_query("INSERT INTO tabel_login values ('','$user','pass','noimage.jpg','kasir','$id')");
		header("location:registrasi-form.php?pesan=oke");
	}else {
		header("location:registrasi-form.php?pesan=tdksama");
	}
}

 ?>	