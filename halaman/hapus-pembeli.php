<?php
require_once 'koneksi_delete.php';
 $id	=  $_GET['id'];						
 if(empty($id))
 {
 	header('location:table-pembeli.php');
 }
 else
 {
	 $res = $db->query("DELETE FROM tabel_pembeli where id=$id");
	 if($res)
	 {
	 	header('location:table-pembeli.php');
	 }
 }


?>