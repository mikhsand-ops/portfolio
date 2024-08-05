 
<div class="container-fluid">
	 <h4>Report transaksi </h4>
	 <table class="table table-bordered table-hover table-striped">
	 	<tr>
	 		<th>Id Pesanan</th>
	 		<th>Nama Pemesan</th>
	 		<th>Nama Menu</th>
	 		<th>Nomor Meja</th>
	 		<th>Metode Pembayaran</th>
	 		<th>Tanggal Pemesanan</th>
	 	</tr>
	 	<?php foreach ($merchant as $psn ) : ?>
	 	<tr>
	 		<td><?php echo $psn->id_trans ?></td>
	 		<td><?php echo $psn->nama_pemesan ?></td>
	 		<td><?php echo $psn->nama_menu ?></td>
	 		<td><?php echo $psn->nomor_meja ?></td>
	 		<td><?php echo $psn->metode_pembayaran?></td>
	 		<td><?php echo $psn->tgl_trans ?></td>
			
	 	</tr>
	 		
	 <?php endforeach; ?>

	</table>
</div>