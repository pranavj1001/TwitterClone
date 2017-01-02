<?php
    
    session_start();

    $link = mysqli_connect("localhost", "root", "", "twitterdatabase");

    if(mysqli_connect_errno()){
        print_r(mysqli_connect_error());
        exit();
    }

    if (isset($_GET['function'])) {     
        session_unset();
    }
?>