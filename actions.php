<?php

    //include("controller.php");
    
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
            
        }
    }

?>