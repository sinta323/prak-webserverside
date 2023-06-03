<!DOCTYPE html>
<html>
<body>
<?php
    
    function celcius2kelvin($celcius) {
        return 273 + $celcius;
    }
    function celcius2fahrenheit($celcius) {
        return 32 + (1.8 * $celcius);
    }

    $celcius = $_POST['celcius'];
    $kelvin = celcius2kelvin($celcius);
    $fahrenheit = celcius2fahrenheit($celcius);
    echo "<h2> Hasil Konversi Suhu Celcius ke </h2>";
    echo "<h2> Kelvin dan Fahrenheit </h2>";
    echo "<pre>Derajat celcius    : $celcius </pre>";
    echo "<pre>Derajat kelvin     : $kelvin </pre>";
    echo "<pre>Derajat fahrenheit : $fahrenheit</pre>";
    ?>
    </body>
    </html>