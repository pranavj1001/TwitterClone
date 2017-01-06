<div class="container-fluid backgroud"></div>
<div class="container-fluid homePage">
    <div class="row">
      <div class="col-md-8">
          <h2 class="heading" id="homeHeading">Tweets for You</h2>
          <?php displayTweets('isFollowing'); ?>
      </div>
      <div class="col-md-4">
          <?php displaySearch(); ?>
          <hr class="hrStyle">
          <?php displayTweetBox(); ?>
      </div>
    </div>
</div>