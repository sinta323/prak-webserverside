<!DOCTYPE html>
<html lang="en">
<head>
 <title> Belajar PHP </title>
</head>
<body>
	<?php 
	 $a="5"; 
	 $b="2.5"; 
	 $komentar="Selamat Datang"; 
	  //variabel bertipe integer 
	 echo "Nilai variabel a adalah = $a <br>"; //menghasilkan 5
	 //variabel bertipe real/float 
	 echo "Nilai variabel b adalah = $b <br>"; //menghasilkan 2.5
	 //variabel bertipe string 
	 echo "Nilai variabel komentar adalah = $komentar<br>"; 
	
	 $hasil=$a+$b; // dikonfersikan terlebih dahulu menjadi bilangan sebelum ditambahkan
	 echo "Hasil jumlah a dan b adalah = $hasil <br>"; //variabel tipe double 
	 $nama = "Universitas Teknologi Digital Indonesia"; 
	 $garis= "====================================="; 
	 echo "<p>"; 
	 echo $garis."<br>"; //menggabung antara garis dengan kode br
	 echo $komentar. " Di Lab ". $nama. "<br>Belajar dengan giat ya.... <br>"; 
	 echo $garis."<br>"; 
	?>
</body>
</html>