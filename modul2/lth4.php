<!DOCTYPE html>
<html lang="en">
<head>
 <title> Belajar PHP </title>
</head>
<body>
	<?php 
	 $x1 = -2; 
	 $y1 = 1;
	 $x2 = 7;
	 $y2 = -3;
	 $p = $x2 - $x1;
	 $l = $y2 - $y1;
	 $keliling = 2* ($p + $l);
	 $luas = $p * $l;
	 echo "keliling = ".abs($keliling);
	 echo "<br>";
	 echo "luas = ".abs($luas);
	?>
</body>
</html>