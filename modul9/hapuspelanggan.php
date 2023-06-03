<!DOCTYPE html>
<html>
<head>
 <title>Hapus Pelanggan</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    require_once 'pelanggan.php';
    $sql = "select * from pelanggan where id = $id";
    $hasil = bacaPelanggan($sql);
    if(!isset($_GET['hapus'])){
        if(count($hasil)>0){
            echo "Nama pelanggan: {$hasil[0]['nama']}<br>";
            echo "Alamat pelanggan: {$hasil[0]['alamat']}<br>";
            echo "NomorHP pelanggan: {$hasil[0]['nomorHP']}<br>";
            //echo "Foto barang: <img src='gambar/{$hasil[0]['foto']}'><br>";
            echo "<h3>Apakah data ini akan dihapus?</h3>";
            echo "<a href='hapuspelanggan.php?id=$id&hapus=1'>YA</a>";
            echo "&nbsp; &nbsp;";
            echo "<a href='tugas3.php'>TIDAK</a><br>";
        }
    }else{
        $hps = hapuspelanggan($id);
        if($hps){ // hapus file gambar
            $nma = "nama/{$hasil[0]['nama']}";
            if(file_exists($nma)) unlink($nma);//untuk menghapus barang
            header("location: tugas3.php");
        }else{
            echo "Gagal menghapus data<br>";
            echo "<a href='tugas3.php'>Kembali</a><br>";
        }
    }
?>
</body>
</html>
