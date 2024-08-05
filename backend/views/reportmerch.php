<?php 
$this->load->view('theme/headermech'); 
?>
				<div class="about-heading">
			<h2>Laporan Transaksi</h2>
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

									<p>Transaksi oleh <a href="#"><?php echo $this->session->userdata('nama'); ?></a>

										<br/>
									<form method="post" action="<?php echo base_url(); ?>Cmerch/filterreport">
										<label>Pilih Tanggal</label>
										<input type="date" name="tanggal">
										<input type="submit" value="FILTER">
									</form>
									<br/>

									<form method="post" action="<?php echo base_url(); ?>Cmerch/filterbulan">
									Pilih Bulan
							<select name="bulan">
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="12">November</option>
							<option value="12">Desember</option>
							</select>
								<input type="submit" value="FILTER">
							</form>

								</div>
								<br/>
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
								<table class="table table-bordered table-hover" border="1">
									<thead class="thead-dark">
										<tr>
											<th>No</th>
											<th align="center">Menu</th>
											<th>Metode Pembayaran</th>
											<th>Harga</th>
											<th>Tanggal</th>
										</tr>
									</thead>

									<button><a href="<?php echo base_url();?>CMerch/reportmerch">Per-hari</a></button>
        							<button><a href="<?php echo base_url();?>CMerch/reportmingguan">Per-minggu</a></button>
       								<button><a href="<?php echo base_url();?>CMerch/reportbulanan">Per-bulan</a></button>
									<?php 
										$no=1;
									foreach ($data as $y) {
	
									?>
									<tr align="center">
										<td><?php echo $no ++; ?></td>
										<td><?php echo $y->nama_menu; ?></td>
										<td><?php echo $y->metode_pembayaran; ?></td>
										<td><?php echo "Rp ".number_format($y->total_harga,0,"",".");?></td>
										<td><?php echo $y->tgl_trans; ?></td>
									</tr>
									<?php } ?>
								</table>
						</div>
							<table class="table table-bordered" border="1">
								<?php
									foreach ($total as $x) {

								?>

								<th>Omset : </th>
								<th><?php echo $x->Omset; ?></th>
							<?php } ?>
							</table>
					</div>

				</div>
						
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!-- footer -->
	
	<?php $this->load->view('theme/footer'); ?>