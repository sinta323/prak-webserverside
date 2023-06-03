<head>
    <title> Latihan 1</title>
    <style>
        table, td, th{
            border : 1px solid blue;
            padding : 10px;
        }
        table{
            width: 50%;
            border-collapse:collapse;
            margin: auto;
        }
        
    </style>
</head>
<body>
<?php
require_once "koneksidemo.php";
$link = koneksiDemo();

// Attempt select query execution
$sql = "SELECT * FROM persons ORDER BY first_name desc";

if($result = mysqli_query($link, $sql)){//mysqli_query ($link,$sql) menghasilkan baris dan kolom
    //$result membuat baris baris tabel
    if(mysqli_num_rows($result) > 0){//num = number, rows = baris, 
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>email</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result)){//mysqli_fetch_array u mengambil baris(sebuah record dari result secara 1 / 1)
            //$row = sebuah variabel array
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);//membuang hasil dari memory(mengosongkan memory server)
        } else{
        echo "No records matching your query were found.";
        }
       } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
       }
       // Close connection
       mysqli_close($link);//u menutup koneksi
       ?>
       