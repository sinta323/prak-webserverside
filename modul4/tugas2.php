<?php
	$nilaiMhs[]['nama']="Siti";
	$nilaiMhs[count($nilaiMhs)-1]['Tugas']=80;
	$nilaiMhs[count($nilaiMhs)-1]['UTS']=85;
	$nilaiMhs[count($nilaiMhs)-1]['UAS']=87;
	$nilaiMhs[]['nama']="Ani";
	$nilaiMhs[count($nilaiMhs)-1]['Tugas']=75;
	$nilaiMhs[count($nilaiMhs)-1]['UTS']=88;
	$nilaiMhs[count($nilaiMhs)-1]['UAS']=90;
	$nilaiMhs[]['nama']="Amir";
	$nilaiMhs[count($nilaiMhs)-1]['Tugas']=84;
	$nilaiMhs[count($nilaiMhs)-1]['UTS']=78;
	$nilaiMhs[count($nilaiMhs)-1]['UAS']=80;
	$nilaiMhs[]['nama']="Agus";
	$nilaiMhs[count($nilaiMhs)-1]['Tugas']=90;
	$nilaiMhs[count($nilaiMhs)-1]['UTS']=86;
	$nilaiMhs[count($nilaiMhs)-1]['UAS']=92;
	
	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Tugas</td>";
	echo "<td>UTS</td>";
	echo "<td>UAS</td>";
	echo "<td>Total</td>";
	echo "</tr>";
	$total = 0;
	for($x=0; $x < count($nilaiMhs);$x++){
		$total = $nilaiMhs[$x]['Tugas'] * 0.3 + $nilaiMhs[$x]['UTS']*0.3 + $nilaiMhs[$x]['UAS'] * 0.4;
		echo "<tr>";
		echo "<td>".$nilaiMhs[$x]['nama']."</td>";
		echo "<td>".$nilaiMhs[$x]['Tugas']."</td>";
		echo "<td>".$nilaiMhs[$x]['UTS']."</td>";
		echo "<td>".$nilaiMhs[$x]['UAS']."</td>";
		echo "<td>".$total."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
