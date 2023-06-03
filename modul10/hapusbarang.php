<!DOCTYPE html>
<html>
<head>
 <title>Hapus Barang</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    require_once 'barang.php';
    $sql = "select * from barang where id = $id";
    $hasil = bacaBarang($sql);
    if(!isset($_GET['hapus'])){
        if(count($hasil)>0){
            echo "Nama barang: {$hasil[0]['nama']}<br>";
            echo "Harga barang: {$hasil[0]['harga']}<br>";
            echo "Stok barang: {$hasil[0]['stok']}<br>";
            echo "Foto barang: <img src='gambar/{$hasil[0]['foto']}'><br>";
            echo "<h3>Apakah data ini akan dihapus?</h3>";
            echo "<a href='hapusbarang.php?id=$id&hapus=1'>YA</a>";
            echo "&nbsp; &nbsp;";
            echo "<a href='latihan1.php'>TIDAK</a><br>";
        }
    }else{
        $hps = hapusbarang($id);
        if($hps){ // hapus file gambar
            $gbr = "gambar/{$hasil[0]['foto']}";
            if(file_exists($gbr)) unlink($gbr);//untuk menghapus barang
            header("location: latihan1.php");
        }else{
            echo "Gagal menghapus data<br>";
            echo "<a href='latihan1.php'>Kembali</a><br>";
        }
    }
?>
</body>
</html>
