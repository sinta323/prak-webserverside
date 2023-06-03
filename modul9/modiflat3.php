<!DOCTYPE html>
<html>
<head>
 <title>Latihan 3</title>
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
    $stok= "";
    if ($request_method === 'POST')
    if(filter_has_var(INPUT_POST, 'stok'))
    $stok = htmlspecialchars($_POST['stok']);
    ?>
    <h2>Cari stok</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
    method="post">
    Stok Barang:<br>
    <input type="text" name="stok" placeholder="Stok barang" value="<?php echo $stok ?>" >
    <br><br>
    <button type="submit">Cari stok</button>
</form>
<?php
if ($request_method === 'POST'){
    require_once 'barang.php';
    $sql = "select * from barang where stok like '%$stok%'";
    $hasils = bacaBarang($sql);
    
    if(count($hasils) > 0){
        echo "<table>";
        echo "<tr>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Foto</th>
        </tr>";
        foreach($hasils as $hasil){
            echo "<tr>";
            echo "<td>{$hasil['nama']}</td>"; 
            echo "<td>{$hasil['harga']}</td>"; 
            echo "<td>{$hasil['stok']}</td>"; 
            echo "<td><img src='gambar/{$hasil['foto']}' width='100'></td>"; 
            echo "</tr>\n"; 
        }
        echo "</table>";
    }else
    echo "Tidak ada data";
}
?>
</body>
</html>
