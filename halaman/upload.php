<?php
session_start();
if(!isset($_SESSION['key']))
{
		header('location:../index.php');

}
require_once 'koneksitable.php';

$level=$_SESSION['level'];
$id = $_SESSION['id_pegatpem'];
$idnya = $_SESSION['idnya'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Neon | Dashboard</title>
	

	<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="../http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/neon-core.css">
	<link rel="stylesheet" href="../assets/css/neon-theme.css">
	<link rel="stylesheet" href="../assets/css/neon-forms.css">
	<link rel="stylesheet" href="../assets/css/custom.css">

	<script src="../assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Neon | Edit Photo</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 

	var progressbox     = $('#progressbox');
	var progressbar     = $('#progressbar');
	var statustxt       = $('#statustxt');
	var completed       = '0%';
	
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			uploadProgress: OnProgress,
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
//when upload progresses	
function OnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar.width(percentComplete + '%') //update progressbar percent complete
	statustxt.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Gambar Belum di Pilih");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		//Progress bar
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text

				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>
<link href="style/style.css" rel="stylesheet" type="text/css">
	
</head>
<body   class="page-body page-left-in" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="index.html">
					<img width="120" src="../assets/images/logo@2x.png" />
				</a><br><br>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
		
				
	<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- Search Bar -->
			<li>
				<a href="index.php">
					<i class="entypo-gauge"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<?php if ($_SESSION['level'] == 'admin'): ?>
				<li>
				<a href="">
					<i class="entypo-window"></i>
					<span>Data Tabel</span>
				</a>
				<ul>
					<li>
						<a href="table-handphone.php">
							<span>Data Handphone</span>
						</a>
					</li>
					<li>
						<a href="table-pembeli.php">
							<span>Data Pembeli</span>
						</a>
					</li>
					<li>
						<a href="table-supplier.php">
							<span>Data Supplier</span>
						</a>
					</li>
					<li>
						<a href="table-pegawai.php">
							<span>Data Pegawai</span>
						</a>
					</li>
					<li>
						<a href="table-user-login.php">
							<span>Data User Login</span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif ?>
			<?php if ($_SESSION['level'] == 'admin' | $_SESSION['level'] == 'kasir' ): ?>
			<li>
				<a href="">
					<i class="entypo-doc-text"></i>
					<span>Entry</span>
				</a>
				<ul>
					<li>
						<a href="entry-transaksi.php">
							<span>Entry Transaksi</span>
						</a>
					</li>
					<li>
						<a href="entry-barangmasuk.php">
							<span>Entry Barang Masuk</span>
						</a>
					</li>
				</ul>
			</li>
			<?php endif?>
						<li>
						<a href="ganti-password	.php">
						<i class="entypo-lock"></i>
							<span>Ganti Password</span>
						</a>
					</li>
					<?php if ($_SESSION['level'] == 'pembeli') : ?>
						<li>
						<a href="pembeli-form.php">
						<i class="entypo-basket"></i>
							<span>Beli Handphone</span>
						</a>
					</li>
					<?php endif ?>
					<?php if ($_SESSION['level'] == 'admin') : ?>
						<li>
						<a href="registrasi-form.php">
						<i class="entypo-lock"></i>
							<span>Registrasi</span>
						</a>
					</li>
					<?php endif ?>
					<?php if ($_SESSION['level'] == 'pembeli') : ?>
						<li>
						<a href="table-transaksi-pb.php">
						<i class="entypo-window"></i>
							<span>Tabel Transaksi Anda</span>
						</a>
					</li>
					<?php endif ?>
		</ul>
					
		</ul>
				
	</div>	
	<div class="main-content">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
						<!-- Profile Info -->
			<li class="profile-info dropdown"> <!-- add class "pull-right" if you want to place this from right -->
				
				<a href="profil.php">
					<?php
						$hasil = $db->QUERY("SELECT * FROM tabel_login WHERE  id ='$idnya';");
						$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
						$no =1;
						foreach ($rows as $row):
					?>
				<img src="uploads/<?php echo $row['foto'];?>" alt="" class="img-circle" width="44" />
				<?php
					$no++;
					endforeach;
					?>
				<?php if ($_SESSION['level'] == 'pembeli'): ?>
						<?php $hasil = $db->QUERY("SELECT * FROM tabel_pembeli WHERE  id ='$id';"); ?>
					<?php endif ?>
					<?php if ($_SESSION['level'] == 'admin' | $_SESSION['level'] == 'kasir') : ?>
						<?php $hasil = $db->QUERY("SELECT * FROM tabel_pegawai WHERE  id ='$id';"); ?>
					<?php endif ?>
					<?php
						$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
						$no =1;
						foreach ($rows as $row):
					?>
					<?php echo $row['nama']; ?>
					<?php
					$no++;
					endforeach;
					?>
					
				</a>

			</li>
		
		</ul>
	
	</div>
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
			
			<li>
				<a href="../logout.php">
					Log Out <i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
		
	</div>
	
</div>

<hr/>
<div id="upload-wrapper">
<div align="center">
<h3>Edit Foto</h3>
<span class="">Tipe Gambar harus jpg, jpeg, png, gif | Maksimal ukuran 1mb</span>
<form action="processupload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
<input type="hidden" name="kode" value="<?php echo $_SESSION['idnya'];?>" >
<input name="ImageFile" id="imageInput" type="file" /><br>
<input type="submit"  id="submit-btn" value="Edit" />
<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
</form>
<div id="progressbox" style="display:none;"><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>
</div>
</div>
	<link rel="stylesheet" href="../assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="../assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom Scripts -->
	<script src="../assets/js/gsap/main-gsap.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>
	<script src="../assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="../assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="../assets/js/jquery.sparkline.min.js"></script>
	<script src="../assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="../assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="../assets/js/raphael-min.js"></script>
	<script src="../assets/js/morris.min.js"></script>
	<script src="../assets/js/toastr.js"></script>
	<script src="../assets/js/neon-chat.js"></script>
	<script src="../assets/js/neon-custom.js"></script>
	<script src="../assets/js/neon-demo.js"></script>
</body>