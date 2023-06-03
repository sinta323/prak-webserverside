<?php
$jamMasuk = 10;
$jamKeluar = 14;
function biayaParkir($jamKeluar, $jamMasuk){
    $waktu = $jamKeluar - $jamMasuk;
    if($waktu <= 2){
        $biaya = 2000;
    }else{
        $biaya = ($waktu - 2) * 500 + 2000;
    }
    return $biaya;
}
$biaya = biayaParkir($jamKeluar, $jamMasuk);
echo $biaya.'<br>';
$biaya = biayaParkir(8, 14);
echo $biaya.'<br>';
?>