
<DOCTYPE html>
<?php
	$peserta[]['nama']="Siti";
	$peserta[count($peserta)-1]['kursus']= "HTML";
	$peserta[count($peserta)-1]['bayar']=300000;
	$peserta[]['nama']="Ani";
	$peserta[count($peserta)-1]['kursus']= "PHP";
	$peserta[count($peserta)-1]['bayar']=400000;
	$peserta[]['nama']="Amir";
	$peserta[count($peserta)-1]['kursus']= "MySQL";
	$peserta[count($peserta)-1]['bayar']=350000;
	$peserta[]['nama']="Agus";
	$peserta[count($peserta)-1]['kursus']="PHP";
	$peserta[count($peserta)-1]['bayar']=400000;
	$peserta[]['nama']="Minah";
	$peserta[count($peserta)-1]['kursus']="HTML";
	$peserta[count($peserta)-1]['bayar']=300000;
	 
	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Kursus</td>";
	echo "<td>Bayar</td>";
	echo "</tr>";

	for($x=0; $x < count($peserta);$x++){
		//if($pesertaKursus)
		echo "<tr>";
		echo "<td>".$peserta[$x]['nama']."</td>";
		echo "<td>".$peserta[$x]['kursus']."</td>";
		echo "<td>".$peserta[$x]['bayar']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	//echo "<pre>"; print_r($peserta); echo "<pre>";
	echo "</br>";

	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Kursus</td>";
	echo "<td>Bayar</td>";
	//echo "<td>Total</td>";
	echo "</tr>";
	$total = 0;
	for($x=0; $x < count($peserta);$x++){
		if($peserta[$x]['kursus']== "HTML"){
			$total += $peserta[$x]['bayar'];
			echo "<tr>";
			echo "<td>".$peserta[$x]['nama']."</td>";
			echo "<td>".$peserta[$x]['kursus']."</td>";
			echo "<td>".$peserta[$x]['bayar']."</td>";
			//echo "<td>".$total."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "Total : $total";
	echo "<br>";
	echo "</br>";

	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Kursus</td>";
	echo "<td>Bayar</td>";
	echo "</tr>";

	$total = 0;
	for($x=0; $x < count($peserta);$x++){
		if($peserta[$x]['kursus']== "PHP"){
			$total += $peserta[$x]['bayar'];
			echo "<tr>";
			echo "<td>".$peserta[$x]['nama']."</td>";
			echo "<td>".$peserta[$x]['kursus']."</td>";
			echo "<td>".$peserta[$x]['bayar']."</td>";
			echo "</tr>";
		}
	}

	echo "</table>";
	echo "Total : $total";
	echo "<br>";

	echo "</br>";

	echo "<table border=1 width='50%'>";
	echo "<tr>";
	echo "<td>Nama</td>";
	echo "<td>Kursus</td>";
	echo "<td>Bayar</td>";
	echo "</tr>";

	$total = 0;
	
	for($x=0; $x < count($peserta);$x++){
		if($peserta[$x]['kursus']== "MySQL"){
			$total += $peserta[$x]['bayar'];
			echo "<tr>";
			echo "<td>".$peserta[$x]['nama']."</td>";
			echo "<td>".$peserta[$x]['kursus']."</td>";
			echo "<td>".$peserta[$x]['bayar']."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "Total : $total";
	echo "<br>";

?>
</html>