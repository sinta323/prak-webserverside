<!DOCTYPE html>
<html>
<head>
 <title>Tugas 1</title>
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
require_once 'koneksitoko.php';//menampilkan atau menyertakan koneksi toko
$koneksi = koneksiToko();//mengecek koneksi toko
if(!$koneksi){
     die ("Gagal Koneksi");
}
$sql = "select * from pelanggan";//menampilkan semua barang
$hasil = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($hasil) > 0){//jumlah baris yang diterima
    echo "<table>";//menampilkan baris menampilkan 1 per 1
    echo "<tr> 
    <th>Id</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>NomorHP</th>
    </tr>";
 
    while($row = mysqli_fetch_array($hasil)){
        echo "<tr>";
        echo "<td>{$row['id']}</td>"; 
        echo "<td>{$row['nama']}</td>"; 
        echo "<td>{$row['alamat']}</td>"; 
        echo "<td>{$row['nomorHP']}</td>"; 
       // echo "<td>{$row['foto']}</td>"; 
        echo "</tr>\n";
    }
    echo "</table>";
}else
    echo "Tidak ada data";
    mysqli_close($koneksi);
?>
</body>
</html>
