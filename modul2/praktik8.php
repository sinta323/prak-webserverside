<!DOCTYPE html>

<body>
	<?php
		$bil = 0;
		while($bil <= 50){
			$bil++;
			if($bil % 4 == 0){
				if($bil % 3 == 0){
					continue;
				}
				echo "$bil <br>";
			}	
		}		
	?>
</body>
</html>