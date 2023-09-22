<?php
require_once 'koneksi_delete.php';
 $id	=  $_GET['id'];						
 if(empty($id))
 {
 	header('location:table-supplier.php');
 }
 else
 {
	 $res = $db->query("DELETE FROM tabel_supplier where id=$id");
	 if($res)
	 {
	 	header('location:table-supplier.php');
	 }
 }


?>