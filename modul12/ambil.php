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

    $nimErr = "";
    $namaErr = "";
    $prodipErr = "";
    $matakuliahPilihErr = "";
    $nim = "";
    $nama = "";
    $prodi = "";
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);

    // Jika diklik tombol Simpan
    if ($request_method === 'POST'){
        $nim = htmlspecialchars($_POST['nim']);
        if(empty($nim)){
            $nimErr = "NIM belum diisi";
        }
        $nama = htmlspecialchars($_POST['nama']);
        if(empty($nama)){
            $namaErr = "Nama belum diisi";
        }
        
        $prodi = htmlspecialchars($_POST['prodi']);
        if(empty($prodi)){
            $prodiErr = "Prodi belum diisi";
        }
        $tanggal = date("Y-m-d");
 
        if(!isset($_COOKIE['keranjang'])){
            $matakuliahPilihErr = "<br><small>Pengambilan Barang kosong</small><br>"; 
        }
        // jika tidak ada error data siap disimpan 
        if(empty($nimErr) && empty($namaErr) && empty($prosiErr) && empty($matakuliahPilihErr)){
            echo "<h3>Data siap disimpan.</h3>";
            // menghapus keranjang
            setcookie('keranjang',$matakuliahPilih,time()-3600);
        }
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
        <h2>pengambilan matakuliah</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <label>
                NIM :<br>
                <input type="text" name="nim" value="<?php echo $nim;?>"><br>
            </label>
        
            <?php if(!empty($nimErr)) echo "<small>$nimErr</small><br>"; ?>
            
            <label>
                <br>Nama :<br>
                <input type="text" name="nama" value="<?php echo $nama;?>"><br>
            </label>
        
            <?php if(!empty($namaErr)) echo "<small>$namaErr</small><br>"; ?>
        
            <label>
                <br>Prodi :<br>
                <input type="text" name="prodi" value="<?php echo $prodi;?>"><br>
            </label>
        
            <?php if(!empty($prodiErr)) echo "<small>$prodiErr</small><br>"; ?>
            
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
            $sql = "select * from matakuliah where id in (".$matakuliahPilih.")order by id asc";
            echo $sql."<br>"; // cek
            echo "<hr>";
            $hasils = bacaMatakuliah($sql);
            echo "<h2>PEMILIHAN KRS</h2>";
 
            if(count($hasils) > 0){
                echo "<table>";
                echo "<tr>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Operasi</th>
                </tr>";
    
                foreach($hasils as $hasil){
                    echo "<tr>";
                    echo "<td>{$hasil['kodemk']}</td>"; 
                    echo "<td>{$hasil['nama']}</td>"; 
                    echo "<td>{$hasil['sks']}</td>"; 
                    echo "<td><a href='$_SERVER[PHP_SELF]?id={$hasil['id']}'>Batal</a></td>"; 
                    echo "</tr>\n"; 
                }
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>