<!DOCTYPE html>
<html>
<body>
<form action="databarang" method="post">
 <fieldset><legend><h2>Data Barang</h2></legend>
 Nama Barang<br>
    <input type="text" name="NamaBarang" maxlength="6"><br>
    Jenis <br>
    <select name="Jenis ">
        <option value="">-Pilihan-</option>
        <option value="C">PC Komputer</option>
        <option value="K">Laptop</option>
        <option value="H">Peripheral</option>
        <option value="A">Smart Phone</option>
        <option value="S">I-Pad</option>
    </select><br>
    Nomor Seri <br>
    <input type="text" name="NomorSeri"><br>
    Merk <br>
    <input type="text" name="Merk"><br>
    Negara Pembuat <br>
    <input type="text" name="NegaraPembuat">

<fieldset>
    <legend>Pembuatan Tanggal </legend>
    Tanggal
    <select name="angkaHari">      
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
    </fieldset>

        Harga Barang<br>
        Rp. <input type="text" name="Harga Barang"><br>
        Jumlah Stok<br>
            <input type="text" name="Jumlah Stok"><br>
            <hr>
            <input type="SUBMIT" value="Submit">
            <input type="RESET" value="Reset">
    
    </fieldset>
        <?php
            $kode = array();
            if(isset($_POST["jenis"]) and !empty($_POST["jenis"])){
                $kode[] = $_POST ["jenis"];
            }
            if(isset($_POST["nomor_seri"]) and !empty($_POST ["nomor_seri"])){
                $kode[] = str_pad($_POST ["nomor_seri"],6,"0",STR_PAD_LEFT);
            }
            if(isset($_POST["merk"]) and !empty($_POST ["merk" ])){
                $kode [] = $_POST ["merk"];
            }
            $banyak_array = count($kode);
            if($banyak_array ==3){
                $setKode = implode("-",$kode);
                echo "Kode Barang: $setKode";
            }
?>

</form>
</body>
</html>