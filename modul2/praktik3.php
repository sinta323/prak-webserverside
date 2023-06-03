<!DOCTYPE html>

<body>
	<?php
	const DIS = 0.05;
	const DIS = 0.08;
	const DIS = 0.1;
	//define('GAJI' , 50000);
		
	$totalBelanja = 300000; //input
	//$diskon = 0.08; //input
	//$gajiGol = GOL1;
	
	switch($totalBelanja){
		case 1;
			$diskon = DIS1;
			break;
		case 2;
			$diskon = DIS2;
			break;
		case 3;
			//$gajiGol = GOL1;
			break;	
	}
	$totalBayar = DIS * $totalBelanja;
	echo "Total bayar = $totalBayar";
	
	?>
</body>
</html>