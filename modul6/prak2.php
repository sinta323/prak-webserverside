<!DOCTYPE html>
<html>
<body>
<?php
$warna = 1;
function tampilkanHariIni($warna){
	$array_warna = [1 => "merah", 2 => "hijau", 3 => "kuning", 4 => "biru"];
	$hariIni =hari_ini();
	if(key_exists ($warna, $array_warna)){
	$hasil = $array_warna[$warna];
		if($hasil == "merah"){
			echo "<h2 style='color:red'>$hariIni</h2>";
		}else if ($hasil == "hijau"){
			echo "<h2 style='color:green'>$hariIni</h2>";
		}else if ($hasil == "kuning"){
			echo "<h2 style='color:yellow'>$hariIni</h2>";
		}else if($hasil == "biru"){
			echo "<h2 style='color:blue'>$hariIni</h2>";
		}
	}else{
		echo "ch2 style='color:black;>$hariIni</h2>";
	}
}
function hari_ini(){
	$hari = date ("D");
	switch ($hari){
		case 'Sun';
			$hari_ini = "Minggu";
		break;
		case 'Mon';
			$hari_ini = "Senin";
		break;
		case 'Tue';
			$hari_ini = "Selasa";
		break;
		case 'Wed';
			$hari_ini = "Rabu";
		break;
		case 'Thu';
			$hari_ini = "Kamis";
		break;
		case 'Fri';
			$hari_ini = "Jumat";
		break;
		case 'Sat';
			$hari_ini = "Sabtu";
		break;
		default:
			$hari_ini = "Tidak Dikenali";
		break;
	}
	return $hari_ini;
}
tampilkanHariIni($warna);
?>