<?php
    ini_set("date.timezone", "Asia/Kolkata");
    include("controller.php");
    include("views/header.php");
    
    if(isset($_GET['page'])){
        if($_GET['page'] == 'feed'){
            include("views/feed.php");
        }else if($_GET['page'] == 'tweets'){
            include("views/yourTweets.php");
        }else if($_GET['page'] == 'search'){
            include("views/search.php");
        }
    }else{
        include("views/home.php");
    }
    include("views/footer.php");
?>