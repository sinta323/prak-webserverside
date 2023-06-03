<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembelian</title>
    <style>
    @media print{
        #tombol{
            display: none;
        } 
    }
 
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
            <div id="tombol">
                <input type="button" value="Beli lagi"onClick="window.location.assign('barangtersedia.php')">
                <input type="button" value="Print"
                onClick="window.print()">
            </div>
            <?php
            $idhjual = $_GET['idhjual'];//mengambil id hjual barang
            require_once "koneksitoko.php";
            $kon = koneksiToko();
            //diambil data di hjual
            $sql = "select * from hjual where idhjual = $idhjual ";
            $hasil = mysqli_query($kon, $sql);
            $row = mysqli_fetch_array($hasil);
            echo "<pre>";//membauat huruf
            echo "<h2>BUKTI PEMBELIAN</h2>";
            //nota berisi tanggal dan id dari hjual
            echo "NO. NOTA : ".date("Ymd").$row['idhjual']."<br>";
            echo "TANGGAL : ".$row['tanggal']."<br>";//tanggal data tabel
            echo "NAMA : ".$row['namacust']."<br>";//nama custumer
            //mengselect dari 2 tabel (tabel barang) mengabil 3 record
            $sql = "select barang.nama, djual.harga, djual.qty,
            (djual.harga * djual.qty) as jumlah
            from djual inner join barang
            on djual.idbarang = barang.id
            where djual.idhjual = $idhjual ";
            $hasil = mysqli_query($kon, $sql);
            echo "<table>";
            echo "<tr>";
            echo " <th> Nama Barang </th>";
            echo " <th> Quantity </th>";
            echo " <th> Harga </th>";
            echo " <th> Jumlah </th>";
            echo "</tr>";
            $jumlah = 0;
            while($row = mysqli_fetch_array($hasil)){//mengambil dari $hasil
                echo "<tr>";
                 $jumlah += $row['jumlah'];
                echo " <td>".$row['nama']."</td>"; //menampilkan nama
                echo " <td align='right'>".$row['qty']."</td>"; //qty
                echo " <td align='right'>".$row['harga']."</td>"; //harga
                echo " <td align='right'>".$row['jumlah']."</td>"; //jumlah
                echo "</tr>"; 
            }
            //kode untuk menampilkan jumlah
            echo "<tr>";
            echo "<td>" ."</td>";
            echo "<td>" ."</td>";
            echo " <td align='right'><b>Total Jumlah</b></td>";  
            echo "<td align ='right'><b>".$jumlah."</b></td>";
            echo "</tr>";
            echo "</table>";
            echo "</pre>";
            ?>
            </div>
        </body>
        </html>
