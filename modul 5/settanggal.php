!DOCTYPE html>
<html>
<body>
    <?php
        $angka_hari = $_POST["angka_hari"];//$_POST digunakan u mengambil data dari form yang beratribut angka_hari
        $bulan = $_POST["bulan"];//$_POST digunakan u mengambil data dari form yang beratribut bulan
        $tahun = $_POST["tahun"];//$_POST digunakan u mengambil data dari form yang beratribut tahun
        //mktime = u membuat waktu kpn saja (menghasilkan jmlh detik mundur - 1 jan 70 00 - tgl yang diset)
        $time_tanggal = mktime(0,0,0,$bulan,$angka_hari,$tahun);
        $tanggal = date("l, j F Y", $time_tanggal);//date tdk hanya menampilkan waktu skrg tapi juga menghasilkan waktu kpn saja
        echo "Format Tanggal: $tanggal";
    ?>
</body>
</html>