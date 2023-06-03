<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "akademik");
// Check connection
if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt create table query execution
$sql = "CREATE TABLE mahasiswa(
 nim INT NOT NULL PRIMARY KEY,
 nama VARCHAR(30) NOT NULL,
 jeniskelamin VARCHAR(10) NOT NULL,
 prodi VARCHAR(70) NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
   } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   }
   // Close connection
   mysqli_close($link);
   ?>
   