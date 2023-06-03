<!DOCTYPE html>

<body>
	<?php
	const DIS1 = 0.05;
	const DIS2 = 0.08;
	const DIS3 = 0.1;
	//define('GAJI' , 50000);
		
		$totalBelanja = 300000;
		if($totalBelanja >= 100000 && $totalBelanja < 200000){
			$diskon = DIS1;
		}elseif ($totalBelanja >= 200000 && $totalBelanja < 400000){
			$diskon = DIS2;
		}elseif ($totalBelanja >= 400000) {
			$diskon = DIS3;
		}
		$totalDiskon = $diskon * $totalBelanja;
		$totalBayar = $totalBelanja - $totalDiskon;
		echo "Total bayar = $totalBayar";
	
	?>
</body>
</html>