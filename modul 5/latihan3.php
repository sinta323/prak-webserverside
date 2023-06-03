<!DOCTYPE html>
<html>
<body>
    <?php
        $nominal = 2500000.45678;
     echo number_format($nominal)."<br>";//maka dengan kode akan memformat bilangan itu tnp angka diblnkg koma tdk ada bil di blnkng koma
        echo number_format($nominal,2)."<br>";//akan memformat 2 bil di blkng titik
        echo number_format($nominal, 2, ",", ".");//setelah 2 maka string , (sebagai tanda pecahan (pemisah)) dan string . membuat argumen baru 
    ?>
</body>
</html>