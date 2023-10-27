<?php
session_start();
include('server.php');
include('errors.php');
if(isset($_POST['login_user'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($firstname)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE firstname='$firstname' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['firstname'] = $firstname;
            $_SESSION['success'] = "You are now loged in";
            header('location: index.php');
        }else{
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username or password try again";
            header('location: login.php');
        }
    }
}
?>