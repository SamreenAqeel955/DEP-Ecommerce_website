<?php
session_start();
include("database/dbconn.php");
include("includes/header.php");
?>

<div class="container signin-container w-50 border border-1 border-secondary rounded p-4 mt-5">
    <h2 class="text-center mb-4">Sign In</h2>
    <form action="code.php" method="post" class="form-signin">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter your Username" required>
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3" name="btn_login">Sign In</button>
        <div class="text-center mt-3">
            <a href="#">Forgot password?</a>
        </div>
    </form>
</div>


