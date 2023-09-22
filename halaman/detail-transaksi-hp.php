<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "handphone";
session_start();
    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    if($_POST['rowid12']) {
        $id = $_POST['rowid12'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT a.id as idtransaksi,b.id as idhandphone,c.id as idpembeli, a.tanggal,b.merk_hp,b.tipe_hp,b.harga,c.nama,a.jumlah,a.status,b.gambar FROM tabel_transaksi a,tabel_handphone b,tabel_pembeli c where a.id_hp = b.id and c.id = a.id_pembeli and a.id=$id;";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>

        <div>
            <img src="images/<?php echo $baris['gambar']; ?>" style="width:290px ;float:left;" >
           <form action="bayar-transaksi.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['idtransaksi']; ?>"><br><br> 
            <input type="hidden" name="hp" value="<?php echo $baris['idhandphone']; ?>"><br><br> 
            <input type="hidden" name="jumlah" value="<?php echo $baris['jumlah']; ?>"><br><br>  
            <div style="padding-left: 400px">
                <div class="form-group">
                <label>Nama Handphone</label><br>
                <div class="label label-primary" style=""><?php echo $baris['merk_hp']; ?> <?php echo $baris['tipe_hp']; ?></div>
            </div>
            <div class="form-group">
                <label>Nama Pembeli</label><br>
                <div class="label label-primary" style=""><?php echo $baris['nama']; ?></div>
            </div>
            <div class="form-group">
                <label>Harga</label><br>
                <div class="label label-primary" style=""><?php echo $baris['harga']; ?></div>
            </div>
             <div class="form-group">
                <label>Jumlah Beli</label><br>
                <div class="label label-primary" style=""><?php echo $baris['jumlah']; ?></div>
            </div>
            <?php 
            $jumlah = $baris['jumlah'];
            $harga = $baris['harga'];
            $totalbayar = $jumlah * $harga;
             ?>
            <div class="form-group">
                <label>Total Bayar</label><br>
                <div class="label label-primary" style=""><?php echo $totalbayar ?></div>
            </div><br><br>
            <div align="center">
                <?php if ($baris['status'] == 'belumdibayar'): ?>
                    <?php if ($_SESSION['level'] == 'kasir' | $_SESSION['level'] == 'admin'): ?>
                        <button class="btn btn-success"  type="submit" >Bayar</button>
                    <?php endif ?>
                     <?php if ($_SESSION['level'] == 'pembeli'): ?>
                         <a href="hapus-transaksi-pb.php?id=<?php echo $baris['idtransaksi']; ?>" class="btn btn-danger">Hapus</a>
                     <?php endif ?>
                     <?php if ($_SESSION['level'] == 'kasir' | $_SESSION['level'] == 'admin'): ?>
                         <a href="hapus-transaksi.php?id=<?php echo $baris['idtransaksi']; ?>" class="btn btn-danger">Hapus</a>
                     <?php endif ?>
                     
                <?php endif ?>
                
            </div>

            </div>
              <BR><BR><BR><br><br> <br> 
        </form> 

        </div>
        
        
        <?php } }
    $koneksi->close();
?>