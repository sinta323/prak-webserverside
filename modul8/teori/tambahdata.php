<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "akademik");
// Check connection
if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$nim = mysqli_real_escape_string($link, $_REQUEST['nim']);
$nama = mysqli_real_escape_string($link, $_REQUEST['nama']);
$jeniskelamin = mysqli_real_escape_string($link, $_REQUEST['jeniskelamin']);
$prodi = mysqli_real_escape_string($link, $_REQUEST['prodi']);
// Attempt insert query execution
$sql = "INSERT INTO mahasiswa (nim, nama, jeniskelamin, prodi) VALUES
($nim, '$nama', '$jeniskelamin','$prodi')";
if(mysqli_query($link, $sql)){
 echo "Records added successfully.";
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

