<?php
    ini_set("date.timezone", "Asia/Kolkata");
    include("controller.php");
    include("views/header.php");
    
    if($_GET['page'] == 'feed'){
        include("views/feed.php");
    }else{
        include("views/home.php");
    }
    include("views/footer.php");
?>