<?php
	$nilaiMhs[]['nama']="Siti";
	$nilaiMhs[count($nilaiMhs)-1]['Nilai']=80;
	$nilaiMhs[]['nama']="Ani";
	$nilaiMhs[count($nilaiMhs)-1]['Nilai']=75;
	$nilaiMhs[]['nama']="Amir";
	$nilaiMhs[count($nilaiMhs)-1]['Nilai']=85;
	$nilaiMhs[]['nama']="Agus";
	$nilaiMhs[count($nilaiMhs)-1]['Nilai']=90;
	$nilaiMhs[]['nama']="Minah";
	$nilaiMhs[count($nilaiMhs)-1]['Nilai']=85;
	
	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Nilai</td>";
	echo "</tr>";
	$rataRata = 0;
	for($x=0; $x < count($nilaiMhs);$x++){
		$rataRata += $nilaiMhs[$x]['Nilai'];
		echo "<tr>";
		echo "<td>".$nilaiMhs[$x]['nama']."</td>";
		echo "<td>".$nilaiMhs[$x]['Nilai']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	$rataRata = $rataRata / count($nilaiMhs);
	echo "nilai rata-rata : ".$rataRata;
?>