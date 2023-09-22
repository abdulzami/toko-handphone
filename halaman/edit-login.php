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

    if($_POST['rowid33']) {
        $id = $_POST['rowid33'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM tabel_login WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>


        <form action="update-login.php" method="post">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="user" value="<?php echo $baris['uname']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="pass" value="<?php echo $baris['pass']; ?>">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="<?php  echo $baris['level'] ?>" >
                        PILIH
                    </option>
                    <option value="admin" <?php if ($baris['level'] == 'admin') {
                       echo "selected";
                    } ?>>    
                            Admin
                    </option>
                    <option value="pembeli"  <?php if ($baris['level'] == 'pembeli') {
                       echo "selected";
                    } ?>>    
                            Pembeli
                    </option>
                    <option value="kasir"  <?php if ($baris['level'] == 'Kasir') {
                       echo "selected";
                    } ?>>    
                            Kasir
                    </option>
                </select>
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        
        <?php } }
    $koneksi->close();
?>