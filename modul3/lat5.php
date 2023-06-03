<!DOCTYPE html>

<body>
	<?php
	$bil = 0;
	 while($bil < 30){
		 $bil++;
	 if ($bil % 2 == 0 ){
		 if ($bil >= 10 && $bil <= 20)  {
			 continue;	
		}
		echo "$bil <br>";
	}
	}
	?>
</body>
</html>