<?php
include 'koneksitable.php';
session_start();
if(!isset($_SESSION['key']))
{
		header('location:../index.php');

}
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
	
	<title>Neon | Data Tables</title>
	

	<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
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
	
	
</head>
<body class="page-body page-fade"  data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="index.html">
					<img width="120" src="../assets/images/logo@2x.png" />
				</a>
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
<div class="profile-env">
	<ol class="breadcrumb bc-3">
						<li>
				<a href="index.php"><i class="entypo-home"></i>Home</a>
			</li>
				<li class="active">
			
							<a><strong>Profile</strong></a>
					</li>
					</ol>
	<header class="row">
		
		<div class="col-sm-2">

	
			<a href="#" class="profile-picture">
					<?php
						$hasil = $db->QUERY("SELECT * FROM tabel_login WHERE  id ='$idnya';");
						$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
						$no =1;
						foreach ($rows as $row):
					?>
					<img src="uploads/<?php echo $row['foto'];?>" alt="" class="img-circle" /><?php
		$no++;
		endforeach;
		?>
			</a>
			
		</div>
		
		<div class="col-sm-7">
			
			<ul class="profile-info-sections">
				<li>
					<div class="profile-name">
						<strong>
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
							<a href="#"><i class="entypo-user"></i><?php echo $row['nama'];?></a>
							<!-- User statuses available  classes "is-online", "is-offline", "is-idle", "is-busy" -->						</strong>
						<?php
		$no++;
		endforeach;
		?>
					</div>
				</li>
			</ul>
			
		</div>		
	</header>
	
	<section class="profile-info-tabs">
		
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-10">
				
				<ul class="user-details">
					<?php if ($_SESSION['level'] == 'admin' | $_SESSION['level'] == 'kasir'): ?>
						<li>
						<a href="#">
							<i class="entypo-location"></i>
							Works in <span>Handphone Store</span>
						</a>
					</li>
					<?php endif ?>
					<li>
					<i class="entypo-user"></i>
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
		
					<?php
		$no++;
		endforeach;
		?>
					Nama : <?php echo $row['nama']?>

					</li>
					<li>
					<i class="entypo-user"></i>
					Jenis Kelamin : <?php echo $row['jenis_kelamin']?>
					</li>
					<li>
					<i class="entypo-home"></i>
					Alamat : <?php echo $row['alamat']?>
					</li>
					<li>
					<i class="entypo-phone"></i>
					No Telepon : <?php echo $row['no_telepon']?>
					</li>
				</ul>
				<ul class="nav nav-tabs">

					<li> <a href="upload.php">Edit Foto Profil</a></li>
				</ul>
			</div>
			
		</div>
		
	</section>
</div>	<bR><bR><bR><bR>
</div>
	<link rel="stylesheet" href="../assets/js/datatables/responsive/css/datatables.responsive.css">
	<link rel="stylesheet" href="../assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="../assets/js/select2/select2.css">

	<!-- Bottom Scripts -->
	<script src="../assets/js/gsap/main-gsap.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/datatables/TableTools.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.js"></script>
	<script src="../assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
	<script src="../assets/js/datatables/lodash.min.js"></script>
	<script src="../assets/js/datatables/responsive/js/datatables.responsive.js"></script>
	<script src="../assets/js/select2/select2.min.js"></script>
	<script src="../assets/js/neon-chat.js"></script>
	<script src="../assets/js/neon-custom.js"></script>
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>