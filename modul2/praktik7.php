<html>
    <body>
        <?php
        $bilangan = 5;//deklarasi bilangan bernilai 5
        $jumlah = 0;//deklarasi jumlah bernilai 0
        $x = 1;//deklarasi $x bernilai 1
		
		//menggunakan pengulangan do while 
		//untuk menghitung jumlah deret
        do {
            $jumlah= $jumlah+$x;
            $x++;
        }while($x <= $bilangan);
		//menggunakan perintah echo untuk menampilkan hasil jumlah
        echo "Hasil dari jumlah bilangan = $jumlah<br>";
        ?>
    </body>
</html>