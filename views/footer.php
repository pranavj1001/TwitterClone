
    <footer class="footer">
        <div class="container">
            <p>&copy; Pranav Jain 1st Jan 2017 (Happy New Year) 01:23:34 </p>
        </div>
    </footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="loginModalLabel">Log in</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" id="alert"></div>  
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">    
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email address">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="toggleLogin">Sign up</button>
              or
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="loginOrSignup">Log in</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        $('#toggleLogin').click(function(){
           
            if($('#loginActive').val() === "1"){
                $('#loginActive').val("0");
                $('#loginModalLabel').html("Sign up");
                $('#loginOrSignup').html("Sign up");
                $('#toggleLogin').html("Log in");
            }else{
                $('#loginActive').val("1");
                $('#loginModalLabel').html("Log in");
                $('#loginOrSignup').html("Log in");
                $('#toggleLogin').html("Sign up");     
            }        
        });
        
        $('#loginOrSignup').click(function(){
            $.ajax({
                type: "POST",
                url: "actions.php?actions=loginSignup",
                data:"email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
                success: function(result){
                    if(result == "1"){
                        window.location.assign("http://localhost/TwitterClone/");
                    }else{
                        $('#alert').html(result).show();
                    }
                }
            });
        });
        
        
        $(window).scroll(function() {
          if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
          } else {
            $('nav').removeClass('shrink');
          }
        });
        
        //wrote the code below in pure js because I just wanted to test myself, to see if I still remember the syntax ;)
        window.onload = function(){
            var heading = document.getElementById("homeHeading");
            var headingNumber = 5;
            if(heading.innerHTML === "Recent Tweets"){
                headingNumber = 0;
            }
            if(heading.innerHTML === "Tweets for You"){
                headingNumber = 1;
            }
            if(heading.innerHTML === "Your Tweets"){
                headingNumber = 2;
            }
            if(heading.innerHTML === "Search Results"){
                headingNumber = 3;
            }
            if(heading.innerHTML === "Users"){
                headingNumber = 4;
            }
            var count = 0;
            if(headingNumber != 5){
                setInterval(function(){
                    if(count == 4){
                        if(headingNumber == 0)
                            heading.innerHTML = "Recent Tweets";
                        if(headingNumber == 1)
                            heading.innerHTML = "Tweets for You";
                        if(headingNumber == 2)
                            heading.innerHTML = "Your Tweets";
                        if(headingNumber == 3)
                            heading.innerHTML = "Search Results";
                        if(headingNumber == 4)
                            heading.innerHTML = "Users";
                        count = 0;
                    }else{
                        heading.innerHTML += ".";
                        count++;
                    }
                },1000);
            }
        };
        
        $(".toggleFollow").click(function(){
            
            var id = $(this).attr("data-userId");
            
            $.ajax({
                type: "POST",
                url: "actions.php?actions=toggleFollow",
                data:"userId=" + id,
                success: function(result){
                    if(result == "1"){
                        $("button[data-userId='" + id +"']").html("Follow");
                    }else if(result == "2"){
                        $("button[data-userId='" + id +"']").html("UnFollow");
                    }
                }
            });
        });
        
        $("#postTweetButton").click(function(){
            
            $.ajax({
                type: "POST",
                url: "actions.php?actions=postTweet",
                data:"tweetContent=" + $("#tweetContent").val(),
                success: function(result){
                    if(result == "1"){
                        $("#tweetSuccess").show();
                        $("#tweetFailure").hide();
                        location.reload();
                    }else if(result != "1"){
                        $("#tweetFailure").html(result).show();
                        $("#tweetSuccess").hide();
                    }
                }
            });
            
        });
        
        $(".deleteButton").click(function(){
            
            var id = $(this).attr("data-id");
            
            $.ajax({
                type: "POST",
                url: "actions.php?actions=deleteTweet",
                data:"id=" + id,
                success: function(result){
                    alert(result);
                }
            });
            
        });
        
    </script>

  </body>
</html>