<!DOCTYPE html>
<html>
<body>
<?php
require_once ('user.php');//mengambil data dari user.php
$username="susi";//usernam berisi susi
$password="susi";//password berisi susi
if(otentik($username, $password))//mengecek otentikasi
 echo "Berhasil";//jika berhasil
else
 echo "Gagal";//jika gagal
?>
</body>
</html>
