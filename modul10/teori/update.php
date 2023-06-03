<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$kode = $name = $harga =$stok = "";
$kode_err = $name_err= $harga_err = $stok_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
   // Validate address
   $input_kode = trim($_POST["kode"]);
   if(empty($input_kode)){
       $kode_err = "Please enter an kode.";     
   } else{
       $kode = $input_kode;
   }

     // Validate name
     $input_name = trim($_POST["name"]);//mengambilm input dari yang diisikan
     if(empty($input_name)){//apakah name kosong
         $name_err = "Please enter a name.";//jika name kosong 
         //jika tidak kosong akan dicek dengan filter_var
     }elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $name_err = "Please enter a valid name.";
     } else{
         $name = $input_name;//jika validasi benar
     }
    
    

   // Validate salary
   $input_harga = trim($_POST["harga"]);
   if(empty($input_harga)){
       $harga_err = "Please enter the harga amount.";     
   } elseif(!ctype_digit($input_harga)){
       $harga_err = "Please enter a positive integer value.";
   } else{
       $harga= $input_harga;
   }
    
  // Validate salary
    $input_stok = trim($_POST["stok"]);
    if(empty($input_stok)){
        $stok_err = "Please enter the stok amount.";     
    } elseif(!ctype_digit($input_stok)){
        $stok_err = "Please enter a positive integer value.";
    } else{
        $stok = $input_stok;
    }
    
    // Check input errors before inserting in database
    if(empty($kode_err) && empty($name_err) && empty($harga_err) && empty($stok_err)){
        // Prepare an update statement
        $sql = "UPDATE barang1 SET kode=?, name=?, harga=?, stok=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isii",$param_kode, $param_name, $param_harga, $param_stok);
            
            // Set parameters
            $param_kode = $kode;
            $param_name = $name;
            $param_harga = $harga;
            $param_stok = $stok;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){//jika berhasil memasukkan record baru maka program baris ke 58 akan dijalankan
                // Records created successfully. Redirect to landing page
                header("location: index.php");//akan terarahkan ke index
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM barang1 WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $kode = $row["kode"];
                    $name = $row["name"];
                    $harga = $row["harga"];
                    $stok = $row["stok"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the barang1 record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control <?php echo (!empty($kode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kode; ?>">
                            <span class="invalid-feedback"><?php echo $kode_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <textarea name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"><?php echo $name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control <?php echo (!empty($harga_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $harga; ?>">
                            <span class="invalid-feedback"><?php echo $harga_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <textarea name="stok" class="form-control <?php echo (!empty($stok_err)) ? 'is-invalid' : ''; ?>"><?php echo $stok; ?></textarea>
                            <span class="invalid-feedback"><?php echo $stok_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>