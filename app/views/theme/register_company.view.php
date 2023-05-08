<?php $this->view("theme", "header");?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Reach the largest remote community on the web
        </h1>
        <p class="text-white"><a href="<?=ROOT?>">Go back </a> <span class="lnr lnr-arrow-right"></span> <a
            href="<?=ROOT?>">Here</a></p>
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
        <h3 class="py-3">Tell us more about your company</h3>
        <form method="post">
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company Name<br> <small>Enter your company or organization’s
                  name.</small></label>
              <input type="text" name="company_name" class="form-control" require
                placeholder="Enter your company name here">
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Company HQ <br> <small>Where your company is officially
                  headquartered.</small></label>
              <input type="text" name="company_HQ" class="form-control" placeholder="Enter your company headquartered">
            </div>

          </div>
          <br>
          <div class="custom-file">
            <label class="custom-file-label" for="customFile">Add your logo</label>
            <input type="file" name="logo" class="custom-file-input" id="customFile">
          </div>
          <br><br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company's Website URL<br> <small>Example:
                  https://mybusiness.com/</small></label>
              <input type="text" name="company_website_url" class="form-control" require>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Email <br><small>We’ll send your receipt and confirmation email
                  here.</small></label>
              <input type="email" name="company_email" class="form-control" require>
            </div>

          </div>
          <br><br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Password<br> <small>Enter your password. At least 6
                  digits</small></label>
              <input type="password" name="password" class="form-control" require>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Confirm Password<br><small>Just to double check</small></label>
              <input type="password" name="password_confirm" class="form-control" require>
            </div>

          </div>

          <br>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Company Description</label>
            <textarea name="company_description" class="form-control" id="exampleFormControlTextarea1" rows="10"
              placeholder="Tell us more here........."></textarea>
          </div>
          <br><br>
          <div>
            <button type="submit" class="btn btn-success">Register Your Company</button>
          </div>
        </form>
        <br><br>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer");?>