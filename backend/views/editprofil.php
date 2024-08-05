<?php 
$this->load->view('theme/headermech'); 
?>
				<div class="about-heading">
			
		</div>
	</div>
	<!-- //banner -->
	
	<div class="blog">
		<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
        <div class="card-body">
            <!--++==++==++==++==++==++==++==++==++==++==FORM REGISTRATION DIBAWAH++==++==++==++==++==++==++==++==++==++==++==++==-->

            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-8">
                    <div class="p-5">

     <h4 class="fas fa-edit">&nbsp &nbsp Edit Profil</h4><br><br>
    <form class="horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>CMerch/editprofil/<?php echo $detail[0]->id_merchant; ?>">

                            <div class="form-group">
                                <label>Nama Merchant</label>
                                <input type="text" class="form-control" required="required" autofocus="autofocus" name="kios">
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" required="required" autofocus="autofocus" class="form-control" name="nama">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" required="required" autofocus="autofocus" class="form-control" name="alamat">
                            </div>

                            <div class="form-group">
                                <label>Logo Kios</label>
                                <input type="file" required="required" autofocus="autofocus" class="form-control" name="logo">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Edit Profil
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
	</div>
	
	
	<?php $this->load->view('theme/footer'); ?>