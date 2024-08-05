 
<div class="container-fluid">
	 <h4>Daftar Merchant</h4>
	 <table class="table table-bordered table-hover table-striped">
	 	<tr>
	 		<th>Id Merchant</th>
	 		<th>Nama Merchant</th>
	 		<th>Nama Pemilik</th>
	 		<th>Nomor Hp</th>
	 		<th>Alamat</th>
	 		<th>Tanggal Kontrak</th>
	 		<th>Nomor Kios</th>
	 		<th>Detail</th>
	 	</tr>
	 	<?php foreach ($merchant as $psn ) : ?>
	 	<tr>
	 		<td><?php echo $psn->id_merchant ?></td>
	 		<td><?php echo $psn->nama_merchant ?></td>
	 		<td><?php echo $psn->nama ?></td>
	 		<td><?php echo $psn->no_hp ?></td>
	 		<td><?php echo $psn->alamat ?></td>
	 		<td><?php echo $psn->tanggal_kontrak ?></td>
	 		<td><?php echo $psn->nomor_kios ?></td>
	 		<td><a href="<?php echo base_url().'User/transaksi_merch/'.$psn->id_merchant; ?>"><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></a></td>
			
	 	</tr>
	 		
	 <?php endforeach; ?>

	</table>
</div>