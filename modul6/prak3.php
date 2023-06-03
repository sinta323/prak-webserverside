<!DOCTYPE html>
<html>
<body>
<?php
$a = 11;
$b = 20;

function hitungGenap($a, $b){
	$jumlah=0;
	echo "Jumlah Bilangan genap yang berada diantara $a dan $b adalah =";
	while ($a <= $b){
		if($a % 2 ==0){
			echo $a." ";
			$jumlah+=1;
		}
		$a++;
	}
	echo "= $jumlah";
}
$jumlah = hitungGenap($a,$b);
?>
</body>
</html>