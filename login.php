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
        <h2>Form Login</h2>
    </div>
    <form action="login_db.php" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="firstname" >
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password" >
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn" > Login</button>
        </div>
        <p>Not yet a member? <a href="registor.php">Sign Up</a></p>
    </form>
</body>
</html>