<h2>INPUT BUKU</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
method="post">
 <div>
 <label for="nama">Kode:</label><br>
 <input type="text" name="kode" id="kode" 
 value="<?php echo isset($inputs['kode'])?$inputs['kode']: '' ?>"><br>
 <small><?php echo isset($errors['kode'])?$errors['kode']: '' ?></small>
 </div>
 
 <div>
 <label for="nama">Judul Buku:</label><br>
 <input type="text" name="judul" id="judul"
 value="<?php echo isset($inputs['judul'])?$inputs['judul']: '' ?>"><br>
 <small><?php echo isset($errors['judul'])?$errors['judul']: '' ?></small>
 </div>
 
 <div>
 <label for="nama">Pengarang:</label><br>
 <input type="text" name="pengarang" id="pengarang"
 value="<?php echo isset($inputs['pengarang'])?$inputs['pengarang']: '' ?>"><br>
 <small><?php echo isset($errors['pengarang'])?$errors['pengarang']: '' ?></small>
 </div>

 <div>
 <label for="nama">Penerbit:</label><br>
 <input type="text" name="penerbit" id="penerbit"
 value="<?php echo isset($inputs['penerbit'])?$inputs['penerbit']: '' ?>"><br>
 <small><?php echo isset($errors['penerbit'])?$errors['penerbit']: '' ?></small>
 </div>
 
 <div>
 <label for="nama">Jumlah stok:</label><br>
 <input type="text" name="stok" id="stok"
 value="<?php echo isset($inputs['stok'])?$inputs['stok']: '' ?>"><br>
 <small><?php echo isset($errors['stok'])?$errors['stok']: '' ?></small>
 </div>
 <div>
 <input type="submit" name="proses" value="Simpan">
 <input type="reset" name="reset" value="Reset">
 </div>
 </form>
