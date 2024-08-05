	 <div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

	<div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
        <div class="card-body">

            <div class="row">
            	<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) 
				{
				 	foreach ($keranjang as $item) 
				 	{
				 		$grand_total = $grand_total + $item['subtotal'];
				 	}
				 	echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
				?>
			</div>

                <div class="col-lg-8">
                    <div class="p-5">
				<h4 class="fas fa-edit">&nbsp Input Pengantaran Pesanan</h4><br><br>

				<form method="POST" action="<?php echo base_url('C_dashboard/proses_pesanan') ?>">
				<div class="form-group">
					
					<label>	Nama Lengkap</label>
					<input type="text" name="nama_pemesan" placeholder="Nama Lengkap" class="form-control" required>
				</div>	

				<div class="form-group">
                    <label>Nomor Meja</label>
                    <select class="form-control" name="nomor_meja" required>
                        <option selected>Pilih Meja</option>
                        <option value="MEJA 1">MEJA 1</option>
                        <option value="MEJA 2">MEJA 2</option>
                        <option value="MEJA 3">MEJA 3</option>
                        <option value="MEJA 4">MEJA 4</option>
                        <option value="MEJA 5">MEJA 5</option>
                        <option value="MEJA 6">MEJA 6</option>
                        <option value="MEJA 7">MEJA 7</option>
                    </select>
                </div>

                <div class="form-group">
					<label>	Nomor Telepon</label>
					<input type="tel" name="nomor_hp" placeholder="Nomor Telepon" class="form-control" pattern="^\d{12}$" required>
				</div>

				<div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-control" name="metode_pembayaran" required>
                        <option selected>Pilih Metode Pembayaran</option>
                        <option value="LinkAja">Link Aja</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>

                	<button type="submit" class="btn btn-sm btn-primary mb-3" >Pesan</button>

				</form>
				<?php 
 				
 				}else
 				{
 					echo "<h4>Keranjang Belanja Anda Masih Kosong</h4>";
 				}
				 ?>
		</div>

		<div class="col-md-2"></div>
	</div>
</div>