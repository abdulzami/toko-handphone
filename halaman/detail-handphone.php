<?php
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

    if($_POST['rowid11']) {
        $id = $_POST['rowid11'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_handphone WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>

        <div>
            <img src="images/<?php echo $baris['gambar']; ?>" style="width:290px ;float:left;" >
           <form action="update-handphone.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>"><br><br>  
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
                <div class="label label-primary" style=""><?php echo $baris['stok']; ?></div>
            </div> 
            </div>
              <BR><BR><BR><br><br> <br> 
        </form> 

        </div>
        
        
        <?php } }
    $koneksi->close();
?>