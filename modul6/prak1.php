<!DOCTYPE html>
<html>
<body>
<?php
$str = "saya suka kamu karena kamu baik sih";
$huruf = "a";
function pemanggilan($string,$huruf){
	$cacaha = cacahHuruf($string, $huruf);
	$prosena = prosenaHuruf($string, $huruf);
}
function cacahHuruf($str,$huruf){
	foreach(count_chars($str,1) as $x => $jumlah){
		if($huruf == chr($x)){
			echo " Huruf \"", chr($x), "\" muncul = $jumlah kali.<br>";
		}
	}
}
function prosenaHuruf($str,$huruf){
	foreach(count_chars($str,1) as $x => $jumlah){
		if($huruf == chr($x )){
			$total_char = strlen($str);
			$hasil = ($jumlah/$total_char)*100;
			echo "Prosentase $huruf = ".substr($hasil, 0, 5)."%";
		}
	}
}
pemanggilan($str,$huruf);
?>
</body>
</html>