<!DOCTYPE html>
<html lang="en">
<head>
 <title>Nilai</title>
</head>
	<?php
		$nilai = 85;
		if($nilai >= 85){
			echo "Nilai: A";	
		}elseif($nilai >= 70){
			echo "Nilai : B";
		}elseif($nilai >= 55){
			echo "Nilai : C";
		}elseif($nilai >= 40){
			echo "Nilai : D";	
		}else{
		echo "Nilai : E";
		}
	?> 
</body> 
</html>