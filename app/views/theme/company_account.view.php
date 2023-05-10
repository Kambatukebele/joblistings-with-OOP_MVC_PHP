<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Account
        </h1>
        <p class="text-white"><a href="<?= ROOT ?>">Go back </a> <span class="lnr lnr-arrow-right"></span> <a
            href="<?= ROOT ?>">Here</a></p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- POST FORM -->
<section class="post-form py-3">
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="py-3">View your details here</h3>
        <div>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company Name<br> <small>Enter your company or organization’s
                  name.</small></label>
              <div class="form-control">
                <?= $data['result'][0]->company_name; ?>
              </div>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Company HQ <br> <small>Where your company is officially
                  headquartered.</small></label>
              <div class="form-control"> <?= $data['result'][0]->company_HQ; ?></div>
            </div>

          </div>
          <br>
          <div class="custom-file my-5">
            <img style="width:60px" src="<?=ROOT_ASSETS?>images/<?= $data['result'][0]->logo;?>" alt="logo">
          </div>

          <br><br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company's Website URL<br> <small>Example:
                  https://mybusiness.com/</small></label>
              <div class="form-control"><?= $data['result'][0]->company_website_url; ?></div>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Email <br><small>We’ll send your receipt and confirmation email
                  here.</small></label>
              <div class="form-control"><?= $data['result'][0]->company_email; ?></div>
            </div>

          </div>
          <br>
          <br>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Company Description</label>
            <div class="form-control" id="exampleFormControlTextarea1"><?= $data['result'][0]->company_description; ?>
            </div>
          </div>
        </div>
        <br><br>
        <div class="mb-5">
          <a href="<?=ROOT?>company_account/company_edit"><button class="btn btn-primary">Edit Your
              details</button></a>
          <a href="<?=ROOT?>company_account/company_delete"><button class="btn btn-danger">Delete your
              Account</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data); ?>