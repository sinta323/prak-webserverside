<!DOCTYPE html>

<body>
	<?php
	$bil = 0;
	 while($bil <= 20){
		 if ($bil % 3 == 0){
			 echo "$bil <br>";
			 $jumlah += $bil;
		 }
		 $bil++;
	}
	?>
</body>
</html>