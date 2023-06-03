<!DOCTYPE html>
<html>
<body>
<?php
    //fungsi untuk membuat judul
    function judul() {
        echo "<h2>Praktikum Pemrograman Web Server Side</h2>\n";
        // \n untuk ganti baris pada view page source
    }
    //ngsi untuk membuat garis
    function garis() {
        echo "<hr style='width:450px;margin-left:0'>";
    }
    garis();//memanggil fungsi garis
    judul();//memanggil fungsi judul
    garis();//memanggil fungsi garis
?>
</body>
</html>
