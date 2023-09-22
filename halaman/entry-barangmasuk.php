<?php 	include 'headerentry.php'; ?>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Handphone gagal di supplai</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Handphone telah berhasil di supplai </div>";
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
			
							<a href="pengajuan-absensi.php"><strong>Barang Masuk</strong></a>
					</li>
					</ol>
			
<h2>Entry Barang Masuk</h2>
<br />




<div class="row">
	<div class="col-md-6">
		
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
			
			<div class="panel-body">
				
				<form role="form" method="POST" class="form-horizontal form-groups-bordered" action="tambah-barang-masuk.php">
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Nama Supplier</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="supplier">
								
								<option value="0">id - nama</option>
								<?php
		$hasil = $db->QUERY("SELECT * FROM tabel_supplier");
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

	<div class="col-md-6">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
				Data Tabel Barang Masuk
				</div>
				
				<div class="panel-options">
					
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th>Tanggal</th>
			<th>Nama Handphone</th>
			<th data-hide="phone,tablet">Nama Supplier</th>
			<th data-hide="phone,tablet">Jumlah</th>
			<!-- <th>Action</th> -->
		</tr>
	</thead>
	<tbody>
	<?php
		$hasil = $db->QUERY("SELECT * FROM tabel_barangmasuk a,tabel_handphone b,tabel_supplier c where a.id_hp = b.id and c.id = a.id_supplier");
		$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
		$no =1;
		foreach ($rows as $row):
						?>
		<tr class="odd gradeX">
		<td><?php echo $no; ?></td>
		<td><?php echo $row['tanggal']; ?></td>
		<td><?php echo $row['merk_hp']; ?> <?php echo $row['tipe_hp']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo $row['jumlah']; ?></td>
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
		$no++;
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