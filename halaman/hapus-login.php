<?php
require_once 'koneksi_delete.php';
 $id	=  $_GET['id'];						
 if(empty($id))
 {
 	header('location:table-user-login.php?pesan=gagallog');
 }
 else
 {
	 $res = $db->query("DELETE FROM tabel_login where id=$id");
	 if($res)
	 {
	 	header('location:table-user-login.php?pesan=sukseslog');
	 }
 }


?>