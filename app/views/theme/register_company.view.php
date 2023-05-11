<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Reach the largest remote community on the web
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
        <h3 class="py-3">Tell us more about your company</h3>
        <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger">
          Please fix the following errors!
        </div>
        <?php endif ?>
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company Name<br> <small>Enter your company or organization’s
                  name.</small></label>
              <input type="text" name="company_name" class="form-control" require value="<?= old('company_name'); ?>"
                placeholder="Enter your company name here">
              <?php if (isset($data['error']['companyName'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyName']; ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Company HQ <br> <small>Where your company is officially
                  headquartered.</small></label>
              <input type="text" name="company_HQ" class="form-control" placeholder
                value="<?= old('company_HQ'); ?>"="Enter your company headquartered">
              <?php if (isset($data['error']['companyHQ'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyHQ']; ?>
              </div>
              <?php endif; ?>
            </div>

          </div>
          <br>
          <div class="custom-file">
            <label class="custom-file-label" for="customFile">Add your logo</label>
            <input type="file" name="logo" class="custom-file-input" value="<?= old(''); ?>" id="customFile">
          </div>
          <?php if (isset($data['error']['logo'])) : ?>
          <div class="alert alert-danger mt-2">
            <?= $data['error']['logo']; ?>
          </div>
          <?php endif; ?>
          <br><br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Company's Website URL<br> <small>Example:
                  https://mybusiness.com/</small></label>
              <input type="text" name="company_website_url" class="form-control" require
                value="<?= old('company_website_url'); ?>">
              <?php if (isset($data['error']['companyWebsiteUrl'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyWebsiteUrl']; ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Email <br><small>We’ll send your receipt and confirmation email
                  here.</small></label>
              <input type="text" name="company_email" class="form-control" require value="<?= old('company_email'); ?>">
              <?php if (isset($data['error']['companyEmail'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyEmail']; ?>
              </div>
              <?php endif; ?>
            </div>

          </div>
          <br><br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Password<br> <small>Enter your password. At least 6
                  digits</small></label>
              <input type="password" name="password" class="form-control" require>
              <?php if (isset($data['error']['password'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['password']; ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Confirm Password<br><small>Just to double check</small></label>
              <input type="password" name="password_confirm" class="form-control" require>
              <?php if (isset($data['error']['passwordConfirm'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['passwordConfirm']; ?>
              </div>
              <?php endif; ?>
            </div>

          </div>

          <br>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Company Description</label>
            <textarea name="company_description" class="form-control" id="exampleFormControlTextarea1" rows="10"
              placeholder="Tell us more here........."><?= old('company_description') ?></textarea>
            <?php if (isset($data['error']['companyDescription'])) : ?>
            <div class="alert alert-danger mt-2">
              <?= $data['error']['companyDescription']; ?>
            </div>
            <?php endif; ?>
          </div>
          <br><br>
          <div>
            <button class="btn btn-success">Register Your Company</button>
          </div>
          <div class="mt-3">
            Already Registered? Log in <a class="text-danger" href="<?=ROOT?>login_company">here</a>
          </div>
        </form>
        <br><br>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data); ?>