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

    if($_POST['rowid2']) {
        $id = $_POST['rowid2'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_pembeli WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>


        <form action="update-pembeli.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $baris['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" class="form-control" name="jeniskelamin" value="<?php echo $baris['jenis_kelamin']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $baris['alamat']; ?>">
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" name="notelepon" value="<?php echo $baris['no_telepon']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        
        <?php } }
    $koneksi->close();
?>