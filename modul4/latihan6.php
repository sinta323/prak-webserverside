<!DOCTYPE html>
<html>
<body>
<?php
	// Menciptakan array multidimensional
	// associative array
	$nilai = array(
 
		 // Susi bertidak sebagai key
		 "Susi" => array(
		 "ALGO" => 95,
		 "MTK" => 85,
		 "INDO" => 74,
		 ),
 
		 // Budi bertindak sebagai key
		 "Budi" => array(
		 "ALGO" => 78,
		 "MTK" => 98,
		 "INDO" => 46,
		 ),
		 
		 // Agus bertindak sebagai key
		 "Agus" => array(
		 "ALGO" => 88,
		 "MTK" => 46,
		 "INDO" => 99,
		 ),
	);
// Mengakses elemen array
 
// Ini akan menampilkan nilai Susi untuk Algo
echo "Nilai Susi untuk Algo: ".$nilai['Susi']['ALGO'] . "\n<br>";
 
// Mengakses elemen array menggunakan loop foreach
foreach($nilai as $kunci=>$nilai1) {
	 echo $kunci."<br>";
	 echo $nilai1['ALGO']. " ".$nilai1['MTK']." ".$nilai1['INDO']."\n<br>";
	 $totalnilai += $nilai1['ALGO'];
	 $ratarata = $totalnilai / 3;
}
 echo "ratatara nilai ALGO adalah $ratarata";
 
?>
</body>
</html>