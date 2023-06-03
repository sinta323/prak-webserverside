<!DOCTYPE html>
<html>
<head>
  <title>Latihan 2</title>
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
$nama = 'John';
if ($request_method === 'POST'){
  if(filter_has_var(INPUT_POST, 'nama'))
    $nama = $_POST['nama'];
}
?>

<h2>Daftar Orang</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <label>
    <input type="radio" name="nama" value="semua" 
	<?php echo $nama=='semua'?'checked':'' ?> >
    Semua data
  </label>
  <label>
    <input type="radio" name="nama" value="John"
	<?php echo $nama=='John'?'checked':'' ?> >
    Nama John
  </label>
  <br><br>
  <button type="submit">Tampilkan</button>
</form>

<?php
if ($request_method === 'POST'){
  echo "<h3>Nama: $nama</h3>";  
    
  require_once 'koneksidemo.php';
  $link = koneksiDemo();

  $sql = "select * from persons";
  if($nama == 'John')
    $sql .= ' where first_name = "John"';


// Attempt select query execution
//$sql = "SELECT * FROM persons ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
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
