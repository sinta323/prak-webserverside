<!DOCTYPE html>
<html>
<body>
    <?php
        $str = "nama saya Susi Susanti";//dikerjakan oleh fungsi str flowor u n tuk menghasilkan huruf jecil
        $str2=strtolower($str); 
        echo $str2.'<br>';

        $str2=strtoupper($str); //menghasilkan huruf besar semua
        echo $str2.'<br>'; 

        $str2=ucfirst($str); //karakter pertama dari string adalah huruf kapital 
        echo $str2.'<br>'; 

        $str2=ucwords($str);// setiap kata diuperword
        echo $str2.'<br>'; 

        $str2=strrev($str); //membalik string, setiap karakter dibalik dari belakang
        echo $str2.'<br>'; 

        $panjang=strlen($str); //menghitung jumlah kata
        echo 'Panjang string: '.$panjang.'<br>'; 

        $str2 = substr($str, -7); //menghasilkan bagian dari string , dimulai 
        echo $str2.'<br>'; 
    ?>
</body>
</html>