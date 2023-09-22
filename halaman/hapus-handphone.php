<?php
require_once 'koneksi_delete.php';
 $id	=  $_GET['id'];						
 if(empty($id))
 {
 	header('location:table-handphone.php');
 }
 else
 {
	 $res = $db->query("DELETE FROM tabel_handphone where id=$id");
	 if($res)
	 {
	 	header('location:table-handphone.php');
	 }
 }


?>