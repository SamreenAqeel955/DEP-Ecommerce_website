<?php
session_start();


if (!isset($_SESSION['addcart'])) {
    $_SESSION['addcart'] = array();
}

if (isset($_POST['addCart'])) {
    $product_name = $_POST['productName'];
    $product_price = $_POST['productPrice'];
    $product_quantity = $_POST['productQuantity'];
    $product_image = $_POST['productImage'];

    // Extract the product names from the cart
    $product_names_in_cart = array_column($_SESSION['addcart'], 'productname');

    if (in_array($product_name, $product_names_in_cart)) {
        echo "<script>
            alert('Product already added');
            window.location.href = 'http://localhost/E-commerce%20website/user/viewcart.php';
        </script>";
    } else {
        $_SESSION['addcart'][] = array(
            'productname' => htmlspecialchars($product_name), // Sanitize output
            'productprice' => htmlspecialchars($product_price),
            'productquantity' => htmlspecialchars($product_quantity),
            'productimage' => htmlspecialchars($product_image)
        );

        // Redirect to the view cart page
        echo "<script>
            window.location.href = 'http://localhost/E-commerce%20website/user/viewcart.php';
        </script>";
    }
}

if (isset($_POST['btn_remove']) && isset($_POST['item_key'])) {
    $item_key = $_POST['item_key'];

    // Check if the item exists in the session array
    if (isset($_SESSION['addcart'][$item_key])) {
        // Remove the specific item
        unset($_SESSION['addcart'][$item_key]);
    }

    // If the cart is empty after removal, you can optionally clear the session variable
    if (empty($_SESSION['addcart'])) {
        unset($_SESSION['addcart']);
    }

    // Redirect back to the cart page or refresh the page
    header("Location: viewcart.php"); // Replace with your actual cart page
    exit;
}


?>

