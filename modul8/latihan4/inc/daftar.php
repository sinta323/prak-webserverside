<!DOCTYPE html>
<html>
<head>
  <title>Daftar barang</title>
  <style>
  table, td, th {
    border: 1px solid blue;
	padding: 10px;
  }
  
  table{
	width: 75%;
	border-collapse: collapse;
	margin: auto;
  }
  
</style>
</head>
<body>
<?php
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
$nama = 'Adi';
if ($request_method === 'POST'){
  if(filter_has_var(INPUT_POST, 'nama'))
    $nama = $_POST['nama'];
}
?>

<h2>Daftar Barang</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <label>
    <input type="radio" name="nama" value="semua" 
	<?php echo $nama=='semua'?'checked':'' ?> >
    Semua data
  </label>
  <label>
    <input type="radio" name="nama" value="Adi"
	<?php echo $nama=='Adi'?'checked':'' ?> >
    Nama Adi
  </label>
  <br><br>
  <button type="submit">Tampilkan</button>
</form>

<?php
if ($request_method === 'POST'){
  echo "<h3>Nama: $nama</h3>";  
    
  require_once 'koneksitoko.php';
  $link = koneksiDemo();

  $sql = "select * from barang1";
  if($nama == 'Adi')
    $sql .= ' where nama = "Adi"';


// Attempt select query execution
//$sql = "SELECT * FROM barang1 ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>nama</th>";
                echo "<th>harga</th>";
                echo "<th>stok</th>";
                echo "<th>kode</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['stok'] . "</td>";
                echo "<td>" . $row['kode'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>
</body>
</html>
