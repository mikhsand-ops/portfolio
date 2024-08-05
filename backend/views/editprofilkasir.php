<?php 
$this->load->view('theme/headerkasir'); 
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
                        <form class="horizontal" method="post" action="<?php echo base_url(); ?>Ckasir/editprofil/<?php echo $detail[0]->id_kasir; ?>">

                            <div class="form-group">
                                <label>Nama Kasir</label>
                                <input type="text" class="form-control" required="required" autofocus="autofocus" name="nama">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" required="required" autofocus="autofocus" class="form-control" name="alamat">
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