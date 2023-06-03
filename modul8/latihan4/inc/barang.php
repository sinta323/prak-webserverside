<?php 
require_once __DIR__ . '/koneksitoko.php';
 
function tambahBarang($nama,$harga,$stok,$kode){
 $koneksi = koneksiToko();
 $sql="insert into barang1(nama,harga,stok,kode) values('$nama',$harga,$stok,$kode)";
 $hasil=mysqli_query($koneksi, $sql);
 if($hasil){
 return true; 
 }else{
 return false;;
 }
}
