<DOCTYPE html>
<html>
<body>
<?php
$n = 3;
function namaHari($n){
    $futureDate = mktime(0,0,0, date("m"), date("d")+$n, date("Y"));
    $hrInggris = date("D", $furureDate);

    switch($hrInggris){
        case 'Sun':
            $hari = "Minggu";
            break;
        case 'Mon':
            $hari = "Senin";
            break;
        case 'Tue':
            $hari = "Selasa";
            break;
        case 'Wed':
            $hari = "Rabu";
            break;
        case 'Thu':
            $hari = "Kamis";
            break;
        case 'Fri':
            $hari = "Jumat";
            break;
        case 'Sat':
            $hari = "Sabtu";
            break;
    }
    return $hari;
}
echo namaHari(4);
?>
</body>
</html>