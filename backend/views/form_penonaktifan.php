 <?php $this->load->view('theme/headermech');?>
<htmL>
<head>
	
	<title>	Form Penonaktifan Kios</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo base_url()?> asset3/css/bootstrap.css">
	<script src="<?php echo base_url()?> asset3/js/jquery.js"></script>
	<script src="<?php echo base_url()?> asset3/js/bootstrap.min.js"></script>
</head>
<body>

<!-- DATA TABLE-->

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
        <div class="card-body">
            <!--++==++==++==++==++==++==++==++==++==++==FORM REGISTRATION DIBAWAH++==++==++==++==++==++==++==++==++==++==++==++==-->

            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-8">
                    <div class="p-5">

                <h4 class="fas fa-edit">&nbsp &nbsp Form Penonaktifan Kios</h4><br><br>
        <center><form class="horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>Cmerch/kiostutup/<?php echo $merchant[0]->id_merchant; ?>">

                            <div class="form-group">
                                <label>Alasan Kios Tutup</label>
                                <input type="text" class="form-control" required="required" autofocus="autofocus" name="status" value="<?= set_value('alasan'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            


                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update
                            </button>
                        </form></center>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>

 <?php $this->load->view('theme/footer');?>