<!DOCTYPE html>
<html>
<body>
    <?php
        $angkaAcak = rand(1,100); //untuk membangkitkan bilangan acak dari 1-100
        echo "Angka acak : $angkaAcak <br>";

        $akar = sqrt(100);//dengan fungsi sqrt mengakarkan
        echo "Akar 100 : $akar <br>";

        $desimal = 123.6783;//hasilnya sama
        echo "Nilai desimal : $desimal <br>";

        $pembulatan = floor($desimal);//pembulatan kebawahb
        echo "Pembulatan ke bawah : $pembulatan <br>";

        $pembulatanNaik = ceil($desimal);//membulatkan ke atas
        echo "Pembulatan ke atas : $pembulatanNaik <br>";

        $pendekatan = round($desimal, 2);//dengan argumen memberikan hasil 123.68 dengan pembulatan angka dibelakang koma keatas atau kebawah sesuai bilangan
        echo "Pendekatan nilai : $pendekatan <br>";
    ?>
</body>
</html>

