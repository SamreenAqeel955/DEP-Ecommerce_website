<?php
include("includes/header.php");
include("dbconn.php");


$select = mysqli_query($conn, "SELECT * FROM `tblproduct`");
?>

            

<div class="container mt-4">
    <div class="row">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM `tblproduct`");

        while ($row = mysqli_fetch_assoc($select)) {
          $category = $row['productCategory'];
          if($category == 'Shoes'){
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
      }
        ?>
    </div>
</div>
<?php
include("includes/footer.php");
?>