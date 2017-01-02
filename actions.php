<?php

    include("controller.php");
    
    if($_GET['actions'] == "loginSignup"){
        
        $error = "";
        
        if(!$_POST['email']){
            $error = "An email address is required";
        }else if(!$_POST['password']){
            $error = "A password is required";
        }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $error = "Please enter a valid email address";
        }
        
        if($error != ""){
            echo $error;
            exit();
        }
        
        if($_POST['loginActive'] == "0"){
            $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0){
                $error = "That email address is already taken";
            }else{
                $query = "INSERT INTO users (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                if(mysqli_query($link, $query)){
                    $_SESSION['id'] = mysqli_insert_id($link);
                    $query = "UPDATE users SET password = '".md5(md5($_SESSION['id']).$_POST['password'])."' WHERE id = '".$_SESSION['id']."' LIMIT 1";
                    mysqli_query($link, $query);
                    echo 1;
                }else{
                    $error = "Sorry, our bad! Couldn't add ya, Please try again later";
                }
            }           
        }else{
            $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == md5(md5($row['id']).$_POST['password'])){
                echo 1;
                $_SESSION['id'] = $row['id'];
            }else{
                $error = "Sorry, could not find this user. Did you enter the correct login credentials?";
            }
        }
        
        if($error != ""){
            echo $error;
            exit();
        }
        
    }

?>