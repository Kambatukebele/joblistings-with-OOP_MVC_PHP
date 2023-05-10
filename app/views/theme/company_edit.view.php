<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Edit Profile
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
        <h3 class="py-3">You can edit your details here</h3>
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
              <input type="text" name="company_name" class="form-control" require
                value="<?= $data['show'][0]->company_name ?>" placeholder="Enter your company name here">
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
                value="<?=$data['show'][0]->company_HQ?>"="Enter your company headquartered">
              <?php if (isset($data['error']['companyHQ'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyHQ']; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <br>
          <div class="custom-file my-5">
            <img style="width:60px" src="<?=ROOT_ASSETS?>images/<?=$data['show'][0]->logo?>">
          </div>
          <div class="my-2">
            Do you want to change you logo as well?
            <div class="custom-file">
              <button class="btn btn-primary edit-logo" type="button" id="button-yes">Edit Logo</button>
              <button class="btn btn-danger d-none" type="button" id="button-no">Hide Logo</button>
            </div>

          </div>
          <div class="custom-file d-none" id="hide-show">
            <label class="custom-file-label" for="customFile">Edit your photo, if needed</label>
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
                value="<?=$data['show'][0]->company_website_url; ?>">
              <?php if (isset($data['error']['companyWebsiteUrl'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyWebsiteUrl']; ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Email <br><small>We’ll send your receipt and confirmation email
                  here.</small></label>
              <input type="text" name="company_email" class="form-control" require
                value="<?=$data['show'][0]->company_email; ?>">
              <?php if (isset($data['error']['companyEmail'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['companyEmail']; ?>
              </div>
              <?php endif; ?>
            </div>
            <?php showPrint($data);?>
          </div>
          <br><br>
          <div class="my-2">
            Do you want to change your password as well?
            <div class="custom-file">
              <button class="btn btn-primary edit-password" type="button" id="passwordBlockBtn-yes">Edit
                Password</button>
              <button class="btn btn-danger d-none" type="button" id="passwordBlockBtn-no">Hide Password</button>
            </div>
          </div>
          <div class="row d-none" id="HideShowPasswordBlock">
            <div class="col" id="input_password">
              <label for="formGroupExampleInput">Password<br> <small>Enter your password. At least 6
                  digits</small></label>
              <!-- <input type="password" name="password" class="form-control"> -->
              <?php if (isset($data['error']['password'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['password']; ?>
              </div>
              <?php endif; ?>
            </div>
            <div class="col" id="input_password_confirm">
              <label for="formGroupExampleInput">Confirm Password<br><small>Just to double check</small></label>
              <!-- <input type="password" name="password_confirm" class="form-control" require> -->
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
              placeholder="Tell us more here........."><?=$data['show'][0]->company_description;?></textarea>
            <?php if (isset($data['error']['companyDescription'])) : ?>
            <div class="alert alert-danger mt-2">
              <?= $data['error']['companyDescription']; ?>
            </div>
            <?php endif; ?>
          </div>
          <br><br>
          <div>
            <button type="submit" class="btn btn-success">Update your details</button>
          </div>
          <div class="mt-3">
            Change your mind? <a class="text-danger" href="<?=ROOT?>company_account">Return</a>
          </div>
        </form>
        <br><br>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data); ?>