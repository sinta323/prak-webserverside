<!DOCTYPE html>

<body>
	<?php
	const DIS1 = 0.1;
	const DIS2 = 0.15;
	//define('GAJI' , 50000);
		
		$totalBelanja = 300000;
		if($totalBelanja >= 100000 && $totalBelanja < 200000){
			$diskon = DIS1;
		}elseif ($totalBelanja >= 200000 && $totalBelanja < 400000){
			$diskon = DIS2;
		}
		$totalDiskon = $diskon * $totalBelanja;
		$totalBayar = $totalBelanja - $totalDiskon;
		echo "Total bayar = $totalDiskon";
	
	?>
</body>
</html>