<DOCTYPE html>
<?php
$sisiSamping = 5;
$rad = deg2rad("30");
$cos = cos($rad);
$sisiMiring = $sisiSamping/$cos;
echo "Panjang sisi miring segitiganya adalah $sisiMiring cm";

?>