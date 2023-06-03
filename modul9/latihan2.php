<!DOCTYPE html>
<html>
<head>
 <title>Latihan 2</title>
 <style>
 table, td, th {
 border: 1px solid grey;
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
        Semua data
    </label>
    <label>
        <input type="radio" name="stok" value="menipis"
        <?php echo $stok=='menipis'?'checked':'' ?> >
        Stok menipis
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
    $sql = "select * from barang";//menampilkan semua barang
    if($stok == 'menipis')//akan dijalankan jika stok barang menipis
    $sql .= ' where stok <= 5';
    $hasil = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($hasil) > 0){//jumlah baris yang diterima
        echo "<table>";//menampilkan baris menampilkan 1 per 1
        echo "<tr> 
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Foto</th>
        </tr>";
 
        while($row = mysqli_fetch_array($hasil)){
            echo "<tr>";
            echo "<td>{$row['nama']}</td>"; 
            echo "<td>{$row['harga']}</td>"; 
            echo "<td>{$row['stok']}</td>"; 
            echo "<td><img src='gambar/{$row['foto']}' width='100'></td>";
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
