<?php $this->load->view('theme/headerkasir'); ?>
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
            DATA KASIR</div>
          <div class="card-body">
            <div class="table-responsive">
              <table  width="100%" cellspacing="0" border="0">
                <center>
                	<?php $x=$this->session->userdata('id_kasir'); ?>
					<button><a class="tombol" href="<?php echo base_url().'
					Ckasir/Veditprofilkasir/'.$x; ?>">Edit Profil</a></button>		
									<?php
										foreach ($data as $y) {
											
										
									?>
										<tr>
											<td width="90">
												Nama Kasir
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->nama_kasir; ?>
											</td>
										</tr>

										<tr>
											<td width="90">
												Alamat Kasir
											</td>
											<td width="20">
												:
											</td>
											<td>
												<?php echo $y->alamat_kasir; ?>
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
	
	<!-- footer -->
	
	<?php $this->load->view('theme/footer'); ?>