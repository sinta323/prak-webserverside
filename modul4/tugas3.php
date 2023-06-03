<?php
	$pesertaKursus[]['nama']="Siti";
	$pesertaKursus[count($pesertaKursus)-1]['kursus']= "HTML";
	$pesertaKursus[count($pesertaKursus)-1]['Bayar']=300000;
	$pesertaKursus[]['nama']="Ani";
	$pesertaKursus[count($pesertaKursus)-1]['kursus']= "PHP";
	$pesertaKursus[count($pesertaKursus)-1]['Bayar']=400000;
	$pesertaKursus[]['nama']="Amir";
	$pesertaKursus[count($pesertaKursus)-1]['kursus']= "MySQL";
	$pesertaKursus[count($pesertaKursus)-1]['Bayar']=350000;
	$pesertaKursus[]['nama']="Agus";
	$pesertaKursus[count($pesertaKursus)-1]['kursus']="PHP";
	$pesertaKursus[count($pesertaKursus)-1]['Bayar']=400000;
	$pesertaKursus[]['nama']="Minah";
	$pesertaKursus[count($pesertaKursus)-1]['kursus']="HTML";
	$pesertaKursus[count($pesertaKursus)-1]['Bayar']=300000;
	
	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Kursus</td>";
	echo "<td>Bayar</td>";
	echo "</tr>";
	
	for($x=0; $x < count($pesertaKursus);$x++){
		//if($pesertaKursus)
		echo "<tr>";
		echo "<td>".$pesertaKursus[$x]['nama']."</td>";
		echo "<td>".$pesertaKursus[$x]['kursus']."</td>";
		echo "<td>".$pesertaKursus[$x]['bayar']."</td>";
		
		echo "</tr>";
	}
	echo "</table>";
?>
