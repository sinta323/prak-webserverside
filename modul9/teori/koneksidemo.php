<?php
function koneksiDemo(){
    $link = mysqli_connect("localhost", "root", "", "demo");//mysqli_connect u membuka koneksi
    // Check connection
    if($link === false){
        //mengecek koneksi, 
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    return $link;
}
?>