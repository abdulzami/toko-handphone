<?php  
	$db = new mysqli('localhost','root','','handphone');
		if($db->connect_errno)
		{
			echo $db->connect_error;
			die('ada kesalahan');
		}
?>