<!DOCTYPE html>
<html>
<head>
<title>Regitrasi Peserta</title>
</head>
<body>
<?php

$namaOk = false;//u validasi nama
$emailOk = false;//u validasi email
//if (isset($_POST['nama']))
if (array_key_exists('nama', $_POST)) {
 $nama = htmlspecialchars($_POST['nama']);
 if(empty($nama)){//apakah username ksong
    //jika kosong akan muncul tulisan username belum diisi
 echo "<span style='color:red'>Nama belum diisi</span><br>";
 }else {
    $namaOk = true;
 }
}

//if (isset($_POST['email']))
if (array_key_exists('email', $_POST)) {
    $email = htmlspecialchars($_POST['email']);
    if(empty($email)){//apakah username ksong
       //jika kosong akan muncul tulisan username belum diisi
    echo "<span style='color:red'>Email belum diisi</span><br>";
    }else{
        $emailOk = true;
    }
   }

   //memvalidasi kursus
   if (!array_key_exists('kursus', $_POST) && $_SERVER['REQUEST_METHOD']===('POST')){
        //$kursus = $_POST['kursus'];
        //print_r($kursus); 
   //}elseif (array_key_exists('kursus', $_POST)){
    echo "<span style='color:red'>Kursus belum diisi</span><br>";
   }else{
    $kursusOK = true;
   }

   if($namaOk && $emailOk){
    $kursus = $_POST['kursus']; 
        $jumlah = count($kursus);
        echo "Terimakasih data anda telah diterima.<br>
               Kursus yang anda pilih sebanyak $jumlah buah yaitu: ";
        echo "<ul>";
        foreach($kursus as $krs){
            echo "<li> $krs</li>";
        }   
        echo "</ul>" ;
        echo "Biaya kursus sebesar Rp. ";
        $biaya = count($kursus) * 1000000;
        echo number_format($biaya,0 ,",",".").",-";
   }
 
?>

<?php 
    if($_SERVER['REQUEST_METHOD']===('GET')): ?>
<h2>Registrasi Peserta Kursus</h2>
<table>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <tr>
        <td>Nama:</td><td><input type="text" name="nama" size="30"></td>
    </tr>
    <tr>
        <td>E-mail</td><td><input type="text" name="email" size="30"></td>
    </tr>
    <tr>
        <td>Nama Kursus</td>
    <td>
        <input type="checkbox" name="kursus[]" value="PHP">PHP<br>
        <input type="checkbox" name="kursus[]" value="JavaScript">JavaScript<br>
        <input type="checkbox" name="kursus[]" value="Python">Python<br>
        <input type="checkbox" name="kursus[]" value="Java">Java<br>
    </td>
    </tr>
    <tr><td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Simpan"></td>
    </tr>
</form>
</table>
<?php endif ?>
</body>
</html>