<?php
const BUTUH_NAMA = 'Silakan masukkan nama pelanggan';
const BUTUH_ALAMAT='Silakan masukkan alamat';
const BUTUH_NOMORHP = 'Silakan masukkan nomorHP';
$errors = [];
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// proses update record
if ($request_method === 'POST') {
    $id = $_POST['id'];
    echo $id; // cek

    // sanitize and validate nama
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    if ($nama) {//mengecek nama
        $nama = trim($nama);//trim untuk menghapus spasi pada awal dan akhir
        if ($nama === '') {
            $errors['nama'] = BUTUH_NAMA;
        }
    } else {
        $errors['nama'] = BUTUH_NAMA;
    }
    echo $nama; // cek
    
    // sanitize and validate alamat
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    if ($alamat) {
        $alamat = trim($alamat);
        if ($alamat === '') {
            $errors['alamat'] = BUTUH_ALAMAT;
        }
    } else {
        $errors['alamat'] = BUTUH_ALAMAT;
    }
    echo $alamat; // cek
 
    // sanitize & validate nomorhp
    $nomorHP= filter_input(INPUT_POST, 'nomorHP', FILTER_SANITIZE_NUMBER_INT);
    $inputs['nomorHP'] = $nomorHP;
    if ($nomorHP) {
        // validate stok
        $nomorHP = filter_var($nomorHP, FILTER_VALIDATE_INT);
        if ($nomorHP === false) {
            $errors['nomorHP'] = BUTUH_NOMORHP;
        }
    } else {
        $errors['nomorHP'] = BUTUH_NOMORHP;
    }
    echo $nomorHP; // cek
 
    // jika tidak ada eror, simpan data pelanggan
    if (count($errors) == 0){
        require_once __DIR__ . '/pelanggan.php';
        $hasil = updatePelanggan($id, $nama, $alamat, $nomorHP);
        if(!$hasil){
            echo "Gagal menyimpan, silakan diulang<br>";
            echo mysqli_error($koneksi)."<br>";
        }else{
            header("Location: tugas4.php");
            exit();
        }
    } 
} // akhir proses update record
   // saat pertama klik update 
   // ambil data pelanggan dengan id tertentu
   if(isset($_GET["id"])){
        $id = $_GET['id'];//get untuk memangambil nilai dari data yang diinputkan
        require_once 'pelanggan.php';
        $sql = "select * from pelanggan where id = $id";
        $hasil = bacaPelanggan($sql);
        $nama = $hasil[0]['nama'];
        $alamat = $hasil[0]['alamat'];
        $nomorHP = $hasil[0]['nomorHP'];
        //$foto = $hasil[0]['foto'];
   }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
    <title>Update Pelanggan</title>
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
    <label for="nama">Nama Pelanggan:</label><br>
    <input type="text" name="nama" id="nama" 
    value="<?php echo $nama ?>"><br>
    <small><?php echo isset($errors['nama'])?$errors['nama']: '' ?></small>
    </div>
 
    <div>
    <label for="nama">Alamat:</label><br>
    <input type="text" name="alamat" id="alamat"
    value="<?php echo $alamat ?>"><br>
    <small><?php echo isset($errors['alamat'])?$errors['alamat']: '' ?></small>
    </div>
 
    <div>
    <label for="nama">NomorHP:</label><br>
    <input type="text" name="nomorHP" id="nomorHP"
    value="<?php echo $nomorHP ?>"><br>
    <small><?php echo isset($errors['nomorHP'])?$errors['nomorHP']: '' ?></small>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div>
    <input type="submit" name="proses" value="Update">
    </div>
    </form>
    </body>
    </html>
