<?php
    
    session_start();

    $link = mysqli_connect("localhost", "root", "", "twitterdatabase");

    if(mysqli_connect_errno()){
        print_r(mysqli_connect_error());
        exit();
    }

    if (isset($_GET['function'])) {
        if($_GET['function'] == "logout"){
            session_unset();
        }
    }

    function displayTweets($type){
        if($type == "public"){
            $whereClause = "";
        }
        
        $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC";
        
    }
    
?>