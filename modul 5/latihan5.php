<!DOCTYPE html>
<html>
<body>
    <form action="settanggal.php" method="post">
    Tanggal
    <select name="angka_hari">      
    <?php
        for($hari=1; $hari <= 31; $hari++){//mengasilkan tanggal 01 - 31
        $htgl = str_pad($hari, 2, "0", STR_PAD_LEFT);//untuk membuat box tanggal 
        echo "<option value='$htgl'>$htgl</option>";//menampilkan tanggal
        //str_pad = suatu fungsi yang digunakan u/ menambah dikiri karakter 0 pad $hari jml karakter total max 2, misal 1 mjd 01
        }
        ?>
        </select>

        Bulan
        <select name="bulan">
        <?php
        for($bulan=1; $bulan <= 12; $bulan++){//menghasilkan bulan 01 - 12
        $bln = str_pad($bulan, 2, "0", STR_PAD_LEFT);
        echo "<option value='$bln'>$bln</option>";
        }
        ?>

        </select>
        Tahun
        <select name="tahun">//
        <?php
        $tahun_sekarang = date("Y");//menghasilkan tahun sekarang
        $tahun_awal = $tahun_sekarang-10;//tahun awal dikurangi 10(minimal)
        $tahun_akhir = $tahun_sekarang+10;//tahun awal ditambah 10(maximal)
        //membuat tahun dari 20 tahun lebih kecil
        for($tahun=$tahun_akhir; $tahun >= $tahun_awal; $tahun--){
        echo "<option value='$tahun'>$tahun</option>";
        }
    ?>
        </select>
        <input type="submit" value="Set Tanggal">
    </form>
</body>
</html>
