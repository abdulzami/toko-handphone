<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "handphone";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    if($_POST['rowid3']) {
        $id = $_POST['rowid3'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_handphone WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
<!-- 

        <form action="update-handphone.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <div class="form-group">
                <label>Merk Handphone</label><br>
                <div class="label label-primary" style=""><?php echo $baris['merk_hp']; ?></div>
            </div>
            <div class="form-group">
                <label>Tipe Handphone</label><br>
                <div class="label label-primary" style=""><?php echo $baris['tipe_hp']; ?></div>
            </div>
            <div class="form-group">
                <label>Harga</label><br>
                <div class="label label-primary" style=""><?php echo $baris['harga']; ?></div>
            </div>
            <div class="form-group">
                <label>Stok Tersedia</label><br>
                <div class="label label-primary" style=""><?php echo $baris['stok']; ?></div>
            </div>
             <div class="form-group">
                <label>Masukkan Jumlah Beli</label>
                <input type="text" class="form-control" required>
            </div><br>
            <div align="right">
                 <button class="btn btn-success"  type="submit">Beli</button>
            </div>
              -->
        </form>
        <?php 
        $tgl2 = date('Y-m-d');
         ?>
         <div>
            <img src="images/<?php echo $baris['gambar']; ?>" style="width:290px ;float:left;" >
           <form action="tambah-transaksi-pb.php" method="post">
            <input type="hidden" name="hp" value="<?php echo $baris['id']; ?>"><br><br>  
            <input type="hidden" name="tanggal" class="form-control" value="<?php echo $tgl2 ?>" >
            <input type="hidden" name="pembeli" value="<?php echo $_SESSION['id_pegatpem'] ?>">
            <div style="padding-left: 400px">
                <div class="form-group">
                <label>Merk Handphone</label><br>
                <div class="label label-primary" style=""><?php echo $baris['merk_hp']; ?></div>
            </div>
            <div class="form-group">
                <label>Tipe Handphone</label><br>
                <div class="label label-primary" style=""><?php echo $baris['tipe_hp']; ?></div>
            </div>
            <div class="form-group">
                <label>Harga</label><br>
                <div class="label label-primary" style=""><?php echo $baris['harga']; ?></div>
            </div>
            <div class="form-group">
                <label>Stok Tersedia</label><br>
                <div class="label label-primary" style=""><?php echo $baris['stok']; ?> </div> <?php
                    if ($baris['stok'] == 0) {
                        echo "<div class='label label-secondary'>Stok Kosong</div>";
                    }
                 ?>
            </div> 
             <div class="form-group">
                <label>Masukkan Jumlah Beli</label>
                <input type="text" name="jumlah" class="form-control"  <?php
                    if ($baris['stok'] == 0) {
                        echo "readonly";
                    }else {
                        echo "required";
                    }
                 ?>>
            </div>
            <div align="center">
                 <button class="btn btn-success"  type="<?php
                    if ($baris['stok'] == 0) {
                        echo "button";
                    }else {
                        echo "submit";
                    }
                 ?>" >Beli</button>
            </div>
            </div>
              <BR><BR><BR><br>
        </form> 

        </div>
        
        <?php } }
    $koneksi->close();
?>