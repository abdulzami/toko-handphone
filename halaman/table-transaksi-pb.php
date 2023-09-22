<?php
require_once 'koneksitable.php';
session_start();
if(!isset($_SESSION['key']))
{
		header('location:../index.php');

}elseif ($_SESSION['level'] == 'kasir' | $_SESSION['level'] == 'admin' ) {
	header("location:index.php?pesan=gagal");
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
	
	<title>Neon | Forms</title>
	

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
<body class="page-body page-right-in" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="index.html">
					<img src="../assets/images/logo@2x.png" width="120" alt="" />
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
						<a href="approve-lembur.php">
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
					<?php if ($_SESSION['level'] == 'pembeli') : ?>
						<li>
						<a href="table-transaksi-pb.php">
						<i class="entypo-window"></i>
							<span>Tabel Transaksi Anda</span>
						</a>
					</li>
					<?php endif ?>
					
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

<hr />
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password telah berhasil di ganti </div>";
	}
}
?>
<?php 	
$tgl = date('l,d-m-Y');
$tgl2 = date('Y-m-d');
 ?>
 <?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Registrasi Gagal ! ID ini telah melakukan registrasi sebelumnya <a href='registrasi-form.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="gagal2"){
		echo "<div class='alert alert-danger'>Updtae Gagal ! Jumlah melebihi stok<a href='table-transaksi-pb.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="gagal3"){
		echo "<div class='alert alert-danger'>Registrasi Gagal ! Username telah digunakan !! silahkan gunakan Username lain <a href='registrasi-form.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="hapus"){
		echo "<div class='alert alert-danger'>Data Transaksi anda terhapus ! <a href='table-transaksi-pb.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}else if($pesan=="sukses"){
		echo "<div class='alert alert-success'>Pembayaran telah berhasil ! Setelah HP dibayar tidak ada pengembalian HP ! <a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}else if($pesan=="sukses2"){
		echo "<div class='alert alert-success'>Data transaksi anda telah diubah ! <a href='table-transaksi-pb.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
}
?>
			<ol class="breadcrumb bc-3">
						<li>
				<a href="index.php"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							Entry
					</li>
				<li class="active">
			
							<a href="pengajuan-absensi.php"><strong>Transaksi</strong></a>
					</li>
					</ol>
			
<h2>Tabel Transaksi Anda</h2>
<div class="row">
			<div class="panel-body">
				
				<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th>Tanggal</th>
			<th>Nama Handphone</th>
			<th data-hide="phone,tablet">Nama Pembeli</th>
			<th data-hide="phone,tablet">Jumlah</th>
			<th>Status</th>
			<TH>Action</TH>
			<!-- <th>Action</th> -->
		</tr>
	</thead>
	<tbody>
	<?php
		$hasil = $db->QUERY("SELECT a.id as idtransaksi,b.id as idhandphone,c.id as idpembeli, a.tanggal,b.merk_hp,b.tipe_hp,c.nama,a.jumlah,a.status FROM tabel_transaksi a,tabel_handphone b,tabel_pembeli c where a.id_hp = b.id and c.id = a.id_pembeli and a.id_pembeli = '".$_SESSION['id_pegatpem']."'");
		$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
		$no =1;
		foreach ($rows as $row):
						?>
		<tr class="odd gradeX">
		<td><?php echo $no++ ?></td>
		<td><?php echo $row['tanggal']; ?></td>
		<td><?php echo $row['merk_hp']; ?> <?php echo $row['tipe_hp']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo $row['jumlah']; ?></td>
		<td>
			<?php if ($row['status']=='sudahdibayar'): ?>
				<div class="label label-success">Telah Di bayar</div>
			<?php endif ?>
			<?php if ($row['status']=='belumdibayar'): ?>
				<div class="label label-danger">Belum Di bayar</div>
			<?php endif ?>
		</td>
		<td>
			<?php if ($row['status']=='sudahdibayar'): ?>
				<?php echo "<a href='#myModal12' class='btn btn-warning btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['idtransaksi']."><i class='entypo-reply'></i>Detail</a>"; ?>
			<?php endif ?>
			<?php if ($row['status']=='belumdibayar'): ?>
				<?php echo "<a href='#myModal12' class='btn btn-warning		 btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['idtransaksi']."><i class='entypo-reply'></i>Detail</a>"; ?>
			<?php endif ?>
			<?php if ($row['status']=='belumdibayar'): ?>
				<?php echo "<a href='#myModal41' class='btn btn-info btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['idtransaksi']."><i class='entypo-reply'></i>Edit</a>"; ?>
			<?php endif ?>
		</td>
		<!-- <td><!--<a href="edit_absensi.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm btn-icon icon-left">
					<i class="entypo-doc-text-inv"></i>
					Edit
				</a>-->
				<!-- <a href="hapus-handphone.php?id=<?php echo $row['id'];?>" class="btn btn-danger	 btn-sm btn-icon icon-left" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">
					<i class="entypo-trash"></i>
					Hapus
				</a>
				<?php echo "<a href='#myModal3' class='btn btn-info btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['id']."><i class='entypo-reply'></i>Edit</a>"; ?> -->
		<!-- </td> -->							
		</tr>
		<?php
		endforeach;
		?>
	</tbody>
	<tfoot>
		<tr>
			<th data-hide="phone">No</th>
			<th>Tanggal</th>
			<th>Nama Handphone</th>
			<th data-hide="phone,tablet">Nama Supplier</th>
			<th data-hide="phone,tablet">Jumlah</th>
			<th>Status</th>
			<th>Action</th>
			<!-- <th>Action</th> -->
		</tr>
	</tfoot>
</table>
				
			</div>
		
		</div>
	
	</div>
	
</div>


<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
<?php include 'footerentry.php'; ?>