<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Log in
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
        <h3 class="py-3">Log into your acccount to manage your posts</h3>
        <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger">
          Please fix the following errors!
        </div>
        <?php endif; ?>
        <?php if (isset($data['error']['EmailAndPassword'])) : ?>
        <div class="alert alert-danger">
          <?php echo $data['error']['EmailAndPassword']; ?>
        </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
          <br><br>
          <div class="row">
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
          </div>
          <br><br>
          <div>
            <button type="submit" class="btn btn-success">Log into your company account</button>
          </div>
          <div class="mt-3">
            Don't have an account yet? Register one <a class="text-danger" href="<?=ROOT?>register_company">here</a>
          </div>
        </form>
        <br><br>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data); ?>