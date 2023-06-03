<?php
echo "<h2>Data Barang</h2>";
$nomorSeri= $_POST["Nomor Seri"];
$barang= $_POST ["Nama Barang"];
$merk= $_POST["Nerk"];
$negaraPembuat= $_POST ["Negara Pembuat"];
$tanggal= $_POST ["angkaHari"];
$bulan= $_POST["bulan"];
$tahun= $_POST["tahun"];
$harga= $_POST["harga"];
$stok= $_POST ["stok"];

$kodeBarang1= substr($barang,0,3);
$kodeBarang2= substr($merk,0,3);
$kodeBarang3= substr($negara,0,3);

$tgl= mktime(0,0,0,$bulan,$tanggal,$tahun);
$tanggal= date("l, j F Y", $tgl);

$nominal= isset($_POST['harga']) ? $_POST['harga']: 0;
$formatNumber= number_format ($nominal,2,",",".");

$totalBayar= $harga * $stok; 
$format= number_format ($total,2,",",".");
echo "<pre>"; 
echo "Kode : $barang/$Seri/$kodeBarang2/$kodeBarang3 <br/>"; 
echo "Nama Barang : $barang <br/>"; 
echo "Nomor Seri : $nomorseri <br/>";
echo "Merk : $merk <br/>";
echo "Buatan dari : $negaraPembuat <br/>";
echo "Tanggal Buat : $tanggal <br/>";
echo "Harga : $formatNumber <br/>";
echo "Jumlah Stok : $stok <br/>";
echo "Total Harga : $format <br/>";
echo "</pre>";
?>