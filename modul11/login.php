<?php
session_start();
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// proses Login
if ($request_method === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $username = trim($username);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = trim($password);
 
    require_once 'user.php';
    if(otentik($username, $password)){
        // Set variabel sesi
        $_SESSION['username'] = $username;
        $dataUser = array(); // deklarasi var array
        // mencari user (nama)
        $dataUser = cariUserDariUserName($username);
        $_SESSION['namauser'] = $dataUser['nama']; 
        header("Location: sukses.php");
    }else{
        header("Location: {$_SERVER['PHP_SELF']}?error");
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initialscale=1">
<style>
.content {
    max-width: 300px;
    margin: auto;
    background: #eeeeee;
    padding: 10px;
}
</style>
</head>
<body>
<div class="content">
<h1>Login</h1>
<?php
if(array_key_exists('error', $_GET)){
    echo "<p style='color: red'>Salah username atau password</p>";
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) 
?>" method="post" >
<label>
    Username:<br><input type="text" name="username" size="30" >
</label>
<br>
<label>
    Password:<br><input type="password" name="password" size="30">
</label>
<br><br>
<input type="submit" value="Login">
</form>
</div>
</body>
</html>