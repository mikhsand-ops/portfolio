<?php 
$this->load->view('theme/headermech'); 
?>
				<div class="about-heading">
			<h2>Single Page</h2>
		</div>
	</div>
	<!-- //banner -->
	
	<div class="blog">
		<div class="container">
			<div class="agile-blog-grids">
				<div class="col-md-8 agile-blog-grid-left">
					<div class="agile-blog-grid">
						<div class="agile-blog-grid-left-img">
							<img src="<?php echo base_url().'/menu
        	/'.$detail[0]->foto_menu ?>" class="card-img-top">
						</div>
						<div class="blog-left-grids">
							<div class="blog-left-left">
								<a href="<?php echo base_url().'Cmerch/Veditmenu/'.$detail[0]->id_menu; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</div>
							<div class="blog-left-right">
								<div class="blog-left-right-top">
									<h4><?php echo $detail[0]->nama_menu; ?></h4>
									<p>Posted By <a href="#"><?php echo $this->session->userdata('nama'); ?></a>
								</div>
								<div class="blog-left-right-bottom">
									<p><?php echo $detail[0]->keterangan; ?></p>
								</div>
							</div>
							<div class="clearfix"> </div>
							<div class="blog-right-grids">
							<div class="blog-left-left">
								<a href="<?php echo base_url().'Cmerch/delete/'.$detail[0]->id_menu; ?>"><i class="fa fa-eraser" aria-hidden="true"></i></a>
							</div>
						</div>
						</div>

						<div class="response" align="center">
								<?php
							echo '<img src="'.base_url().'uploads/'.$detail[0]->foto_menu.'" width="300px" height="300px">';
							?>
						</div>

					</div>
				</div>
				<div class="col-md-4 agile-blog-grid-right">
					<div class="categories">
						<h3>Categories</h3>
						<ul>
							<li><a href="#">Phasellus sem leo, interdum quis risus</a></li>
							<li><a href="#">Nullam egestas nisi id malesuada aliquet </a></li>
							<li><a href="#"> Donec condimentum purus urna venenatis</a></li>
							<li><a href="#">Ut congue, nisl id tincidunt lobor mollis</a></li>
							<li><a href="#">Cum sociis natoque penatibus et magnis</a></li>
							<li><a href="#">Suspendisse nec magna id ex pretium</a></li>
						</ul>
					</div>
					<div class="categories">
						<h3>Archive</h3>
						<ul class="marked-list offs1">
							<li><a href="#">May 2016 (7)</a></li>
							<li><a href="#">April 2016 (11)</a></li>
							<li><a href="#">March 2016 (12)</a></li>
							<li><a href="#">February 2016 (14)</a> </li>
							<li><a href="#">January 2016 (10)</a></li>    
							<li><a href="#">December 2016 (12)</a></li>
							<li><a href="#">November 2016 (8)</a></li>
							<li><a href="#">October 2016 (7)</a> </li>
							<li><a href="#">September 2016 (8)</a></li>
							<li><a href="#">August 2016 (6)</a></li>                          
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!-- footer -->
	
	<?php $this->load->view('theme/footer'); ?>