<?php $this->view("theme", "header", $data); ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Manage Account
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
        <h3 class="py-3">Posts List</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Job Title</th>
              <th scope="col">Category</th>
              <th scope="col">Job Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($data['success'])): ?>
            <?php foreach($data['success'] as $key):  ?>
            <tr>
              <td><?= $key->job_title;  ?></td>
              <td><?= $key->category;  ?></td>
              <td><?= $key->job_type;  ?></td>
              <td>
                <a href="<?=ROOT?>manager_posts/listing_edit/<?=$key->id?>"><button
                    class="btn btn-primary">Edit</button></a>
                <a href="<?=ROOT?>manager_posts/delete/<?=$key->id?>"><button class="btn btn-danger">Delete</button></a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif;  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- END POST FORM -->
<?php $this->view("theme", "footer", $data); ?>