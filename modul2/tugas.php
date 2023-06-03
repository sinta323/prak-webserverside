<!DOCTYPE html>
<html lang="en">
<head>
 <title> Belajar PHP </title>
</head>
<body>
	<?php 
	 $r = 5; 
	 $t = 10;
	 $s = 18;
	 $phi = 3.14;
	 $alas = $phi * $r * $r;
	 $selimut = $phi * $r * $r;
	 $permukaan = ($phi * $r * $r) + ($phi * $r * $r);
	 $volume = 1/3 * $phi * $r * $r * $t;
	 echo "luas alasnya = $alas";
	 echo "<br>";
	 echo "luas selimutnya = $selimut";
	 echo "<br>";
	 echo "luas permukaannya = $permukaan";
	 echo "<br>";
	 echo "volume kerucut = $volume"; 
	?>
</body>
</html>