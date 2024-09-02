<?php
session_start();
include("includes/header.php");

if(!$_SESSION['admin']){
  header("location: signin.php");
}
?>
  <div class="container text-center">
    <h1>Dashboard</h1>
  </div>
  <div class="container mt-3 bg-success fw-bold">
    <div class="row justify-content-center">
      <div class="col-4 text-center">
        <h2><a href="products.php" class="text-decoration-none text-white">Add Products</a></h2>
      </div>
      <div class="col-4 text-center">
        <h2><a href="#" class="text-decoration-none text-white">Users</a></h2>
      </div>
    </div>
  </div>
  



<?php
include("includes/footer.php");

?>