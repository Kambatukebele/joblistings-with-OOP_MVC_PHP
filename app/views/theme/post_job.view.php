<?php $this->view("theme", "header", $data);?>
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
        <h3 class="py-3">Tell us about the position</h3>
        <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger">
          Please fix the following errors!
        </div>
        <?php endif ?>
        <form method="post">
          <div class="form-group">
            <label for="formGroupExampleInput">Job Title <br> <small>Example: “Senior Designer”. Titles must describe
                one position</small></label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your job title here"
              name="job_title" require value="<?= old('job_title'); ?>">
            <?php if (isset($data['error']['jobTitle'])) : ?>
            <div class="alert alert-danger mt-2">
              <?= $data['error']['jobTitle']; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Category<br> <small>Choose a category</small></label>
              <select name="category" class="form-control" require>
                <option value="Choose" disabled id="">Choose</option>
                <option value="Design" id="">Design</option>
                <option value="Full-stack Programming" id="">Full-stack Programming</option>
                <option value="Front end Programming" id="">Front end Programming</option>
                <option value="Back end Programming" id="">Back end Programming</option>
                <option value="Customer Support" id="">Customer Support</option>
                <option value="DevOps and SysAdmin" id="">DevOps and SysAdmin</option>
                <option value="Sales and Marketing" id="">Sales and Marketing</option>
                <option value="Management and Finance" id="">Management and Finance</option>
                <option value="Product" id="">Product</option>
              </select>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Tags <br> <small>Separate you tags with comma</small></label>
              <input type="text" class="form-control" name="tags" placeholder="Enter your tags here"
                value="<?= old('tags'); ?>">
              <?php if (isset($data['error']['tags'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['tags']; ?>
              </div>
              <?php endif; ?>
            </div>

          </div>
          <br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Region<br> <small>Where you want to hire your ideal
                  candidate.</small></label>
              <select name="region" class="form-control" require>
                <option value="Choose" disabled id="">Choose</option>
                <option value="USA - Only" id="">USA - Only</option>
                <option value="North America Only" id="">North America Only</option>
                <option value="Latin America Only" id="">Latin America Only</option>
                <option value="Europe Only" id="">Europe Only</option>
                <option value="UK Only" id="">UK Only</option>
                <option value="Canada Only" id="">Canada Only</option>
                <option value="EMEA Only" id="">EMEA Only</option>
                <option value="Africa Only" id="">Africa Only</option>
                <option value="Asia Only" id="">Asia Only</option>
              </select>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Salary Range <br><small>Just an idea for your futur
                  employee</small></label>
              <select name="salary_range" class="form-control" require>
                <option value="Choose" disabled id="">Choose</option>
                <option value="Prefer not to say" id="">Prefer not to say</option>
                <option value="$25,000-$48,999 USD" id="">$25,000-$48,999 USD</option>
                <option value="$50,000-$74,999 USD" id="">$50,000-$74,999 USD</option>
                <option value="$75,000-$99,999 USD" id="">$75,000-$99,999 USD</option>
                <option value="$100,000 or more USD" id="">$100,000 or more USD</option>
              </select>
            </div>

          </div>
          <br>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput">Job Type<br> <small>What type of job are you offering to your ideal
                  candidate.</small></label>
              <select name="job_type" class="form-control" require>
                <option value="Choose" disabled id="">Choose</option>
                <option value="Contract" id="">Contract</option>
                <option value="Full-time" id="">Full-time</option>
                <option value="Part-time" id="">Part-time</option>
              </select>
            </div>
            <div class="col">
              <label for="formGroupExampleInput">Application Link or Email<br><small>Link to Application page or Email
                  address.</small></label>
              <input name="application_link_email" class="form-control"
                placeholder="Enter your email or the application job here" require
                value="<?= old('application_link_email'); ?>">
              <?php if (isset($data['error']['applicationLinkEmail'])) : ?>
              <div class="alert alert-danger mt-2">
                <?= $data['error']['applicationLinkEmail']; ?>
              </div>
              <?php endif; ?>
            </div>

          </div>
          <br>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Job Description</label>
            <textarea class="form-control" name="job_description" id="exampleFormControlTextarea1"
              rows="10"><?= old('job_description'); ?></textarea>
            <?php if (isset($data['error']['jobDescription'])) : ?>
            <div class="alert alert-danger mt-2">
              <?= $data['error']['jobDescription']; ?>
            </div>
            <?php endif; ?>
          </div>
          <div>
            <button type="submit" class="btn btn-success">Post Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data);?>