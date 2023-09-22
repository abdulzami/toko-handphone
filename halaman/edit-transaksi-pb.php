<?php
    include 'koneksitable.php';
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

    if($_POST['rowid41']) {
        $id = $_POST['rowid41'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_transaksi WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>

<?php   } } ?>
        <form action="update-transaksi-pb.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <input type="hidden" name="idhp" value="<?php echo $baris['id_hp']; ?>">
            <div class="form-group">
                <label>Nama Pembeli</label>
                <select class="form-control" name="pembeli">
                                
                                <option value="0">id - nama</option>
                                <?php
        $hasil = $db->QUERY("SELECT * FROM tabel_pembeli");
        $rows = $hasil-> fetch_All(MYSQLI_ASSOC);
        $no =1;
        foreach ($rows as $row):
                        ?>
                                <option value="<?php echo $row['id'] ?>"
                                        <?php if ($baris['id_pembeli'] == $row['id']) {
                                        echo "selected";
                                    } ?>
                                    ><?php echo $row['id'] ?> - <?php echo $row['nama'] ?></option>
                                <?php
        $no++;
        endforeach;
        ?>
                            </select>
            </div>
            <div class="form-group">
                <label>Nama Handphone</label>
                <select class="form-control" name="hp">
                                
                                <option>id - merk hp - tipe hp</option>
                                <?php
        $hasil = $db->QUERY("SELECT * FROM tabel_handphone");
        $rows = $hasil-> fetch_All(MYSQLI_ASSOC);
        $no =1;
        foreach ($rows as $row):
                        ?>
                                <option value="<?php echo $row['id'] ?>"
                                    <?php if ($baris['id_hp'] == $row['id']) {
                                        echo "selected";
                                    } ?>
                                    ><?php echo $row['id'] ?> - <?php echo $row['merk_hp'] ?> - <?php echo $row['tipe_hp'] ?></option>
                                <?php
        $no++;
        endforeach;
        ?>
                            </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" value="<?php echo $baris['jumlah']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        
        <?php 
    $koneksi->close();
?>