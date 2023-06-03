<!DOCTYPE html>
<html>
<body>
<?php
    //fungsi membuat jumlah
    function jumlah($bil1, $bil2) {
        $jumlah = $bil1 + $bil2;
        return $jumlah;
    }
    //fungsi membuat kurang
    function kurang($bil1, $bil2) {
        $kurang = $bil1 - $bil2;
        return $kurang;
    }
    function kurang($bil1, $bil2) {
        $kurang = $bil1 * $bil2;
        return $kurang;
    }
    //jika sama dengan jumlah maka kode baris 15 dan 16 akan dijalankan 
    if($_POST["hitung"] == "JUMLAH"){
        //memanggil fungsi jumlah
        $hasil = jumlah($_POST["bil1"], $_POST["bil2"]);
        echo "Hasil jumlah : $hasil";//menampilkan hasil dari $hasil
    }
    if($_POST["hitung"] == "KURANG"){
        //perintah tidak dikerjakan karena sudah klik jumlah begitupun sebbaliknya
        $hasil = kurang($_POST["bil1"], $_POST["bil2"]);
        echo "Hasil kurang : $hasil";
    }
    if($_POST["hitung"] == "KALI"){
        //memanggil fungsi jumlah
        $hasil = kali($_POST["bil1"], $_POST["bil2"]);
        echo "Hasil kali : $hasil";//menampilkan hasil dari $hasil
    }
?>
</body>
</html>