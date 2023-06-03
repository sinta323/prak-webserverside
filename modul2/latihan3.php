<!DOCTYPE html>
<html lang="en">
<head>
 <title> Belajar PHP </title>
</head>
<body>
	<?php 
	 $a = 20; 
	 $b = 5; 
	 $c = $a * $b; 
	 $d = $c / $b; 
	 $e = $d-$b;
	 echo "$c \t $d \t $e";
	 echo "<br />";
	 // Contoh penggunaan . 
		 $a = "Yogyakarta "; 
		 $a = $a."Kotaku"; //menggabung string hasil di $a
		 echo "$a <br />"; 
	 // Contoh penggunaan .= 
		 $b = "Universitas Teknologi Digital Indonesia "; 
		 $b .= "Kampusku"; 
		 echo "$b";
	?>
</body>
</html>