<?php 
$this->load->view('theme/headerkasir'); 
?>
				<div class="about-heading">
			<h2>Klaim Transaksi</h2>
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
							<div class="blog-left-left">
								
							</div>
							<div class="blog-left-right">
								<div class="blog-left-right-top">
									
								</div>
								<div class="blog-left-right-bottom">
									
								</div>
							</div>
							<div class="clearfix"> </div>
							<div class="blog-right-grids">
							<div class="blog-left-left">
								
							</div>
						</div>
						</div>

						<div class="response" align="center">
								<table border="1"s>
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Total</th>
											<th>Aksi	</th>
										</tr>
									</thead>

									<?php 
										$no=1;
									foreach ($data as $y) {
										
									?>
									<tr align="center">
										<td><?php echo $no ++; ?></td>
										<td><?php echo $y->tglTrans; ?></td>
										<td><?php echo $y->total; ?></td>
										<td align="center">
											<button><a href="<?php echo base_url().'Ckasir/profitkasir/'.$y->idTrans; ?>">Klaim</a></button></td>
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