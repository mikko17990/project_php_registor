<?php
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['reg_user'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if(empty($firstname)){
            array_push($errors, "Username is required");
        }
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password_1)){
            array_push($errors, "Password is required");
        }
        if(empty($firstname)){
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM user WHERE firstname = '$firstname' OR email = '$email'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result){
            if($result['firstname'] === $firstname) {
                array_push($errors, "Username already exists");
            }
            if($result['email']=== $email){
                array_push($errors, "Email aleady exists");
            }
        }

        if(count($errors) == 0){
            $password = md5($password_1);

            $sql = "INSERT INTO user (firstname, email, password) VALUES ('$firstname', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['firstname'] = $firstname;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else{
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Username or Email already exists";
            header('location: registor.php');
        }

    }

?>
