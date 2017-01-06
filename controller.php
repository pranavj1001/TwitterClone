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

    function timeSince($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'secs')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
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
            while($row = mysqli_fetch_assoc($result)){
                $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
                
                echo "<div class='tweet'><p><b>".$user['email']."</b> <span class='time'>".timeSince(time() - strtotime($row['datetime']))." ago </span></p>";
                
                echo "<p><span class='tweetText'>".$row['tweet']."</span></p>";
                
                echo "<p><button class='btn btn-outline-primary toggleFollow' data-userId='".$row['userid']."'> Follow </button></p></div>";
                
            }
        }
        
    }


    function displaySearch(){
        echo '<div class="form-inline searchArea">
              <div class="form-group">
                <input type="text" class="form-control inputStyle" id="searchBox" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
             </div>';
    }

    function displayTweetBox(){
        if (isset($_SESSION['id'])) {
            if($_SESSION['id'] > 0){
                echo '<div class="form newTweetArea">
              <div class="form-group">
                <textarea type="text" class="form-control inputStyle" id="tweetContent" placeholder="Enter your tweets here...."></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Post Tweet</button>
             </div>';
            }
        }
    }
    
?>