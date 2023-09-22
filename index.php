<?php
session_start();
if(isset($_SESSION['key']))
{
header('location:halaman/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Neon | Login</title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">



<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a class="logo">
				<img src="assets/images/logo@2x.png" width="120" alt="" />
			</a>
			<!-- progress bar indicator -->
		</div>
		
	</div>
				<div class="login-content">
				<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username atau Password Salah !!</div>";
			}else if($_GET['pesan'] == "gagalga"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Akun anda telah dinonaktifkan !!</div>";
			}
		}
		?><br>
	<div class="login-form">

		
							
			<form method="POST" role="form" action="proses.php">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="username" placeholder="Username" id="user" autocomplete="off" required />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control pass" name="password" placeholder="Password" id="pass" autocomplete="off" required />
					</div>
				
				</div>
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<table><tr><td>Show Password &nbsp;</td><td><input type="checkbox" class="form-checkbox"></td></tr></table>
						</div>
						
						
					</div>
				
				</div>
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<table><tr><td>Remember Me &nbsp;</td><td><input type="checkbox" name="remember"></td></tr></table>
						</div>
						
						
					</div>
				
				</div>
				
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login" name="login">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>
				
				
				<!-- 
				
				You can also use other social network buttons
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
						Login with Twitter
						<i class="entypo-twitter"></i>
					</button>
					
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google+
						<i class="entypo-gplus"></i>
					</button>
					
				</div> -->				
			</form>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.pass').attr('type','text');
			}else{
				$('.pass').attr('type','password');
			}
		});
	});
</script>
	<?php
if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
$username = $_COOKIE['username'];
$pass = $_COOKIE['password'];

echo"<script>
	document.getElementById('user').value = '$username';
	document.getElementById('pass').value = '$pass';
</script>
";
}?>

</body>