<!DOCTYPE html>
<html>
<head>
<title>Regitrasi Peserta</title>
</head>
<body>
<?php

//$namaOk = false;//u validasi nama
//$emailOk = false;//u validasi email
if (isset($_POST['nama']))
if (array_key_exists('nama', $_POST)) {
 $nama = htmlspecialchars($_POST['nama']);
 if(empty($nama)){//apakah username ksong
    //jika kosong akan muncul tulisan username belum diisi
 echo "<span style='color:red'>Nama belum diisi</span><br>";
 //}else {
    //$namaOk = true;
 }
}

//if (isset($_POST['email']))
if (array_key_exists('email', $_POST)) {
    $email = htmlspecialchars($_POST['email']);
    if(empty($email)){//apakah username ksong
       //jika kosong akan muncul tulisan username belum diisi
    echo "<span style='color:red'>Email belum diisi</span><br>";
    }
}

   //memvalidasi kursus
   //if (!array_key_exists('kursus', $_POST) && $_SERVER['REQUEST_METHOD']===('POST')){
        //$kursus = $_POST['kursus'];
        //print_r($kursus); 
   //}elseif (array_key_exists('kursus', $_POST)){
    //echo "<span style='color:red'>Kursus belum diisi</span><br>";
   //}

   if(!empty($_POST['nama']) & !empty($_POST['email'])){
     if(!empty($_POST['kursus'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $kursus = $_POST['kursus'];
        echo "<div class='data' style ='width: 400px; height:auto; border:1px solid black; padding:5px;'>";
        echo "Terimakasih data anda telah diterima.<br>
        Kursus yang anda pilih sebanyak ". count($kursus). "buah yaitu: <br>";
        foreach(array_keys($kursus) as $fieldkey){
            foreach($kursus[fieldkey] as $key => $value){
                echo "<li> $value</li>";
                $biaya += $key;
            }
           
        }
        echo "Biaya Kursus Sebesar Rp."number_format($biaya,2,',','.');
        echo "</div>;"
    }else{
        echo "<span style='color:red'> kursus belum diisi</span>";
    }
}
?>
</body>
</html>