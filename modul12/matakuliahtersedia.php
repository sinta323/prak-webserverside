<?php
$matakuliahPilih = 0;
if(isset($_COOKIE['keranjang'])){
    $matakuliahPilih = $_COOKIE['keranjang'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $matakuliahPilih = $matakuliahPilih.",".$id;
    //keranjang berisi matakuliah pilih dan barangpilih berisi id matakuliah
    setcookie('keranjang', $matakuliahPilih, time()+3600);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Matakuliah Tersedia</title>
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
    </style>
    </head>
    <body>
        <div class="tengah">
            <?php
            require_once 'matakuliah.php';
            $sql = "select * from matakuliah where id not in (".$matakuliahPilih.") 
            and sks>0 order by id asc";
            echo $sql."<br>"; // cek (berisi id akan mengambil id barang kecuali barang yang sudah dipilih)
            $hasils = bacaMatakuliah($sql); //dibaca dengan perintah 34
            echo "<h2>DAFTAR MATAKULIAH TERSEDIA</h2>";
            if(count($hasils) > 0){
                echo "<table>";
                echo "<tr>
                <th>Kodemk</th>
                <th>Nama Matakuliah</th>
                <th>sks</th>
                <th>Operasi</th>
                </tr>";
                foreach($hasils as $hasil){
                    echo "<tr>";
                    //echo "<td><img src='gambar/{$hasil['foto']}' width='100'></td>"; 
                    echo "<td>{$hasil['kodemk']}</td>"; 
                    echo "<td>{$hasil['nama']}</td>"; 
                    echo "<td>{$hasil['sks']}</td>"; 
                    echo "<td><a 
                    href='$_SERVER[PHP_SELF]?id={$hasil['id']}'>Ambil</a></td>"; //
                    echo "</tr>\n"; 
                }
                echo "</table>";
            }
            ?>
            </div>
        </body>
        </html>
