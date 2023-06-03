<!DOCTYPE html>
<html>
<body>
<?php
    //melewatkan argumen secara nilai
    //fungsi untuk membuat nilai pertama
    function nilai_pertama($x) {
        $x += 200;//menambah 200 untuk nilai x awal
    }

    //& (ampersan) untuk melewatkan argumen secara referensi(mengubah nilai)
    //untuk membuat nilai kedua
    function nilai_kedua($x) {//input dan output
        $x += 200;//menambah 200 dari nilai x awal
    }
    $nilai_awal = 100;//nilai awal 100
    nilai_pertama($nilai_awal);
    //memanggil fungsi pertama dengan nilai awal
    echo "Nilai akhir fungsi pertama : $nilai_awal<br>";

   
    nilai_kedua($nilai_awal);
    //memanggil fungsi nilai kedua dengan menampilkan nilai awal
    echo "Nilai akhir fungsi kedua : $nilai_awal<br>";
?>
</body>
</html>