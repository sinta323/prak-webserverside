<!DOCTYPE html>
<html>
<body>
<?php
    //fungsi untuk membuat judul
    function judul() {
        echo "<h2>Praktikum Pemrograman Web Server Side</h2>";
    }
    //fungsi untuk membuat garis
    function garis() {
        echo "<hr style='width:450px;margin-left:0'>";
    }
    //fungsi untuk membuat mhs menampilkan identitas mahasiswa
    function mhs($nim, $nama, $semester){
        echo "NIM : $nim <br>";
        echo "Nama : $nama <br>";
        echo "Semester : $semester <br>";
    }
    judul();//memanggil fungsi judul
    garis();//memanggil fungsi garis
    //memanggil dungsi mhs yang menampilkan nim, nama, dan semester
    mhs("203110123", "Susi Susanti", 3);
    garis();//memanggil fungsi garis
?>
</body>
</html>
