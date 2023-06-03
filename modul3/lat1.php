<!DOCTYPE html>
<html lang="en">
<head>
 <title>latiha no 1</title>
</head> 
<body> 
	<?php
	const DIS1 = 0.1;
	$Belanja = 100000;
	
	if($Belanja >= 100000){
	$diskon = DIS1;
	}
	$totalDiskon = $diskon * $Belanja;
	$totalBayar = $Belanja - $totalDiskon;
	echo " Jumlah bayar = $totalBayar";
	?>
</body> 
</html>