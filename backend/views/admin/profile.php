<div class="main-content ">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

     <?= $this->session->flashdata('message'); ?>

     <div class=row>
         <div class='col-lg-8'>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $this->session->userdata('nama'); ?></h5>
        <p class="card-text"><?= $user['email']; ?></p>
        <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
      </div>
    </div>
  </div>
</div>

  </div>
  </div>
</div>
  </div>
  </div>
