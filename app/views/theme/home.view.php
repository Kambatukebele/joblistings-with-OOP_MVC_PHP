<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->

<!-- End banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Best place to publish and look for Jobs
        </h1>
        <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a
            href="single.html"> Job Details</a></p>
      </div>
    </div>
  </div>
</section>


<!-- Start post Area -->
<section class="post-area section-gap">
  <div class="container">
    <div class="row justify-content-center d-flex">
      <div class="col-lg-8 post-list">
        <?php if(isset($data['success'])): ?>
        <?php foreach($data['success'] as $value): ?>
        <div class="single-post d-flex flex-row">
          <div class="thumb">
            <img style="width: 60px;" src="<?=ROOT_ASSETS?>images/<?=$value->logo?>" alt="">
            <ul style="max-width:200px" class="tags">
              <?php
                $tags = $value->tags; 
                $tags = explode(",", $tags);
              ?>
              <?php foreach($tags as $tag): ?>
              <li>
                <a href="#"><?=$tag?></a>
              </li>
              <?php endforeach; ?>

            </ul>
          </div>

          <div class="details pl-5">
            <div class="title d-flex flex-row justify-content-between">
              <div class="titles">
                <a href="single.html">
                  <h4><?=$value->job_title?></h4>
                </a>
              </div>
              <ul class="btns">
                <li><a href="<?=ROOT?>home/single_listing/<?=$value->id?>">More</a></li>
              </ul>
            </div>
            <h5>Job Nature: Full time</h5>
            <p class="address"><span class="lnr lnr-map"></span><?=$value->category?></p>
            <p class="address"><span class="lnr lnr-database"></span> <?=$value->salary_range?></p>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <a href="<?=ROOT?>home"><input type="button" class="text-uppercase btn btn-primary " value="load more jobs"
            id="loadmore"></a>
      </div>
    </div>
  </div>
</section>
<!-- End post Area -->

<!-- Start callto-action Area -->
<section class="callto-action-area section-gap" id="join">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content col-lg-9">
        <div class="title text-center">
          <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
          <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
          <a class="primary-btn" href="#">I am a Candidate</a>
          <a class="primary-btn" href="#">Request Free Demo</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End calto-action Area -->

<!-- Start download Area -->
<section class="download-area section-gap" id="app">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 download-left">
        <img class="img-fluid" src="img/d1.png" alt="">
      </div>
      <div class="col-lg-6 download-right">
        <h1>Download the <br>
          Job Listing App Today!</h1>
        <p class="subs">
          It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of
          Virtual Game, it has been achieving great heights so far as its popularity and technological advancement
          are concerned.
        </p>
        <div class="d-flex flex-row">
          <div class="buttons">
            <i class="fa fa-apple" aria-hidden="true"></i>
            <div class="desc">
              <a href="#">
                <p>
                  <span>Available</span> <br>
                  on App Store
                </p>
              </a>
            </div>
          </div>
          <div class="buttons">
            <i class="fa fa-android" aria-hidden="true"></i>
            <div class="desc">
              <a href="#">
                <p>
                  <span>Available</span> <br>
                  on Play Store
                </p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End download Area -->
<?php $this->view("theme", "footer", $data);?>