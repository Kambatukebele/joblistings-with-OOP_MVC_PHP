<?php $this->view("theme", "header", $data); ?>

<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Job Details
        </h1>
        <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a
            href="single.html"> Job Details</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start post Area -->
<section class="post-area section-gap">
  <div class="container">
    <div class="row justify-content-center d-flex">
      <div class="col-lg-8 post-list">
        <div class="single-post d-flex flex-row">
          <div class="thumb">
            <img style="width:100px;" class="mr-4" src="<?= ROOT_ASSETS ?>images/<?= $data['success'][0]->logo; ?>"
              alt="">
          </div>

          <div class="details">
            <div class="title d-flex flex-row justify-content-between">
              <div class="titles">
                <a href="#">
                  <h4><?= $data['success'][0]->job_title; ?></h4>
                </a>
                <h6><?= $data['success'][0]->company_name; ?></h6>
              </div>
              <ul class="btns ml-4">
                <li><a href="<?= $data['success'][0]->application_link_email; ?>">Apply</a></li>
              </ul>
            </div>
            <h5>Job Nature: <?= $data['success'][0]->job_type; ?></h5>
            <p class="address"><span class="lnr lnr-map"></span><?= $data['success'][0]->region; ?></p>
            <p class="address"><span class="lnr lnr-database"></span> <?= $data['success'][0]->salary_range; ?></p>
          </div>
        </div>
        <div class="single-post job-details">
          <h4 class="single-title">Whom we are looking for</h4>
          <p>
            <?php echo $data['success'][0]->job_description; ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- End post Area -->


<!-- Start callto-action Area -->
<section class="callto-action-area section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content col-lg-9">
        <div class="title text-center">
          <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
          <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
          <a class="primary-btn" href="#">I am a Candidate</a>
          <a class="primary-btn" href="#">We are an Employer</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End calto-action Area -->

<!-- start footer Area -->
<?php $this->view("theme", "footer", $data); ?>