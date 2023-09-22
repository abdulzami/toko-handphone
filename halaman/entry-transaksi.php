<?php 	include 'headerentry.php'; ?>
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
			
<h2>Entry Transaksi</h2>
<br />




<div class="row">
	<div class="col-md-4">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
				Entry
				</div>
				
				<div class="panel-options">
					
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Registrasi Gagal ! ID ini telah melakukan registrasi sebelumnya <a href='registrasi-form.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="gagal21"){
		echo "<div class='alert alert-danger'>Transaksi Gagal ! Jumlah melebihi stok<a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="sukses21"){
		echo "<div class='alert alert-success'>Data transaksi telah berhasil ditambahkan ! <a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
}
?>
			<div class="panel-body">
				
				<form role="form" method="POST" class="form-horizontal form-groups-bordered" action="tambah-transaksi.php">
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Nama Pembeli</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="pembeli">
								
								<option value="0">id - nama</option>
								<?php
		$hasil = $db->QUERY("SELECT * FROM tabel_pembeli");
		$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
		$no =1;
		foreach ($rows as $row):
						?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?> - <?php echo $row['nama'] ?></option>
								<?php
		$no++;
		endforeach;
		?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Tanggal</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" value="<?php echo $tgl ?>"	readonly />
							<input type="hidden" name="tanggal" class="form-control" value="<?php echo $tgl2 ?>" >
						</div>
					</div>
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Nama Handphone</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="hp">
								
								<option>id - merk hp - tipe hp</option>
								<?php
		$hasil = $db->QUERY("SELECT * FROM tabel_handphone");
		$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
		$no =1;
		foreach ($rows as $row):
						?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?> - <?php echo $row['merk_hp'] ?> - <?php echo $row['tipe_hp'] ?></option>
								<?php
		$no++;
		endforeach;
		?>
							</select>
							

						</div>
					</div>
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Jumlah</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="jumlah"	required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-primary">Add</button>
							<button type="reset" class="btn btn-">Reset</button>
						</div>
					</div>
				</form>
				
			</div>
		
		</div>
	
	</div>

	<div class="col-md-8">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
				Data Tabel Transaksi
				</div>
				
				<div class="panel-options">
					
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Registrasi Gagal ! ID ini telah melakukan registrasi sebelumnya <a href='registrasi-form.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="gagal2"){
		echo "<div class='alert alert-danger'>Updtae Gagal ! Jumlah melebihi stok<a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="gagal3"){
		echo "<div class='alert alert-danger'>Registrasi Gagal ! Username telah digunakan !! silahkan gunakan Username lain <a href='registrasi-form.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
	else if($pesan=="hapus"){
		echo "<div class='alert alert-danger'>Transaksi terhapus ! <a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}else if($pesan=="sukses"){
		echo "<div class='alert alert-success'>Pembayaran telah berhasil ! Setelah HP dibayar tidak ada pengembalian HP ! <a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}else if($pesan=="sukses2"){
		echo "<div class='alert alert-success'>Data transaksi telah diubah ! <a href='entry-transaksi.php' data-rel='close'><i class='entypo-cancel'></i></a> </div>";
	}
}
?>
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
		$hasil = $db->QUERY("SELECT a.id as idtransaksi,b.id as idhandphone,c.id as idpembeli, a.tanggal,b.merk_hp,b.tipe_hp,c.nama,a.jumlah,a.status FROM tabel_transaksi a,tabel_handphone b,tabel_pembeli c where a.id_hp = b.id and c.id = a.id_pembeli");
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
				<?php echo "<a href='#myModal40' class='btn btn-info btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['idtransaksi']."><i class='entypo-reply'></i>Edit</a>"; ?>
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