<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "akademik");
// Check connection
if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS `upload` (
    `id_file` int(11) NOT NULL AUTO_INCREMENT,
    `nama_file` varchar(100) NOT NULL,
    PRIMARY KEY (`id_file`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7" ;
if(mysqli_query($link, $sql)){
 echo "Table created successfully.";
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);