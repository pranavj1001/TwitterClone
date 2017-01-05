<div class="container-fluid backgroud"></div>
<div class="container-fluid homePage">
    <div class="row">
      <div class="col-md-8">
          <h2 class="heading" id="homeHeading">Recent Tweets</h2>
          <?php displayTweets('public'); ?>
      </div>
      <div class="col-md-4">
          <?php displaySearch(); ?>
          <?php displayTweetBox(); ?>
      </div>
    </div>
</div>