<?php
const BUTUH_KODE = 'Silakan masukkan kode buku';
const BUTUH_JUDUL='Silakan masukkan judul';
const BUTUH_PENGARANG = 'Silakan masukkan pengarang';
const BUTUH_PENERBIT = 'Silakan masukkan penerbit';
const BUTUH_STOK = 'Silakan masukkan stok';
// sanitize and validate nama
$kode = filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_NUMBER_INT);
$inputs['kode'] = $kode;
if ($kode) {
    //trim u/ menghapus spasi didepan maupun dibelakang
    $kode = trim($kode);
    if ($kode === '') {
    $errors['kode'] = BUTUH_KODE;
    }
   } else {
    $errors['kode'] = BUTUH_KODE;
   }
   // sanitize & validate harga
   $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
   $inputs['judul'] = $judul;
   if ($judul) {
    // validate harga
    $judul = filter_var($judul, FILTER_VALIDATE_STRING);
    if ($judul === false) {
    $errors['judul'] = BUTUH_JUDUL;
    }
   } else {
    $errors['judul'] = BUTUH_JUDUL;
   }
   // sanitize & validate stok
   $pengarang = filter_input(INPUT_POST, 'pengarang', FILTER_SANITIZE_STRING);
   $inputs['pengarang'] = $pengarang;
   if ($pengarang) {
    // validate stok
    $pengarang = filter_var($pengarang, FILTER_VALIDATE_STRING);
    if ($pengarang === false) {
    $errors['pengarang'] = BUTUH_PENGARANG;
    }
   } else {
    $errors['pengarang'] = BUTUH_PENGARANG;
   }
   
     // sanitize & validate stok
     $penerbit= filter_input(INPUT_POST, 'penerbit', FILTER_SANITIZE_STRING);
     $inputs['penerbit'] = $penerbit;
     if ($penerbit) {
      // validate stok
      $penerbit = filter_var($penerbit, FILTER_VALIDATE_STRING);
      if ($penerbit=== false) {
      $errors['penerbit'] = BUTUH_PENERBIT;
      }
     } else {
      $errors['penerbit'] = BUTUH_PENERBIT;
     }

      // sanitize & validate stok
      $stok= filter_input(INPUT_POST, 'stok', FILTER_SANITIZE_NUMBER_INT);
      $inputs['stok'] = $stok;
      if ($stok) {
       // validate stok
       $stok = filter_var($stok, FILTER_VALIDATE_INT);
       if ($stok=== false) {
       $errors['stok'] = BUTUH_STOK;
       }
      } else {
       $errors['stok'] = BUTUH_STOK;
      }
   // jika tidak ada eror, simpan data barang
   if (count($errors) == 0){
    require_once __DIR__ . '/buku.php';
    $hasil = tambahBarang($kode,$judul,$pengarang,$penerbit,$stok);
    if(!$hasil){
    echo "Gagal menyimpan, silakan diulang<br>";
    echo mysqli_error($koneksi)."<br>";
    }else{
    echo "Berhasil menyimpan data";
    }
    $tujuan = htmlspecialchars($_SERVER['PHP_SELF']);
     //membuat form untuk kembali
    echo "
    <form action='$tujuan' >
    <input type='submit' value='Kembali'>
    </form>
    ";
   }
?>   