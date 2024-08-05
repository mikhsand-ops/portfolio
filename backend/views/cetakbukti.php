<?php $this->load->view('theme/headercetak');?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Bukti</title>
</head>
<style type="text/css">
@media print{
	#tbl1 {background-color:#f6c23e;}
	body {-webkit-print-color-adjust: exact;}
}
</style>
<body>
	
<div class="table-responsive">
				<table align=center class="table table-bordered" width="50%" cellspacing="0">
					
				<tr>
					<th><strong>Nama Pemesan</strong></th>
					<th><strong>Nomor Hp</strong></th>
					<th><strong>Nama Merchant</strong></th>
					<th><strong>Nama Menu</strong></th>
					<th><strong>Total Harga</strong></th>
					<th><strong>Nomor Meja</strong></th>
					<th><strong>Metode Pembayaran</strong></th>
				</tr>
<?php

	foreach ($cetak as $x) {

	?>
				<tr>
					<td><?php echo $x->nama_pemesan; ?></td>
					<td><?php echo $x->nomor_hp; ?></td>
					<td><?php echo $x->nama_merchant; ?></td>
					<td><?php echo $x->nama_menu; ?></td>
					<td><?php echo $x->total_harga; ?></td>
					<td><?php echo $x->nomor_meja; ?></td>
					<td><?php echo $x->metode_pembayaran; ?></td>
				</tr>
				<?php } ?>

				</table>
			
				</div>
</body>
<?php echo "<script> 
				window.print()
			</script>"; ?>

</html>

