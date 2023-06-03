<?php 
require_once __DIR__ . '/koneksitoko.php';
 
function tambahPelanggan($nama,$alamat,$nomorHP){
    $koneksi = koneksiToko();
    $sql="insert into pelanggan(nama,alamat,nomorHP) values('$nama','$alamat','$nomorHP')";
    $hasil=mysqli_query($koneksi, $sql);
    if($hasil){
        return true; 
    }else{
        return false;;
    }
}
// membaca data dalam tabel pelanggan
// hasilnya baca berupa return value
// parameter: SQL select
function bacaPelanggan($sql){
    require_once "koneksitoko.php";
    $hasils = array();
    $koneksi = koneksiToko();
    if($result = mysqli_query($koneksi, $sql)){
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_array($result)){
                $hasils[$i]['id']=$row['id'];
                $hasils[$i]['nama']=$row['nama'];
                $hasils[$i]['alamat']=$row['alamat'];
                $hasils[$i]['nomorHP']=$row['nomorHP'];
                //$hasils[$i]['foto']=$row['foto'];
                $i++;
            }
            mysqli_free_result($result);
        }
    } else{
        die ("ERROR: Tidak dapat menjalankan $sql:". 
        mysqli_error($koneksi));
    }
    // Close connection
     mysqli_close($koneksi);
     return $hasils;
}
function hapusPelanggan($id){
    $koneksi = koneksiToko();
    $sql="delete from pelanggan where id = $id";
    $hasil=mysqli_query($koneksi, $sql);
    mysqli_close($koneksi);
    if($hasil){
        return true; 
    }else{
        return false;;
    }
}
function updatePelanggan($id, $nama, $alamat, $nomorHP){
    $koneksi = koneksiToko();
    $sql="update pelanggan set 
    nama = '$nama',
    alamat = '$alamat',
    nomorHP = $nomorHP
    where id = $id";
    $hasil=mysqli_query($koneksi, $sql);
    mysqli_close($koneksi);
    if($hasil){
        return true; 
    }else{
        return false;;
    }
}