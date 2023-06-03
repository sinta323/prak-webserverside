<!DOCTYPE html>
<html lang="en">

<body>
	<?php
	const GAJI_BIASA = 10000;
	const GAJI_LEMBUR = 15000;
		$jamKerja = 8; //input
		if($jamKerja > 6){
			$lembur = $jamKerja - 6;
			$jamBiasa = 6;	
		}else {
			$lembur = 0;
			$jamBiasa = $jamKerja;
		}
		$upahTotal = $jamBiasa * GAJI_BIASA + $lembur * GAJI_LEMBUR;
		echo "Upah Total = $upahTotal";
	?>
</body>
</html>