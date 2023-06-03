<!DOCTYPE html>
<html>
<head>
<title>Latihan 2</title>
</head>
<body>
<?php
//require_once hanya mengambil 1 jika ada yang sama akan dibuang
require_once 'koneksitoko.php';//menyertakan database barang 1ke dalam perintah ini
$koneksi = koneksiToko();//memanggil koneksi
if(!$koneksi){
 die ("Gagal Koneksi");
}
//menciptakan tabel barang
$sql="create table if not exists barang1 (
 id int auto_increment not null primary key,
 kode int not null default 0,
 nama varchar (40) not null,
 harga int not null default 0,
 stok int not null default 0)";
//menjalankan mysqli_query
if(mysqli_query($koneksi, $sql)){
 echo "Sukses menciptakan tabel barang1";
} else{
 echo "ERROR: Tidak dapat mengeksekusi $sql. " . 
mysqli_error($koneksi);
}
// Close connection
mysqli_close($koneksi);
?>
</body>
</html>
