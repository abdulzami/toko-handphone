<?php
	
	if(isset($_POST['login'])){
		include 'koneksi.php';
		$username = $_POST['username'];
		$pass     = $_POST['password'];

		$cek = mysqli_query($conn, "SELECT * from tabel_login where uname = '". $username ."' AND pass = '". $pass ."' ");
		$data = mysqli_fetch_array($cek);
		$level = $data['level'];
		$id = $data['id_pegatpem'];
		$status = $data['status'];
		$idnya = $data['id'];

		if(mysqli_num_rows($cek) > 0){
			if ($status == 'aktif') {
				session_start();
			$_SESSION['key'] = md5(time());
			$_SESSION['keyye'] = md5(time());
 			$_SESSION['level'] = $level;
			$_SESSION['id_pegatpem'] = $id;
			$_SESSION['idnya'] = $idnya;

				if(isset($_POST['remember'])){
				setcookie('username',$username,time()+60*60*7);
				setcookie('password',$pass,time()+60*60*7);
				header('location:halaman/index.php');
				}
				header('location:halaman/index.php');
			}else{
				header("location:index.php?pesan=gagalga")or die(mysql_error());
			}
			
		}else{
			header("location:index.php?pesan=gagal")or die(mysql_error());
		}

	}
?>