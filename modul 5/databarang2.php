<?php
echo "<h2>Data Barang</h2>";
$seri= $_POST["nomorSeri"];
$barang= $_POST ["namaBrg"];
$merk= $_POST["merk"];
$negara= $_POST ["negara"];
$tgl= $_POST ["angkaHari"];
$bln= $_POST["bulan"];
$thn= $_POST["tahun"];
$harga= $_POST["harga"];
$stok= $_POST ["stok"];

$kodel= substr($barang,0,3);
$kode2= substr($merk,0,3);
$kode3= substr($negara,0,3);

$tgl= mktime(0,0,0,$bln,$tgl,$thn);
$tanggal= date("l, j F Y", $tgl);

$nominal= isset($_POST['harga']) ? $_POST['harga']: 0;
$format= number_format ($nominal,2,",",".");

$total= $harga * $stok; 
$format1= number_format ($total,2,",",".");
echo "<pre>"; 
echo "Kode : $barang/$seri/$kode2/$kode3 <br/>"; 
echo "Nama Barang : $barang <br/>"; 
echo "Nomor Seri : $seri <br/>";
echo "Merk : $merk <br/>";
echo "Buatan dari : $negara <br/>";
echo "Tanggal Buat : $tanggal <br/>";
echo "Harga : $format <br/>";
echo "Jumlah Stok : $stok <br/>";
echo "Total Harga : $format1 <br/>";
echo "</pre>";
?>