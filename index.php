<?php
    session_start();
    if(!isset($_SESSION ['firstname'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['firstname']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
    
<div class="content">
    <?php
        if(isset($_SESSION['success'])) :?>
        <div class="success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if(isset($_SESSION['firstname'])) : ?>
        <p>Welcome <strong> <?php echo $_SESSION['firstname']; ?></strong></p>
        <p><a href="index.php?logout='1'" style="color:red;">logout</a></p>
    <?php endif ?>
</div>
</body>
</html>