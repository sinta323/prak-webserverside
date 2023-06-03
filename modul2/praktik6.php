<!DOCTYPE html>

<body>
	<?php
	//definisi konstanta dengan menggunakan kata bunga_kredit
	const BUNGA_KREDIT = 0.1;
	
	$hargaKendaraan = 45000000;//inputan
	$uangMuka = 2500000;//inputan
	$tenor = 36;//inputan
	
	//untuk menghitung kekurangan biaya
	$kekurangan = $hargaKendaraan - $uangMuka;
	
	//menggunakan pengulangan if elseif untuk menghitung biaya 
	if($tenor < 12){
		echo "$biayaAwal<br>";
	}elseif($tenor >= 12){
			$bunga = $kekurangan * BUNGA_KREDIT;
	}
	//untuk menghitung nilai kredit
	$kredit = $kekurangan + $bunga;
	//untuk menghitung nilai angsuran
	$angsuran = $kredit / $tenor;
	//menggunakan perintah echo untuk menampilkan nilai angsuran bulanan 
	echo "Nilai Angsuran Bulanan adalah  = $angsuran";
	
	?>
</body>
</html>