<!DOCTYPE html>
<html lang="en">

<body>
	<?php
	const PARKIR_PERTAMA = 2000;
	const PARKIR_SELANJUTNYA = 500;
		$jamMasuk = 5; //input
		if($jamMasuk > 2){
			$tambahan = $jamMasuk - 2;
			$jamBiasa = 2;	
		}else {
			$tambahan = 0;
			$jamBiasa = $jamMasuk;
		};
		$biayaParkir = $jamBiasa * PARKIR_PERTAMA + $tambahan * PARKIR_SELANJUTNYA;
		echo "Biaya total = $biayaParkir<br>";
	?>
</body>
</html>