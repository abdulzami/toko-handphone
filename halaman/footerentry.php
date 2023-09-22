
</div>

<!--Tabel Handphone-->


 <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Transaksi Handphone</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal12" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Transaksi Handphone</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal40" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Transaksi Handphone</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="myModal41" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Transaksi Handphone Anda</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Handphone</h4>
      </div>
      <div class="modal-body">
        <form action="tambah-handphone.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Merk Handphone</label>
            <input type="text" class="form-control" id="recipient-name" name="merk" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Tipe Handphone</label>
            <input type="text" class="form-control" id="recipient-name" name="tipe" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Harga</label>
            <textarea class="form-control" id="recipient-name" name="harga" required></textarea>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Gambar</label>
            <input type="text" class="form-control" id="recipient-name" name="gambar" required>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>

        </form>
    </div>
  </div>
</div>


<!--End Tabel Handphone-->

  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal3').on('show.bs.modal', function (e) {
            var rowid3 = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'transaksi-form-pembeli.php',
                data :  'rowid3='+ rowid3,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal12').on('show.bs.modal', function (e) {
            var rowid12 = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail-transaksi-hp.php',
                data :  'rowid12='+ rowid12,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal40').on('show.bs.modal', function (e) {
            var rowid40 = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'edit-transaksi.php',
                data :  'rowid40='+ rowid40,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal41').on('show.bs.modal', function (e) {
            var rowid41 = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'edit-transaksi-pb.php',
                data :  'rowid41='+ rowid41,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>


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