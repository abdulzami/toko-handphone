<?php
session_start();
session_destroy();
if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
$username = $_COOKIE['username'];
$pass = $_COOKIE['password'];
				setcookie('username',$username,time()-1);
				setcookie('password',$pass,time()-1);
			}
header('location:index.php');
?>