<?php
session_start();
include("database/dbconn.php");
include("includes/header.php");
?>

<div class="container mt-5">
    <h2 class="mb-4">Product Form</h2>
    <div class="border border-1 border-secondary rounded p-4"> <!-- Add border and padding to the form container -->
        <form action="code.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product-name" class="form-label">Product Name:</label>
                <input type="text" class="form-control"  name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="product-price" class="form-label">Product Price:</label>
                <input type="number" class="form-control"  name="product_price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="product-image" class="form-label">Product Image:</label>
                <input type="file" class="form-control"  name="product_image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="product-category" class="form-label">Product Category:</label>
                <select class="form-select"  name="product_category" required>
                    <option value="" disabled selected>Select a category</option>
       
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Kidz_Baby">Kidz & Baby</option>
                    <option value="Jewellery">Jewellery</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Handbags">Handbags</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_upload">Upload Product</button>
        </form>
    </div>
</div>

<!-- fetch data -->
<div class="container mt-5">
    <h2>Sample DataTable</h2>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Product Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
     
            $select_query = "SELECT * FROM `tblproduct`";
            $select_conn = mysqli_query($conn, $select_query);

            if ($select_conn) {
        
                $sno = 1;
                while ($row = mysqli_fetch_assoc($select_conn)) {
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo htmlspecialchars($row['productName']); ?></td>
                        <td><?php echo htmlspecialchars($row['productPrice']); ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($row['productImage']); ?>" height="100px" width="100px" alt="Product Image"></td>
                        <td><?php echo htmlspecialchars($row['productCategory']); ?></td>
                    </tr>
                    <?php
               
                    $sno++;
                }
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
            ?>
        </tbody>
    </table>
</div>


    <!--  -->

<?php
include("includes/footer.php");
?>
