<!DOCTYPE html>
<head>
 <title>Latihan no 8</title>
</head> 
<body>
	<?php
	$bil = 0;
	$batasan = 50;
	$kelipatan = 5;
	$total = 0;
	do {
		if ($bil > 0 ){
		echo "$bil <br>";
		$total+= 1;
	}
	$bil += $kelipatan;
	}while($bil < $batasan);
	echo "<br>  Bil cacah = $total"
	?>
</body>
</html>