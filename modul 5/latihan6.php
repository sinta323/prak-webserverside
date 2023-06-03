<!DOCTYPE html>
<html>
<body>
<form action="#" method="post">
 <fieldset><legend>Kode Barang</legend>
    Kode Depan (Jenis) <br>
    <select name="jenis">//
        <option value="">-Pilih-</option>
        <option value="C">Celana</option>
        <option value="K">Kaos</option>
        <option value="H">Hem</option>
    </select><br>
    Kode Tengah (Nomor Seri) <br>
    <input type="text" name="nomor_seri" maxlength="6"><br>
    Kode Belakang (Merek) <br>
    <input type="text" name="merek">
</fieldset>
 <input type="submit" value="Buat Kode">
 
 <?php
    $kode = array();
    //suatu fungsi apakah diset(ada variabel itu tidak) apakah ada variabel jenis.
    if(isset($_POST["jenis"]) and !empty($_POST["jenis"])){//jika $_POST kosong akan menghasilkan false program berikutnya tidak dijalankan
        $kode[] = $_POST["jenis"];
    }
    if(isset($_POST["nomor_seri"]) and !empty($_POST["nomor_seri"])){
        $kode[] = str_pad($_POST["nomor_seri"], 6, "0", STR_PAD_LEFT);
    }
    if(isset($_POST["merek"]) and !empty($_POST["merek"])){
        $kode[] = $_POST["merek"];
    }

    $jumlah_array = count($kode);//
        if($jumlah_array == 3){
            $set_kode = implode("-", $kode);
            //implode = menggabung isi dari array dengan suatu karakter -
            echo "Kode Barang: $set_kode";
    }
?>

</form>
</body>
</html>