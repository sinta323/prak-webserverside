<form action="databarang.php" method="post">
<fieldset><legend>Data Barang</legend> 
Nama Barang <br/>
<input type="text" name="namaBarang"/><br/> 
Jenis <br/>
<select name="Jenis"> 
        <option value="">-Pilihan-</option>
        <option value="C">PC Komputer</option>
        <option value="K">Laptop</option>
        <option value="H">Peripheral</option>
        <option value="A">Smart Phone</option>
        <option value="S">I-Pad</option>
</select> <br/>
Nomor Seri<br/>
<input type="text" name="nomorSeri" maxlength="6"/><br/>
Merk<br/>
<input type="text" name="merk"/><br/> 
Negara Pembuat<br/>
<input type="text" name="negara"/><br/>

Tanggal Pembuatan <br/> 
Tanggal 
<select name="angkaHari">
<?php
for($hari=1;$hari<=31;$hari++){
	$htgl = str_pad($hari,2,"0",STR_PAD_LEFT);
	echo "<option value='$htgl'>$htgl</option>";
}
?>
</select> 
Bulan 
<select name="bulan">
<?php
for($bulan=1;$bulan<=12;$bulan++){
	$bln = str_pad($bulan,2,"0",STR_PAD_LEFT);
	echo "<option value='$bln'>$bln</option>";
}
?>
</select>
Tahun
<select name="tahun">
<?php
$tahunSekarang = date("Y");
$tahunAwal = $tahunSekarang-10;
$tahunAkhir = $tahunSekarang+10;
for($tahun=$tahunAkhir; $tahun>=$tahunAwal; $tahun--){
echo"<option value= '$tahun'>$tahun</option>";
}
?>
</select><br/>
Harga Barang<br/>
Rp. <input type="text" name="harga"/><br/>
Jumlah Stok<br/> 
<input type="text" name="stok"/><br/> 
</fieldset>
<input type="submit" value="SUBMIT" /> 
<input type="submit" value="RESET" /> 
</form> 
<?php
$kode = array();
if(isset($_POST["Jenis"]) and !empty($_POST["Jenis"])){
	$kode[] = $_POST ["Jenis"];
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