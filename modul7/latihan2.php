<!DOCTYPE html>
<html>
<head>
 <title>Form Login</title>
</head>
<body>
<?php
//if (isset($_POST['username']))
if (array_key_exists('username', $_POST)) {
    $username = htmlspecialchars($_POST['username']);
    if(empty($username)){//apakah username ksong
    //jika kosong akan muncul tulisan username belum diisi
    echo "<span style='color:red'>Username belum diisi</span><br>";
 }
}

if (array_key_exists('password', $_POST)) {
     $password = htmlspecialchars($_POST['password']);
    if(empty($password)){
    echo "<span style='color:red'>Password belum diisi</span><br>";
    }
   }
   
   if($username=="siti" && $password=="siti123")
   header("Location: pesan.php?username=$username");

?>

<p>Form Login</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>
    <td>User name:</td><td><input type="text" name="username"size="30"></td>
</tr>
<tr>
     <td>Password</td><td><input type="password" name="password" size="30"/></td>
</tr>
<tr><td>&nbsp;</td><td><input type="submit" value="—OK --"></td></tr>
</table>
</form>
</body>
</html>