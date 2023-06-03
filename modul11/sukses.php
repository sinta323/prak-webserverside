<?php
session_start();

?>
<!DOCTYPE html>
<html>
<body>
    <?php
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    echo 'user: '.$_SESSION['namauser'];
    ?>
<h1>Selamat Datang</h1>
<br><br>
<a href="logout.php">Logout</a>
</body>
</html>
