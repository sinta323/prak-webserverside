<!DOCTYPE html>
<html>
<body>
<?php
    //fungsi mempunyai nilai balik / nilai hasil
    function jumlah($bil1, $bil2) {
        $jumlah = $bil1 + $bil2;
        return $jumlah;
    }
    //hasil fungsi diberikan ke $hasil
    $hasil = jumlah(10, 20);
    //tidak pernah ada jika tidak ada return
    //menghasilkan nilai hasil jumlah dari $hasil
    echo "Hasil jumlah : $hasil<br>";

    //hasil fungsi langsung ditampilkan
    echo "Hasil jumlah : ".jumlah(30, 40);
?>
</body>
</html>