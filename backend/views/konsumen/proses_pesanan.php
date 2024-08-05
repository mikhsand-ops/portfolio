<!DOCTYPE html>
<html>
<head>
	<title>Pesanan</title>
</head>
<body>
<div class="container-fluid">


<div class="alert alert-success">
	<p class="text-center align-middle">Selamat, Pesanan Anda Telah Berhasil Dibuat.
Silahkan Selesaikan Tagihan Pembayaran Anda Kekasir!!!</p>

	</div>

	<center>
		<big>KODE PESANAN ANDA :</big>
	
	<h1><big><?php foreach ($id as $x) { echo $x->id_keranjang; } ?></big></h1> 
	
</center>
	<div class="alert alert-danger">
	<p class="text-center align-middle">JANGAN TUTUP ATAU REFRESH HALAMAN INI SEBELUM MENYELESAIKAN PEMBAYARAN DI KASIR </p>

	</div>
</div>	
</body>
</html>
