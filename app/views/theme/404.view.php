<?php $this->view("theme", "header", $data);  ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Oops, 404 Page not Found!
        </h1>
        <p class="text-white"><a href="<?=ROOT?>">Go back </a> <span class="lnr lnr-arrow-right"></span> <a
            href="<?=ROOT?>">Here</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<?php $this->view("theme", "footer", $data);  ?>