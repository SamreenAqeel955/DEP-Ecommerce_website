<?php
session_start(); 
include("database/dbconn.php");


if (isset($_POST['btn_login'])) {
    $adminUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $adminPass = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM `admin` WHERE username = '$adminUsername' AND adminpassword = '$adminPass'";
    $result = mysqli_query($conn, $login_query);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $adminUsername;
        echo "<script>alert('Login successfully');</script>";
        ?>
        <meta http-equiv="refresh" content="0.5; url=http://localhost/E-commerce%20website/admin/mystore.php">
        <?php
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
    exit();
}

// Product upload part
if (isset($_POST['btn_upload'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['product_name']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['product_price']);
    $productCategory = mysqli_real_escape_string($conn, $_POST['product_category']);

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
        $imageLoc = $_FILES['product_image']['tmp_name'];
        $imageName = $_FILES['product_image']['name'];
        $imageDestination = "productImage/" . $imageName;
        
  
        if (move_uploaded_file($imageLoc, $imageDestination)) {
            // Insert product details into the database
            $sql_query = "INSERT INTO `tblproduct` (`productName`, `productPrice`, `productImage`, `productCategory`) VALUES ('$productName', '$productPrice', '$imageDestination', '$productCategory')";
            $sql_conn = mysqli_query($conn, $sql_query);

            if (!$sql_conn) {
                echo "Error: " . mysqli_error($conn);
            } else {
                echo "<script>alert('Successfully uploaded');</script>";
                ?>
                <meta http-equiv="refresh" content="0.5; url=http://localhost/E-commerce%20website/admin/products.php">

                <?php
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "No image uploaded or there was an upload error.";
    }
}
?>
