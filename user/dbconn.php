<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerce");

if (!$conn) {
    echo "Something went wrong: " . mysqli_connect_error();
}
//  else {
//     echo "Connection successful!";
// }
?>