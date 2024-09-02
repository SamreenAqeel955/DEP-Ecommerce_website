<?php
// Start the session at the very beginning
session_start();

// Include database connection (assuming it's correctly configured)
include("dbconn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome -->
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="#">E-commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="./index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-shopping-cart"></i> Cart (<?php echo isset($_SESSION['addcart']) ? count($_SESSION['addcart']) : 0; ?>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-user"></i> Welcome, user</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../admin/signin.php"><i class="fas fa-user"></i> Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <?php
            $total = 0;
            // Check if the cart exists and is not empty
            if (isset($_SESSION['addcart']) && !empty($_SESSION['addcart'])) {
                foreach ($_SESSION['addcart'] as $key => $value) {
                $item_total = $value['productquantity'] . $value['productprice'];
                    $total += $item_total;
                    echo '
                    <div class="d-flex align-items-center border p-3 rounded shadow-sm bg-white mb-4">
                       <img src="../admin/' . htmlspecialchars($value['productimage'], ENT_QUOTES, 'UTF-8') . '" alt="Product Image" class="img-fluid me-3" style="width: 100px; height: auto;">

                        <div class="flex-grow-1">
                            <div><strong>' . htmlspecialchars($value['productname']) . '</strong></div>
                            <div>Quantity: ' . htmlspecialchars($value['productquantity']) . '</div>
                        </div>
                        <div class="text-end">
                            <div><strong>Rs: ' . htmlspecialchars($value['productprice']) . '</strong></div>

                              <form method="POST" action="addcart.php" class="mt-2">
                                <input type="hidden" name="item_key" value="' . htmlspecialchars($key) . '">
                                <input type="submit" name="btn_remove" value="Remove" class="btn btn-danger btn-sm">
                            </form>
            
                        </div>
                    </div>';
                }
            } else {
                echo '<p>No items in cart.</p>';
            }
            ?>
        </div>

        <!-- Summary Section -->
        <div class="col-12 col-md-6">
            <div class="border p-3 rounded shadow-sm bg-white">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-end">Rs: <?php echo number_format($total, 2); ?></td>
                        </tr>
                        <tr>
                            <td>Delivery</td>
                            <td class="text-end text-success fw-bold">Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td class="text-end"><strong>Rs: <?php echo number_format($total, 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include Footer -->
<?php include("includes/footer.php"); ?>
</body>
</html>
