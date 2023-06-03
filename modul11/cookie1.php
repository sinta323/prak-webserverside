<?php
$cookie_name = "namauser";//nama cookie
$cookie_value = "Kartika Fatmawati";//mengatur nilai cookie
//untuk mengatur cookie di php
//nama cookie, nilai cookie, dan mengatur kadaluarsa cookie
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 hari
?>
<!DOCTYPE html>
<html>
<body>
<?php
//mengecek apakah nama cookie ada
if(!isset($_COOKIE[$cookie_name])) {
    echo "Nama Cookie '" . $cookie_name . "' tidak ada!";
   } else {
    echo "Cookie '" . $cookie_name . "' sudah ada!<br>";
    echo "Nilanya adalah: " . $_COOKIE[$cookie_name];
   }
   ?>
   </body>
   </html>
