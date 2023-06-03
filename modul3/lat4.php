<!DOCTYPE html>
<head>
 <title>BILANGAN GANJIL</title>
</head> 
<body>
	<?php
	$bil = 0;
	do {
		$bil++;
		if ($bil % 2 == 1 )
		echo "$bil <br>";
	}
	while($bil < 20);
	?>
</body>
</html>