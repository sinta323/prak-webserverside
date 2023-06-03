<DOCTYPE html>
<html>
<body>

<?php

$batas = 20;

function cacahKelipatan3($batas){
    $cacah = 0;
    for($i=1; $i<=$batas;$i++){
        if($i % 3 == 0){
            $cacah++;
        }
    }
    return $cacah;
}
function jumlahKelipatan3($batas){
    $jumlah = 0;
    for($i=1; $i<=$batas;$i++){
        if($i % 3 == 0){
            $jumlah += $i;
        }
    }
    return $jumlah;
}
echo jumlahKelipatan3(20).'<br>';

?>
</body>
</html>