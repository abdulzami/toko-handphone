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

    if($_POST['rowid3']) {
        $id = $_POST['rowid3'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_handphone WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>


        <form action="update-handphone.php?" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Merk Handphone</label>
            <input type="text" class="form-control" value="<?php echo $baris["merk_hp"] ?>" id="recipient-name" name="merk" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Tipe Handphone</label>
            <input type="text" class="form-control" value="<?php echo $baris["tipe_hp"] ?>" id="recipient-name" name="tipe" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Harga</label>
            <input class="form-control" id="recipient-name" value="<?php echo $baris["harga"] ?>" name="harga" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Harga</label>
            <input class="form-control" id="recipient-name" value="<?php echo $baris["stok"] ?>" name="stok" required>
          </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        
        <?php } }
    $koneksi->close();




?>
