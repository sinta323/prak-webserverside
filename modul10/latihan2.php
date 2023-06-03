<!DOCTYPE html>
<html>
<head>
 <title>Latihan 2</title>
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
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);
    $nama = "";
    if ($request_method === 'POST')
    if(filter_has_var(INPUT_POST, 'nama'))
    $nama = htmlspecialchars($_POST['nama']);
    ?>
    <h2>Cari Barang</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
    method="post">
    Nama Barang:<br>
    <input type="text" name="nama" placeholder="Nama barang" 
    value="<?php echo $nama ?>" >
    <br><br>
    <button type="submit">Cari barang</button>
</form>
<?php
if ($request_method === 'POST'){
    require_once 'barang.php';
    $sql = "select * from barang where nama like '%$nama%'";
    $hasils = bacaBarang($sql);
    
    if(count($hasils) > 0){
        echo "<table>";
        echo "<tr>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Foto</th>
        <th>Aksi</th>
        </tr>";
        foreach($hasils as $hasil){
            echo "<tr>";
            echo "<td>{$hasil['nama']}</td>"; 
            echo "<td>{$hasil['harga']}</td>"; 
            echo "<td>{$hasil['stok']}</td>"; 
            echo "<td><img src='gambar/{$hasil['foto']}' width='100'></td>"; 
            echo "<td><a href='hapusbarang.php?id={$hasil['id']}'>Hapus</a>&nbsp;&nbsp;"; 
            echo "<a href='updatebarang.php?id={$hasil['id']}'>Update</a></td>"; 
            echo "</tr>\n"; 
        }
        echo "</table>";
    }else
    echo "Tidak ada data";
}
?>
</div>
</body>
</html>