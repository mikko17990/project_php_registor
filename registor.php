<?php
    session_start();
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Registor</h2>
    </div>
    <form action="registor_db.php" method="post">
        <?php include('errors.php') ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="firstname">Username</label>
            <input type="text" name="firstname" >
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" name="email" >
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" >
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" >
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn" > Registor</button>
        </div>
        <p>Already a member? <a href="login.php">Sign In</a></p>
    </form>
</body>
</html>