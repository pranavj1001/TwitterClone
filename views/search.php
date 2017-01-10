<!--<div class="container-fluid backgroud"></div>-->
<hr>
<div class="container-fluid homePage">
    <div class="row">
      <div class="col-md-8">
          <h2 class="heading" id="homeHeading">Search Results</h2>
          <?php displayTweets('search'); ?>
      </div>
      <div class="col-md-4">
          <?php displaySearch(); ?>
          <hr class="hrStyle">
          <?php displayTweetBox(); ?>
      </div>
    </div>
</div>