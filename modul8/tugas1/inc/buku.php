<?php 
require_once __DIR__ . '/koneksibuku.php';
 
function tambahBarang($kode,$judul,$pengarang,$penerbit,$stok){
 $koneksi = koneksiToko();
 $sql="insert into buku(kode,judul,pengarang,penerbit,stok) values('$kode','$judul','$pengarang','$penerbit',$stok)";
 $hasil=mysqli_query($koneksi, $sql);
 if($hasil){
 return true; 
 }else{
 return false;;
 }
}
