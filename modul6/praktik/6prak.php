<!DOCTYPE html>
<html>
<body>
     <?php
     
     $waktustart=date("2022-10-31 13:00:00");
     $waktuend=date("Y-m-d h:i:sa");
     //menghitung waktu awal
     $datetime1 = new DateTime($waktustart);//waktu awal 
     $datetime2 = new DateTime($waktuend);//waktu akhir
     $durasi = $datetime1->diff($datetime2);

    //menghitung menit
    $hari = $durasi->format('%d') * 24;
    $jam = $hari + $durasi->format('%H');
    $menit = $jam * 60 + $durasi->format('%i');
    echo number_format($menit);//memanggil $menit
?>
</body>
</html>