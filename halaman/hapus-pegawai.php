<?php
require_once 'koneksi_delete.php';
 $id	=  $_GET['id'];						
 if(empty($id))
 {
 	header('location:table-pegawai.php');
 }
 else
 {
	 $res = $db->query("DELETE FROM tabel_pegawai where id=$id");
	 if($res)
	 {
	 	header('location:table-pegawai.php');
	 }
 }


?>