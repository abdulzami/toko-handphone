<?php
include 'koneksitable.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "handphone";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);
?>
<?php
 $hp = $_POST['hp'];
$hasil = $db->QUERY("SELECT * FROM tabel_handphone  WHERE  id ='$hp' ");
$rows = $hasil-> fetch_All(MYSQLI_ASSOC);
$no =1;
foreach ($rows as $row):
?>

<?php $stok =$row['stok'];?>
        <?php
        $no++;
        endforeach;
?>
<?php
    

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    //menangkap parameter yang dikirimkan dari detail.php
    $hp = $_POST["hp"];
    $id = $_POST['id'];
    $pembeli = $_POST['pembeli'];
    $hp = $_POST['hp'];
    $jumlah = $_POST['jumlah'];

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    if ($jumlah > $stok) {
       header("location: table-transaksi-pb.php?pesan=gagal2"); 
    }else{
        $sql = "UPDATE tabel_transaksi SET id_hp = '$hp', id_pembeli = '$pembeli', jumlah = '$jumlah' WHERE id=$id";

        if ($koneksi->query($sql) === TRUE) {
            header("location: table-transaksi-pb.php?pesan=sukses2"); 
        } else {
            // jika gagal tampil ini
            echo "Gagal Melakukan Perubahan: " . $koneksi->error;
        }
    }
    



    $koneksi->close();
?>
