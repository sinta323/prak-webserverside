<DOCTYPE html>
<html>
<body>

<?php

$str = "Halo apa kabar";
$huruf = "a";//menampilkan huruf kecil saja

function cacahHuruf($str, $huruf){
    $str = strtolower($str);//konversi ke huruf kecil semua
    $huruf = strtolower($huruf);//konversi ke huruf kecil semua
    $panjang = strlen($str);
    $cacah = 0;
    for($i=0; $i<$panjang; $i++){
        if($str[$i] == $huruf){
            $cacah++;
        }
    }
    return $cacah;
}
echo cacahHuruf($str, $huruf);
?>
</body>
</html>