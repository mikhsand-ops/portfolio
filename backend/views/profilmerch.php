<?php 
$this->load->view('theme/headermech'); 
?>
				<div class="about-heading">
			<h2>Profile Page</h2>
		</div>
	</div>
	<!-- //banner -->
	
	<div class="blog">
		<div class="container">
			<div class="agile-blog-grids">
				<div class="col-md-8 agile-blog-grid-left">
					<div class="agile-blog-grid">
						<div class="agile-blog-grid-left-img">
							<a href="single.html"><img src="images/e2.jpg" alt="" /></a>
						</div>
						<div class="blog-left-grids">
							
							<div class="blog-left-right">
								<div class="blog-left-right-top">
									<h4></h4>
									
								</div>
								<div class="blog-left-right-bottom">
									<p></p>
								</div>
							</div>
							<div class="clearfix"> </div>
							<div class="blog-right-grids">
							
						</div>
						</div>

						 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            DATA MERCHANT</div>
          <div class="card-body">
            <div class="table-responsive">
              <table  width="100%" cellspacing="0" border="0">
                <center>
                	<?php $x=$this->session->userdata('id_merchant'); ?>
					<button><a class="tombol" href="<?php echo base_url().'
					Cmerch/Veditprofil/'.$x; ?>">Edit Profil</a></button>
					<button><a class="tombol" href="<?php echo base_url().'
					Cmerch/penonaktifan/'.$x; ?>">Non-aktifkan Kios</a></button>
					<button><a class="tombol" href="<?php echo base_url().'
					Cmerch/bukakios/'.$x; ?>">Aktfikan Kios</a></button>
									<?php
										foreach ($data as $y) {
									?>
										<tr>
											<td width="90">
												Nama Kios 
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->nama_merchant; ?>
											</td>
										</tr>

										<tr>
											<td width="90">
												Nama Pemilik 
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->nama; ?>
											</td>
										</tr>

										<tr>
											<td width="90">
												Alamat Pemilik 
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->alamat; ?>
											</td>
										</tr>

										<tr>
											<td width="90">
												Status Kios 
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->status_merch; ?>
											</td>
										</tr>
										<?php } ?>										
									</table>
						</div>

					</div>
				</div>
			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <div class="dropdown no-arrow">
                   
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                
                 <div class="col-md-10 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
              <?php foreach ($data as $x ) { ?>
              <img src="<?php echo base_url() . '/assets/img/logoToko/' . $x->logo_merchant ?>" class="card-img-top" alt="..."> <?php } ?>
            </div>
            <div class="col-auto">
            
            </div>
          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
	
	<!-- footer -->
	
	<?php $this->load->view('theme/footer'); ?>