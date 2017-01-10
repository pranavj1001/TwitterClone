<div class="container-fluid backgroud"></div>
<div class="container-fluid homePage">
    <div class="row">
      <div class="col-md-8">
            <?php if(isset($_GET['userid'])){ ?>
                <?php displaytweets($_GET['userid']);?>
            <?php }else{ ?>
                <h2 class="heading" id="homeHeading">Users</h2>
                <?php displayUsers(); ?>
            <?php } ?>
      </div>
      <div class="col-md-4">
          <?php displaySearch(); ?>
          <hr class="hrStyle">
          <?php displayTweetBox(); ?>
      </div>
    </div>
</div>