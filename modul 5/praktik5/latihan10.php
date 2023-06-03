<?php
// Executed at September 06, 2022
$futureDate = mktime(0, 0, 0, date("m"), date("d")+30, date("Y"));
echo date("l - d/m/Y", $futureDate);
?>