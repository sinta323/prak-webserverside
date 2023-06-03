<?php
const BUTUH_KODE = 'Silakan masukkan kode barang';
const BUTUH_NAMA = 'Silakan masukkan nama barang';
const BUTUH_HARGA='Silakan masukkan harga';
const BUTUH_STOK = 'Silakan masukkan stok';
$errors = [];
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// proses update record
if ($request_method === 'POST') {
 $id = $_POST['id'];
 echo $id; // cek
 
 // sanitize & validate kode
 $kode = filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_NUMBER_INT);
 $inputs['kode'] = $kode;
 if ($kode) {
 // validate kode
 $kode = filter_var($kode, FILTER_VALIDATE_INT);
 if ($stok === false) {
 $errors['kode'] = BUTUH_KODE;
 }
 } else {
 $errors['kode'] = BUTUH_KODE;
 }
 echo $kode; // cek

 // sanitize and validate nama
 $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
 if ($nama) {
 $nama = trim($nama);
 if ($nama === '') {
 $errors['nama'] = BUTUH_NAMA;
 }
 } else {
 $errors['nama'] = BUTUH_NAMA;
 }
 echo $nama; // cek
 
 // sanitize & validate harga
 $harga = filter_input(INPUT_POST, 'harga', FILTER_SANITIZE_NUMBER_INT);
 if ($harga) {
 // validate harga
 $harga = filter_var($harga, FILTER_VALIDATE_INT);
 if ($harga === false) {
 $errors['harga'] = BUTUH_HARGA;
 }
 } else {
 $errors['harga'] = BUTUH_HARGA;
 }
 echo $harga; // cek
 
 // sanitize & validate stok
 $stok = filter_input(INPUT_POST, 'stok', FILTER_SANITIZE_NUMBER_INT);
 $inputs['stok'] = $stok;
 if ($stok) {
 // validate stok
 $stok = filter_var($stok, FILTER_VALIDATE_INT);
 if ($stok === false) {
 $errors['stok'] = BUTUH_STOK;
 }
 } else {
 $errors['stok'] = BUTUH_STOK;
 }
 echo $stok; // cek
 
 // jika tidak ada eror, simpan data barang
 if (count($errors) == 0){
    require_once __DIR__ . '/barang1.php';
    
    $hasil = updateBarang($id, $kode, $nama, $harga, $stok);
    if(!$hasil){
    echo "Gagal menyimpan, silakan diulang<br>";
    echo mysqli_error($koneksi)."<br>";
    }else{
    header("Location: latihan2.php");
    exit();
    }
    } 
   } // akhir proses update record
   // saat pertama klik update 
   // ambil data barang dengan id tertentu
   if(isset($_GET["id"])){ 
    $id = $_GET['id'];
    require_once 'barang1.php';
    $sql = "select * from barang1 where id = $id";
    $hasil = bacaBarang($sql);
    $foto = $hasil[0]['kode'];
    $nama = $hasil[0]['nama'];
    $harga = $hasil[0]['harga'];
    $stok = $hasil[0]['stok'];
    
   }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
    <title>Update Barang</title>
    <style>
    small {
    color:red;
   }
    </style>
   </head>
   <body>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
   method="post">
   <div>
    <label for="nama">Kode Barang:</label><br>
    <input type="text" name="kode" id="kode" 
    value="<?php echo $nama ?>"><br>
    <small><?php echo isset($errors['kode'])?$errors['kode']: '' ?></small>
    </div>
    <div>
    <label for="nama">Nama Barang:</label><br>
    <input type="text" name="nama" id="nama" 
    value="<?php echo $nama ?>"><br>
    <small><?php echo isset($errors['nama'])?$errors['nama']: '' ?></small>
    </div>
 
 <div>
 <label for="nama">Harga Jual:</label><br>
 <input type="text" name="harga" id="harga"
 value="<?php echo $harga ?>"><br>
 <small><?php echo isset($errors['harga'])?$errors['harga']: '' ?></small>
 </div>
 
 <div>
 <label for="nama">Stok:</label><br>
 <input type="text" name="stok" id="stok"
 value="<?php echo $stok ?>"><br>
 <small><?php echo isset($errors['stok'])?$errors['stok']: '' ?></small>
 </div>
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <input type="submit" name="proses" value="Update">
 </div>
 </form>
</body>
</html>   