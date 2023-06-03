<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pengambilan</title>
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
                <input type="button" value="Ambil lagi"
                onClick="window.location.assign('matakuliahtersedia.php')">
                <input type="button" value="Print"
                onClick="window.print()">
            </div>
            <?php
            $idkrs = $_GET['idkrs'];
            require_once "koneksitoko.php";
            $kon = koneksiToko();
            $sql = "select * from krs where idkrs = $idkrs ";
            $hasil = mysqli_query($kon, $sql);
            $row = mysqli_fetch_array($hasil);
            echo "<pre>";
            echo "<h2>LAPORAN PENGAMBILAN MATAKULIAH (KRS)</h2>";
            echo "NAMA : ".$row['nama']."<br>";
            echo "NIM : ".$row['nim']."<br>";
            echo "PRODI : ".$row['prodi']."<br>";
            $sql = "select matakuliah.nim, matakuliah.nama, matakuliah.sks,
            from matakuliah inner join dkrs
            on matakuliah.id = dkrs.idmk
            where dkrs.idkrs = $idkrs ";
            $hasil = mysqli_query($kon, $sql);
            echo "<table>";
            echo "<tr>";
            echo " <th> Kode </th>";
            echo " <th> Nama Matakuliah </th>";
            echo " <th> Sks </th>";
            //echo " <th> Jumlah </th>";
            echo "</tr>";
            $jumlah = 0;
            while($row = mysqli_fetch_array($hasil)){
                $jumlah += $row['jumlah'];
                echo "<tr>";
                echo " <td>".$row['kode']."</td>"; 
                echo " <td align='right'>".$row['nama matakuliah']."</td>"; 
                echo " <td align='right'>".$row['sks']."</td>"; 
                echo " <td align='right'>".$row['jumlah']."</td>"; 
                echo "</tr>"; 
            }
             //kode untuk menampilkan jumlah
             echo "<tr>";
             echo "<td>" ."</td>";
             echo "<td>" ."</td>";
             echo " <td align='right'><b>Jumlah Sks</b></td>";  
             echo "<td align ='right'><b>".$jumlah."</b></td>";
             echo "</tr>";
            echo "</table>";
            echo "</pre>";
            ?>
            </div>
        </body>
        </html>