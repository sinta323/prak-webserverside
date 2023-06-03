<?php
$cookie_name = "namauser";//nama cookie
$cookie_value = "Susi Susanti";//nilai cookie
//mengatur nama, nilai dan kaladaluarsa cookie
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html>
<body>
<?php
//mengecek apakah nama cookie ada atau tidak
if(!isset($_COOKIE[$cookie_name])) {
 echo "Nama Cookie '" . $cookie_name . "' tidak ada!";
} else {
 echo "Cookie '" . $cookie_name . "' sudah ada!<br>";
 //menampilkan nilai dari cookie_nama menggunakan $_COOKIE
 echo "Nilanya adalah: " . $_COOKIE[$cookie_name];
}
?>
</body>
</html>
