<!DOCTYPE html>
<html>
<head>
 <title>Tugas 3</title>
 <style>
 table, td, th {
 border: 1px solid gray;
 }
 table {
 border-collapse: collapse;
 }
 </style>
</head>
<body>
<?php
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
$nama = "";
if ($request_method === 'POST')
 if(filter_has_var(INPUT_POST, 'nama'))
 $nama = htmlspecialchars($_POST['nama']);
?>
<h2>Cari Pelanggan</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
method="post">
 Nama Pelanggan:<br>
 <input type="text" name="nama" placeholder="Nama Pelanggan" 
 value="<?php echo $nama ?>" >
 <br><br>
 <button type="submit">Cari Pelanggan</button>
</form>
<?php
if ($request_method === 'POST'){
 require_once 'pelanggan.php';
 $sql = "select * from pelanggan where nama like '%$nama%'";
 $hasils = bacaPelanggan($sql);
 
 if(count($hasils) > 0){
    echo "<table>";
    echo "<tr>
    <th>Nama</th>
    <th>Alamat</th>
    <th>NomorHP</th>
    <th>Aksi</th>
    </tr>";
    foreach($hasils as $hasil){
        echo "<tr>";
        echo "<td>{$hasil['nama']}</td>"; 
        echo "<td>{$hasil['alamat']}</td>"; 
        echo "<td>{$hasil['nomorHP']}</td>"; 
        //echo "<td><img src='gambar/{$hasil['foto']}' width='100'></td>"; 
        echo "<td><a href='hapuspelanggan.php?id={$hasil['id']}'>Hapus</a></td>"; 
        echo "</tr>\n"; 
 }
 echo "</table>";
 }else
 echo "Tidak ada data";
}
?>
</body>
</html>