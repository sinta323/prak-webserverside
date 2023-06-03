<!DOCTYPE html>

<body>
	<?php
		
	$nilaiBilangan = 90; //input
		if($nilaiBilangan >= 85){
			$nilaiHuruf = "A";
		}elseif ($nilaiBilangan <= 70 && $nilaiBilangan <85){
			$nilaiHuruf = "B";
		}elseif ($nilaiBilangan <= 55 && $nilaiBilangan < 70) {
			$nilaiHuruf = "C";
		}elseif ($nilaiBilangan <= 40 && $nilaiBilangan < 55) {
			$nilaiHuruf = "D";
		}elseif ($nilaiBilangan <40) {
			$nilaiHuruf = "E";
		}
		echo "Nilai huruf = $nilaiHuruf";

	?>
</body>
</html>