<?php
$matakuliahPilih = 0;
if(isset($_COOKIE['keranjang'])){
    $matakuliahPilih = $_COOKIE['keranjang'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $matakuliahPilih = str_replace((",".$id),"",$matakuliahPilih);
    setcookie('keranjang', $matakuliahPilih, time()+3600);
}
$kodemkErr = "";
$namaErr = "";
$skspErr = "";
$matakuliahPilihErr = "";
$kodemk = "";
$nama = "";
$sks = "";
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// Jika diklik tombol Simpan
if ($request_method === 'POST'){
    $kodemk = htmlspecialchars($_POST['kodemk']);
    if(empty($kodemk)){//jika nama belum diisi
        $kodemkErr = "Kodemk belum diisi";//akan menampilkan eror
    }
    $nama = htmlspecialchars($_POST['nama']);
    if(empty($nama)){
        $namaErr = "Nama belum diisi";
    }
    $sks = htmlspecialchars($_POST['sks']);
    if(empty($sks)){
        $sksErr = "Sks belum diisi";
    }
    //$tanggal = date("Y-m-d");
 
    if(!isset($_COOKIE['keranjang'])){
        $matakuliahPilihErr = "<br><small>Keranjang Ambil kosong</small><br>"; 
    }
    // jika tidak ada error data siap disimpan 
    if(empty($kodemktErr) && empty($namaErr) 
    && empty($skspErr) && empty($matakuliahPilihErr)){
         $qty = 1;
         $simpan = true;
         require_once "koneksitoko.php";
         $kon = koneksiToko();
         // memulai transaksi 
         $mulaiTransaksi = mysqli_begin_transaction($kon);
         $sql = "insert into hjual (tanggal, namacust, email, notelp)
         value ('$tanggal','$namacust','$email','$notelp')";
        $hasil = mysqli_query($kon, $sql);
        if(!$hasil){
            echo "Data customer gagal disimpan <br>";
            $simpan = false;
        }
        // mendapatkan id dr query terakhir
        $idhjual = mysqli_insert_id($kon);//mengambil id yang terakhir(insert)
        if($idhjual == 0){//perlu dicek karena id dimulai dari 1
            echo "Data customer tidak ada <br>";
            $simpan = false;
        }
        // mengkonversi string separator ',' $barangPilih menjadi array
        $barang_array = explode(",", $barangPilih);//explode ((sparator, akan dikonversikan menjadi array),)
        $jumlah = count($barang_array);//menghitung jumlah array 
 
        if($jumlah == 0){//jika tidak ada
            echo "Tidak ada barang yang dipilih<br>";
            $simpan = false;
        }else{
            foreach($barang_array as $idbarang){//akan diambil kecuali 0
                if($idbarang == 0){
                    continue;//jangan dikerjakan selanjutnya
                }
                //memangggil id yang 
                $sql = "select * from barang where id = $idbarang ";
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){//jika tidak ada
                    echo "Barang tidak ada<br>";
                    $simpan = false;
                    break;
                }else{
                    $row = mysqli_fetch_array($hasil);
                    $stok = $row['stok'] - 1;//stok harus dikurangi 1 pada tabel barang, harus berkurang karena terjadi pembelian
                    if($stok < 0){//jika stok <1 maka tidak bisa
                        echo "Stok barang ".row['nama']." kosong<br>";
                        $simpan = false;
                        break;
                    }
                    $harga = $row['harga'];
                }
                // simpan ke djual
                $sql = "insert into djual (idhjual,idbarang,qty,harga) values ('$idhjual','$idbarang','$qty','$harga')";
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){//dicek jika tidak berhasil
                    echo "Detail jual gagal simpan<br>";
                    $simpan = false();
                    break; 
                }
                // mengurangi stok barang
                $sql = "update barang set stok = $stok
                where id = $idbarang ";//dilakukan peupdatebarang yanr mana stok telah dikramgi 1
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){
                    echo "Update stok barang gagal<br>";
                    $simpan = false;
                    break;
                }
            } // end foreach
        } // end ada barang dipilih

        if($simpan){//jika simpan benar akan di commit
            $komit = mysqli_commit($kon);//comit berarti benar"simpan ke tabel 
            echo "Pembelian berhasil<br>"; //cek
        }else{//jika simpan tidak berhasil
            $rollback = mysqli_rollback($kon);//maka akan dirollback
            echo "Pembelian gagal<br>";//tidak terjadi penyimpanan
        }
        setcookie('keranjang',$barangPilih,time()-3600);//cookie akan dibuang karen asudah dilakukan penyimpanan sesungguhnya
        header("Location: buktibeli.php?idhjual=$idhjual");//membawa bukti beli dengan id hjual 
    } // end tidak ada error siap disimpan
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengambilan</title>
    <style>
    table, td, th {
        border: 1px solid gray;
    }
    table {
        border-collapse: collapse;
    }
    .tengah{
        width: 75%;
        margin: auto;
    }
 
    small{
        color: red;
    }
    </style>
    </head>
    <body>
        <div class="tengah">
            <h2>DATA PENGAMBIL MATAKULIAH</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) 
            ?>" method="post">
            <label>
            Nim:<br>
            <input type="text" name="kodemk" value="<?php echo 
            $kodemk;?>"><br>
            </label>
            <?php if(!empty($kodemkErr)) echo 
            "<small>$kodemkErr</small><br>"; ?>
            <label>
                <br>Nama:<br>
                <input type="nama" name= "nama" value="<?php echo 
                $nama;?>"><br>
                </label>
                <?php if(!empty($namaErr)) echo "<small>$namaErr</small><br>"; 
                ?>
                <label>
                    <br>Prodi:<br>
                    <input type="text" name="sks" value="<?php echo 
                    $sks;?>"><br>
                    </label>
                    <?php if(!empty($sksErr)) echo 
                    "<small>$sksErr</small><br>"; ?>
                    <br><button type="submit">Simpan</button>
                </form>
                <?php
                if(!empty($matakuliahPilihErr)){
                    echo $matakuliahPilihErr;
                }
                ?>
                <?php
                // tampilkan keranjang belanja
                require_once 'matakuliah.php';
                $sql = "select * from matakuliah where id in (".$matakuliahPilih.")
                order by id asc";
                echo $sql."<br>"; // cek
                echo "<hr>";
                $hasils = bacaMatakuliah($sql);
                echo "<h2>KERANJANG AMBIL</h2>";
 
                if(count($hasils) > 0){
                    echo "<table>";
                    echo "<tr>
                    <th>kodemk</th>
                    <th>Nama Matakuliah</th>
                    <th>sks</th>
                    <th>Operasi</th>
                    </tr>";
                    foreach($hasils as $hasil){
                        echo "<tr>";
                        echo "<td>{$hasil['kodemk']}</td>"; 
                        echo "<td>{$hasil['nama']}</td>"; 
                        echo "<td>{$hasil['sks']}</td>"; 
                        echo "<td><a 
                        href='$_SERVER[PHP_SELF]?id={$hasil['id']}'>Batal</a></td>"; 
                        echo "</tr>\n"; 
                    }
                    echo "</table>";
}
?>
</div>
</body>
</html>
