<?php include 'headertable.php'; ?>
<?php 
// if(isset($_GET['pesan'])){
// 	$pesan=mysql_real_escape_string($_GET['pesan']);
// 	if($pesan=="enol"){
// 		echo "<div class='alert alert-danger'>Edit gagal!! Anda tidak bisa menambah jumlah hari cuti anda karena Saldo Cuti anda sudah habis!!</div>";
// 	}else if($pesan=="lebih"){
// 		echo "<div class='alert alert-warning'>Edit gagal !! Anda tidak bisa menambah jumlah hari cuti anda karena melebihi Saldo Cuti !! </div>";
// 	}else if($pesan=="oke"){
// 		echo "<div class='alert alert-success'>Password telah berhasil di ganti </div>";
// 	}
// }
?>
			<ol class="breadcrumb bc-3">
						<li>
				<a href="index.php"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							Data Tabel
					</li>
				<li class="active">
			
							<a href="table-handphone.php"><strong>Data User Login</strong></a>
					</li>
					</ol>
<legend>
<h2>Data User Login</h2>
</legend>
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th data-hide="phone">No</th>
			<th>Username</th>
			<th>Password</th>
			<th data-hide="phone,tablet">Level</th>
			<th data-hide="phone,tablet">Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$hasil = $db->QUERY("SELECT * FROM tabel_login");
		$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
		$no =1;
		foreach ($rows as $row):
						?>
		<tr class="odd gradeX">
		<td><?php echo $no; ?></td>
		<td><?php echo $row['uname']; ?></td>
		<td><?php echo $row['pass']; ?></td>
		<td><?php echo $row['level']; ?></td>
		<td>
			<?php if ($row['status'] == 'aktif'): ?>
				<div class="label label-success">Aktif</div>
			<?php endif ?>
			<?php if ($row['status'] == 'nonaktif'): ?>
				<div class="label label-secondary">Non-Aktif</div>
			<?php endif ?>
		</td>
		<td><!--<a href="edit_absensi.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm btn-icon icon-left">
					<i class="entypo-doc-text-inv"></i>
					Edit
					<?php echo $row['gambar']; ?>
				</a>-->
				<a href="hapus-login.php?id=<?php echo $row['id'];?>" class="btn btn-danger	 btn-sm btn-icon icon-left" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">
					<i class="entypo-trash"></i>
					Hapus
				</a>
				<?php echo "<a href='#myModal33' class='btn btn-info btn-sm btn-icon icon-left' id='custId' data-toggle='modal' data-id=".$row['id']."><i class='entypo-reply'></i>Edit</a>"; ?>
				<?php if ($row['status'] == 'aktif'): ?>
					<a href="nonaktifkan.php?id=<?php echo $row['id'];?>" class="btn btn-danger	 btn-sm btn-icon icon-left">
					<i class="entypo-trash"></i>
					Nonaktifkan
					</a>
				<?php endif ?>
				<?php if ($row['status'] == 'nonaktif'): ?>
					<a href="aktifkan.php?id=<?php echo $row['id'];?>" class="btn btn-success	 btn-sm btn-icon icon-left">
					<i class="entypo-trash"></i>
					Aktifkan
					</a>
				<?php endif ?>
				
		</td>								
		</tr>
		<?php
		$no++;
		endforeach;
		?>
	</tbody>
	<tfoot>
		<tr>
			<th data-hide="phone">No</th>
			<th>Merk Handphone</th>
			<th>Tipe Handphone</th>
			<th data-hide="phone,tablet">Harga</th>
			<th data-hide="phone,tablet">Stok</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>

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
<?php include 'footertable.php'; ?>