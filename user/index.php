<?php
require("includes/header.php");
require_once("dbconn.php");
?>

<!-- Banner Section -->
<div class="container-fluid pt-5">
    <div class="row align-items-center">
        <!-- Text Section -->
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0 ms-lg-5">
            <h1 class="mb-3">Get Ready</h1>
            <h2 class="mb-3">for the season</h2>
            <h6 class="mb-3">with looks your wardrobe with love.</h6>
            <h4><a href="" class="text-dark">Shop All</a></h4>
        </div>
        <!-- Image Section -->
        <div class="col-lg-8 col-md-6 d-flex justify-content-end">
            <img src="./images/7c89389f853e2cc1d583023362038041.jpg" alt="Seasonal Banner" class="img-fluid">
        </div>
    </div>
</div>


<!-- Product Cards Section -->
<div class="container mt-4">
    <div class="row">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM `tblproduct`");

        while ($row = mysqli_fetch_assoc($select)) {
        ?>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="../admin/<?php echo htmlspecialchars($row['productImage']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['productName']); ?>" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['productName']); ?></h5>
                        <p class="card-text">Rs: <?php echo htmlspecialchars($row['productPrice']); ?></p>
                        <form action="addcart.php" method="POST">
                            <input type="hidden" name="productName" value="<?php echo htmlspecialchars($row['productName']); ?>">
                            <input type="hidden" name="productPrice" value="<?php echo htmlspecialchars($row['productPrice']); ?>">
                            <input type="hidden" name="productImage" value="<?php echo htmlspecialchars($row['productImage']); ?>">
                            <div class="mb-3">
                                <input type="number" name="productQuantity" min="1" max="10" placeholder="Quantity" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-danger w-100" name="addCart" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>
