<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INPUT DATA</title>
</head>

<body>
    <form action="tambahdata.php" method="post">
        <p>
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim">
        </p>
        <p>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama">
        </p>
        <p>
        <label for="jeniskelamin">Jenis Kelamin:</label>
            <input type="radio" name="jeniskelamin" value="laki-laki">Laki-Laki
            <input type="radio" name="jeniskelamin" value="perempuan">Perempuan<br>
        </p>
        <p>
            <label for="prodi">Prodi :<br></label>
            <input type="radio" name="prodi" value="TK">TK<br>
            <input type="radio" name="prodi" value="SI">SI<br>
            <input type="radio" name="prodi" value="IK">IK<br>
        </p>
        <input type="submit" value="Submit">
    </form>
</body>

</html>