<?php
//$tanggal = 13;
//$bulan = 10;
//$tahun = 2022;

//fungsi untuk membuat nama hari dengan argumen tanggal bulan tahun
function namaHari($tanggal, $bulan, $tahun){
    $namaHari= mktime(0, 0, 0, $bulan, $tanggal, $tahun);
    return date('l', $namaHari);
}
echo namaHari(14,10,2022);//memanggil fungsi namahari

?>