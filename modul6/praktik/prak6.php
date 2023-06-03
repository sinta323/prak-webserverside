<html>

<body>
    <?php
    //fungsi hitung menit yang menampilkan tanggal,bulan,tahun,jam,menit
    function hitungMenit($tanggal, $bulan, $tahun, $jam, $menit )
    {

        date_default_timezone_set('Asia/Jakarta');
        $awal  = time(); //waktu awal
        echo  date("d - F - Y , H:i a", $awal)."<br>";
        $akhir = mktime($jam, $menit, 0 , $bulan, $tanggal, $tahun); //waktu akhir
        echo  date("d - F - Y , H :i a", $akhir)."<br>";
        $diff  = $akhir - $awal;
        $jam   = floor($diff / (60 * 60));//menghitung jam
        $menit = $diff - $jam * (60 * 60);//menghitung menit
        $jumlahhitung = $jam * 60 + floor($menit / 60);//menghitung jumlah

        //megembalikan nilai balik jumlah
        return $jumlahhitung;
    }
        //memanggil fungsi hitung menit 
        echo "Selisih berapa menit adalah " . hitungMenit(31,10,2022,13,00) . " menit";
    ?>
</body>

</html>