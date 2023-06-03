<!DOCTYPE html>
<html>
<head>
 <title>Latihan 1</title>
 <style>
 table, td, th {
 border: 1px solid grey;
 }
 table {
 border-collapse: collapse;
 }
 </style>
</head>
<body>
<?php
require_once 'koneksitoko.php';//menampilkan atau menyertakan koneksi toko
$koneksi = koneksiToko();//mengecek koneksi toko
if(!$koneksi){
     die ("Gagal Koneksi");
}
$sql = "select * from barang";//menampilkan semua barang
$hasil = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($hasil) > 0){//jumlah baris yang diterima
    echo "<table>";//menampilkan baris menampilkan 1 per 1
    echo "<tr> 
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Foto</th>
    </tr>";
 
    while($row = mysqli_fetch_array($hasil)){
        echo "<tr>";
        echo "<td>{$row['nama']}</td>"; 
        echo "<td>{$row['harga']}</td>"; 
        echo "<td>{$row['stok']}</td>"; 
        echo "<td><img src='gambar/{$row['foto']}' width='100'></td>";
       // echo "<td>{$row['foto']}</td>"; 
        echo "</tr>\n";
    }
    echo "</table>";
}else
    echo "Tidak ada data";
    mysqli_close($koneksi);
?>
</body>
</html>
