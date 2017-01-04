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
        
        global $link;
        
        if($type == "public"){
            $whereClause = "";
        }
        
        $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC";
        
        $result = mysqli_query($link, $query);
        
        if(mysqli_num_rows($result) == 0){
            echo "There are no tweets right now to show. Why don't you start tweeting? :)";
        }else{
            while($row == mysqli_fetch_assoc($result)){
                $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
            }
        }
        
    }
    
?>