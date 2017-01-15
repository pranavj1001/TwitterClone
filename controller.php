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
            array(1 , 'sec')
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
        $whereClause = "";
        $endQuery = 0;
        $noTweetsForThisUser = 0;
        
        if(isset($_SESSION['id'])){
        
            if($type == "public"){

                $whereClause = "";

            }else if($type == "isFollowing"){

                if(isset($_SESSION['id'])){

                    $query = "SELECT * FROM followingdata WHERE follower = ".mysqli_real_escape_string($link, $_SESSION['id']);

                    $result = mysqli_query($link, $query);

                    while($row = mysqli_fetch_assoc($result)){

                        if($whereClause == "")
                            $whereClause = "WHERE ";
                        else
                            $whereClause .= " OR ";

                        $whereClause .= "userid = ".$row['isFollowing'];
                    }

                }
            }else if($type == "yourTweets"){

                if(isset($_SESSION['id'])){

                    $whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $_SESSION['id']);

                }

            }else if($type == "search"){
                
                echo '<p class="searchString">Showing results for "'.mysqli_real_escape_string($link, $_GET['query']).'"</p>';
                
                $whereClause = "WHERE tweet LIKE '%".mysqli_real_escape_string($link, $_GET['query'])."%' ";
                
            }else if (is_numeric($type)){
                
                $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $type)." LIMIT 1";

                $userQueryResult = mysqli_query($link, $userQuery);

                $user = mysqli_fetch_assoc($userQueryResult);
                
                echo "<h2 class='heading'>".mysqli_real_escape_string($link, $user['email'])."'s Tweets</h2>";
                
                $whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $type);
                
                $noTweetsForThisUser = 1;
                
            }

            $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC";

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) == 0){
                
                if($noTweetsForThisUser == 1){
                    
                    echo "<p class='display'>No tweets found from this user :(</p>";
                    
                }else{

                    echo "<p class='display'>There are no tweets right now to show. Why don't you start tweeting? :)</p>";
                
                }

            }else{
                
                while($row = mysqli_fetch_assoc($result)){

                    $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";

                    $userQueryResult = mysqli_query($link, $userQuery);

                    $user = mysqli_fetch_assoc($userQueryResult);

                    echo "<div class='tweet'><p><b><a href='?page=users&userid=".$user['id']."'>".$user['email']."</a></b> <span class='time'>".timeSince(time() - strtotime($row['datetime']))." ago </span></p>";

                    echo "<p><span class='tweetText'>".$row['tweet']."</span></p>";

                    echo "<p><button class='btn btn-outline-primary toggleFollow' data-userId='".$row['userid']."'>";

                    if(isset($_SESSION['id'])){
                        
                        $followingQuery = "SELECT * FROM followingdata WHERE follower = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND isFollowing = '".mysqli_real_escape_string($link, $row['userid'])."' LIMIT 1";

                        $followingResult = mysqli_query($link, $followingQuery);

                        if(mysqli_num_rows($followingResult) > 0){

                           echo "UnFollow";

                        }else{

                            echo "Follow";

                        }
                    }else{

                        echo "Follow";

                    }

                    echo "</button>";
                    
                    if(isset($_SESSION['id'])){
                        
                        if($row['userid'] == $_SESSION['id']){
                        
                        echo "<button class='btn btn-outline-danger deleteButton'>Delete</button>";
                            
                        }
                        
                    }
                    
                    echo "</p></div>";

                }
            }
            
        }else{
            
            
            if($type == "public"){

                $whereClause = "";
                
                $endQuery = 0;

            }else if($type == "isFollowing"){

                $endQuery = 1;
                
            }else if($type == "yourTweets"){

                $endQuery = 1;

            }else if($type == "search"){
                
                echo '<p class="searchString">Showing results for "'.mysqli_real_escape_string($link, $_GET['query']).'"</p>';
                
                $whereClause = "WHERE tweet LIKE '%".mysqli_real_escape_string($link, $_GET['query'])."%' ";
                
                $endQuery = 0;
                
            }else if (is_numeric($type)){
                
                $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $type)." LIMIT 1";

                $userQueryResult = mysqli_query($link, $userQuery);

                $user = mysqli_fetch_assoc($userQueryResult);
                
                echo "<h2 class='heading'>".mysqli_real_escape_string($link, $user['email'])."'s Tweets</h2>";
                
                $whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $type);
                
                $noTweetsForThisUser = 1;
                
            }

            $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC";

            $result = mysqli_query($link, $query);
            
            if($endQuery == 1){
                
                echo "<p class='display'>You need to login to view this page :)</p>";
                
            }else if(mysqli_num_rows($result) == 0){

                if($noTweetsForThisUser == 1){
                    
                    echo "<p class='display'>No tweets found from this user :(</p>";
                    
                }else{

                    echo "<p class='display'>There are no tweets right now to show. Why don't you start tweeting? :)</p>";
                
                }

            }else{
                
                while($row = mysqli_fetch_assoc($result)){

                    $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";

                    $userQueryResult = mysqli_query($link, $userQuery);

                    $user = mysqli_fetch_assoc($userQueryResult);

                    echo "<div class='tweet'><p><b><a href='?page=users&userid=".$user['id']."'>".$user['email']."</a></b> <span class='time'>".timeSince(time() - strtotime($row['datetime']))." ago </span></p>";

                    echo "<p><span class='tweetText'>".$row['tweet']."</span></p>";

                    echo "<p><button class='btn btn-outline-primary toggleFollow' data-userId='".$row['userid']."'>Follow</button></p></div>";

                }
            }
             
        }
        
    }


    function displaySearch(){
        
        echo '<form class="form-inline searchArea">
              <div class="form-group">
                <input type="hidden" name="page" value="search">
                <input type="text" name="query" class="form-control inputStyle" id="searchBox" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
             </form>';
        
    }

    function displayTweetBox(){
        
        if (isset($_SESSION['id'])) {
            
            if($_SESSION['id'] > 0){
                
                echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully!</div>
                      <div id="tweetFailure" class="alert alert-danger"></div>
              <div class="form newTweetArea">
              <div class="form-group">
                <textarea type="text" class="form-control inputStyle" id="tweetContent" placeholder="Enter your tweets here...."></textarea>
              </div>
              <button type="submit" id="postTweetButton" class="btn btn-primary">Post Tweet</button>
             </div>';
                
            }
            
        }
        
    }


    function displayUsers(){
        
        global $link;
        
        $query = "SELECT * FROM users";

        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) == 0){

            echo "<p class='display'>Sorry, There are no users on our site. Would you like to be our first user :)</p>";

        }else{
            
            while($row = mysqli_fetch_assoc($result)){
                
                echo "<p class='display'><a href='?page=users&userid=".$row['id']."'>".$row['email']."</a></p>";
                
            }
        
        }
        
    }
    
?>