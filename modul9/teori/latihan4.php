<!DOCTYPE html>
<html>
<head>
 <title>Latihan 4</title>
 <style>
 table, td, th {
 border: 1px solid grey;
 padding : 10px;
 }
 table {
 border-collapse: collapse;
 }
 </style>
</head>
<body>
<?php
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);
    $stok = 'semua';
    if ($request_method === 'POST'){
        if(filter_has_var(INPUT_POST, 'stok'))
        $stok = $_POST['stok'];
    }
    ?>
    <h2>Daftar Barang</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
    method="post">
    <label>
        <input type="radio" name="stok" value="semua" 
        <?php echo $stok=='semua'?'checked':'' ?> >
        Semua Barang
    </label>
    <label>
        <input type="radio" name="stok" value="maximal 5"
        <?php echo $stok=='maximal 5'?'checked':'' ?> >
        Stok maximal 5
    </label>
    <br><br>
    <button type="submit">Tampilkan</button>
</form>
<?php
if ($request_method === 'POST'){//jika kita klik simpan
    echo "<h3>Stok: $stok</h3>"; 
    require_once 'koneksitoko.php';//menampilkan atau menyertakan koneksi toko
    $koneksi = koneksiToko();//mengecek koneksi toko
    if(!$koneksi){
        die ("Gagal Koneksi");
    }
    $sql = "select * from barang1";//menampilkan semua barang
    if($stok == 'maximal 5')//akan dijalankan jika stok barang menipis
    $sql .= ' where stok = 5';
    $hasil = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($hasil) > 0){//jumlah baris yang diterima
        echo "<table>";//menampilkan baris menampilkan 1 per 1
        echo "<tr> 
        <th>Id</th>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        </tr>";
 
        while($row = mysqli_fetch_array($hasil)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>"; 
            echo "<td>{$row['kode']}</td>"; 
            echo "<td>{$row['nama']}</td>"; 
            echo "<td>{$row['harga']}</td>";
            echo "<td>{$row['stok']}</td>";
        // echo "<td>{$row['foto']}</td>"; 
            echo "</tr>\n";
        }
        echo "</table>";
    }else
    echo "Tidak ada data";
    mysqli_close($koneksi);
}
?>
</body>
</html>
