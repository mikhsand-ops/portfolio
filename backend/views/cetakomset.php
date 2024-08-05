<?php $this->load->view('theme/headercetak');?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Omset</title>
</head>
<style type="text/css">
@media print{
	#tbl1 {background-color:#f6c23e;}
	body {-webkit-print-color-adjust: exact;}
}
</style>
<body>
	<?php

	foreach ($cetak as $x) {

	?>
<div class="table-responsive">
				<table align=center class="table table-bordered" width="50%">
					
				<tr>
					<th><strong>Nama Kios</strong></th>
					<th><strong>Omset Hari Ini</strong></th>
					<th><strong>Bagi Hasil 15%</strong></th>
					<th><strong>Total</strong></th>
				</tr>

				<tr>
					<td><?php echo $x->nama_merchant; ?></td>
					<td><?php echo $x->total_harga; ?></td>
					<td><?php $bagi = ($x->total_harga/100)*15;
							echo $bagi; ?></td>
					<td><?php $bagi = ($x->total_harga/100)*15;
								$total=$x->total_harga-$bagi;
							echo $total; ?></td>
				</tr>

				</table>
			
				</div>
</body>
<?php echo "<script> 
				window.print()
			</script>"; ?>
<?php } ?>
</html>

