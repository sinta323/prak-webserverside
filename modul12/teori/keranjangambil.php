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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Ambil</title>
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
            $sql = "select * from matakuliah where id in (".$matakuliahPilih.")
            order by id asc";
            echo $sql."<br>"; // cek
 
            $hasils = bacaMatakuliah($sql);
            echo "<h2>KERANJANG AMBIL</h2>";
 
            if(count($hasils) > 0){
                echo "<table>";
                echo "<tr>
                <th>kodemk</th>
                <th>Nama Matakuliah</th>
                <th>Sks</th>
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
