<div class="main-content ">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

     <?= $this->session->flashdata('message'); ?>

     <div class=row>
         <div class='col-lg-8'>

             <?= form_open_multipart('user/edit_profile'); ?>
             <div class="form-group row">
                 <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                     <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                 </div>
             </div>
             
             <div class="form-group row">
                 <label for="name" class="col-sm-2 col-form-label">Full name</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                     <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                 </div>
             </div>
             <div class=" form-group row">
                 <div class="col-sm-2">pictures</div>
                 <div class="col-sm-10">
                     <div class="row">
                         <div class="col-sm-3">
                             <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                         </div>
                         <div class="col-sm-9">
                                 <input type="file" class="custom-file-input" id="image" name="image">
                                 <label class="custom-file-label" for="image">Choose file</label>
                             </div>
                         </div>
                     </div>

                 </div>



             </div>
             <div class="form-group row">
                 <div class="col-sm-2">
                     <div class="col-sm-10">
                         <button type="submit" class="btn btn-primary">edit</button>
                     </div>
                 </div>

             </div>

             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->
     </div>
 </div>
 </div>
</div>