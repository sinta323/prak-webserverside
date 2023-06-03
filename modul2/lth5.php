<!DOCTYPE html>
<html lang="en">
<head>
 <title> Belajar PHP </title>
</head>
<body>
	<?php 
	 $x1 = 1; 
	 $y1 = -2;
	 $x2 = 8;
	 $y2 = 7;
	 $phi = 3.14;
	 $x = $x2 - $x1;
	 $y = $y2 - $y1;
	 $k = pow($x,2);
	 $l = pow($y,2);
	 $jari = sqrt($k + $l);
	 $luas = $phi * $jari * $jari;
	 $keliling = 2 * $phi * $jari;
	 echo "luas lingkarannya = $luas";
	 echo "<br>";
	 echo "keliling lingkarannya = $keliling"; 
	?>
</body>
</html>