<?php
$barangPilih = 0;
if(isset($_COOKIE['keranjang'])){
    $barangPilih = $_COOKIE['keranjang'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $barangPilih = str_replace((",".$id),"",$barangPilih);
    setcookie('keranjang', $barangPilih, time()+3600);
}
$namacustErr = "";
$emailErr = "";
$notelpErr = "";
$barangPilihErr = "";
$namacust = "";
$email = "";
$notelp = "";
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
// Jika diklik tombol Simpan
if ($request_method === 'POST'){
    $namacust = htmlspecialchars($_POST['namacust']);
    if(empty($namacust)){//jika nama belum diisi
        $namacustErr = "Nama belum diisi";//akan menampilkan eror
    }
    $email = htmlspecialchars($_POST['email']);
    if(empty($email)){
        $emailErr = "Email belum diisi";
    }
    $notelp = htmlspecialchars($_POST['notelp']);
    if(empty($notelp)){
        $notelpErr = "No. Telepon belum diisi";
    }
    $tanggal = date("Y-m-d");
 
    if(!isset($_COOKIE['keranjang'])){
        $barangPilihErr = "<br><small>Keranjang belanja kosong</small><br>"; 
    }
    // jika tidak ada error data siap disimpan 
    if(empty($namacustErr) && empty($emailErr) 
    && empty($notelpErr) && empty($barangPilihErr)){
         $qty = 1;
         $simpan = true;
         require_once "koneksitoko.php";
         $kon = koneksiToko();
         // memulai transaksi 
         $mulaiTransaksi = mysqli_begin_transaction($kon);
         $sql = "insert into krs (nim, nama, prodi)
         value ('$nim','$nama','$prodi')";
        $hasil = mysqli_query($kon, $sql);
        if(!$hasil){
            echo "Data customer gagal disimpan <br>";
            $simpan = false;
        }
        // mendapatkan id dr query terakhir
        $idkrs = mysqli_insert_id($kon);//mengambil id yang terakhir(insert)
        if($idkrs == 0){//perlu dicek karena id dimulai dari 1
            echo "Data Mahasiswa tidak ada <br>";
            $simpan = false;
        }
        // mengkonversi string separator ',' $barangPilih menjadi array
        $matakuliah_array = explode(",", $matakuliahPilih);//explode ((sparator, akan dikonversikan menjadi array),)
        $jumlah = count($matakuliah_array);//menghitung jumlah array 
 
        if($jumlah == 0){//jika tidak ada
            echo "Tidak ada matakuliah yang diambil<br>";
            $simpan = false;
        }else{
            foreach($matakuliah_array as $idmk){//akan diambil kecuali 0
                if($idmk == 0){
                    continue;//jangan dikerjakan selanjutnya
                }
                //memangggil id yang 
                $sql = "select * from matakuliah where id = $idmk ";
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){//jika tidak ada
                    echo "Matakuliah tidak ada<br>";
                    $simpan = false;
                    break;
                }else{
                    $row = mysqli_fetch_array($hasil);
                    $sks = $row['sks'] - 1;//stok harus dikurangi 1 pada tabel barang, harus berkurang karena terjadi pembelian
                    if($sks < 0){//jika stok <1 maka tidak bisa
                        echo "Sks matakuliah ".row['nama']." kosong<br>";
                        $simpan = false;
                        break;
                    }
                    $harga = $row['nama'];
                }
                // simpan ke djual
                $sql = "insert into dkrs (iddkrs,idkrs,idmk) values ('$iddkrs','$idkrs','$idmk')";
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){//dicek jika tidak berhasil
                    echo "Detail ambil gagal simpan<br>";
                    $simpan = false();
                    break; 
                }
                // mengurangi stok barang
                $sql = "update barang set sks = $sks
                where id = $idmk";//dilakukan peupdatebarang yanr mana stok telah dikramgi 1
                $hasil = mysqli_query($kon, $sql);
                if(!$hasil){
                    echo "Update sks matakuliah gagal<br>";
                    $simpan = false;
                    break;
                }
            } // end foreach
        } // end ada barang dipilih

        if($simpan){//jika simpan benar akan di commit
            $komit = mysqli_commit($kon);//comit berarti benar"simpan ke tabel 
            echo "Pengambilan berhasil<br>"; //cek
        }else{//jika simpan tidak berhasil
            $rollback = mysqli_rollback($kon);//maka akan dirollback
            echo "Pengambilan gagal<br>";//tidak terjadi penyimpanan
        }
        setcookie('keranjang',$matakuliahPilih,time()-3600);//cookie akan dibuang karen asudah dilakukan penyimpanan sesungguhnya
        header("Location: buktiambil.php?idkrs=$idkrs");//membawa bukti beli dengan id hjual 
    } // end tidak ada error siap disimpan
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pembelian</title>
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
            <h2>DATA PEMBELI BARANG</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) 
            ?>" method="post">
            <label>
            Nama:<br>
            <input type="text" name="namacust" value="<?php echo 
            $namacust;?>"><br>
            </label>
            <?php if(!empty($namacustErr)) echo 
            "<small>$namacustErr</small><br>"; ?>
            <label>
                <br>Email:<br>
                <input type="email" name="email" value="<?php echo 
                $email;?>"><br>
                </label>
                <?php if(!empty($emailErr)) echo "<small>$emailErr</small><br>"; 
                ?>
                <label>
                    <br>No. Telepon:<br>
                    <input type="text" name="notelp" value="<?php echo 
                    $notelp;?>"><br>
                    </label>
                    <?php if(!empty($notelpErr)) echo 
                    "<small>$notelpErr</small><br>"; ?>
                    <br><button type="submit">Simpan</button>
                </form>
                <?php
                if(!empty($barangPilihErr)){
                    echo $barangPilihErr;
                }
                ?>
                <?php
                // tampilkan keranjang belanja
                require_once 'barang.php';
                $sql = "select * from barang where id in (".$barangPilih.")
                order by id desc";
                echo $sql."<br>"; // cek
                echo "<hr>";
                $hasils = bacaBarang($sql);
                echo "<h2>KERANJANG BELANJA</h2>";
 
                if(count($hasils) > 0){
                    echo "<table>";
                    echo "<tr>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Operasi</th>
                    </tr>";
                    foreach($hasils as $hasil){
                        echo "<tr>";
                        echo "<td><img src='gambar/{$hasil['foto']}' 
                        width='100'></td>"; 
                        echo "<td>{$hasil['nama']}</td>"; 
                        echo "<td>{$hasil['harga']}</td>"; 
                        echo "<td>{$hasil['stok']}</td>"; 
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
