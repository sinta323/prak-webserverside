<?php
echo "<h2>Data Barang</h2>";
$NamaBarang= $_POST ["NamaBarang"];
$Jenis= $_POST["Jenis"];
$NomorSeri= $_POST["NomorSeri"];
$merk= $_POST["merk"];
$NegaraPembuat= $_POST ["NegaraPembuat"];
$tgl= $_POST ["angkaHari"];
$bln= $_POST["bulan"];
$thn= $_POST["tahun"];
$harga= $_POST["harga"];
$stok= $_POST ["stok"];

$kodel= substr($barang,0,3);
$kode2= substr($merk,0,3);
$kode3= substr($negara,0,3);

$tanggal= mktime(0,0,0,$bln,$tgl,$thn);
$waktu= date("l, j F Y", $tgl);

$nominal= isset($_POST['harga']) ? $_POST['harga']: 0;
$format= number_format ($nominal,2,",",".");

$total= $harga * $stok; 
$format1= number_format ($total,2,",",".");
echo "<pre>"; 
echo "Kode : $barang/$NomorSeri/$kode2/$kode3 <br/>"; 
echo "Nama Barang : $barang <br/>"; 
echo ""Jenis" : $Jenis <br/>"; 
echo "Nomor Seri : $NomorSeri <br/>";
echo "Merk : $merk <br/>";
echo "Buatan dari : $NegaraPembuat <br/>";
echo "Tanggal Buat : $tanggal <br/>";
echo "Harga : $format <br/>";
echo "Jumlah Stok : $stok <br/>";
echo "Total Harga : $format1 <br/>";
echo "</pre>";
?>