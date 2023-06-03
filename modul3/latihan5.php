<!DOCTYPE html>
<html lang="en">
<head>
 <title>Pengulangan for</title>
</head> 
<body> 
	<?php
	for($i=0; $i<10; $i+=2){
		echo "data ke - $i<br>";
		if($i==5)
			continue;
		echo "data ke - $i<br>";
	}
	?>
</body> 
</html>