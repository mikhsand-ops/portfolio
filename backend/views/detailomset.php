
 <?php $this->load->view('theme/headerkasir');?>

<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Merchant</title>


</head>
<body>
<center>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Transaksi Merchant</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <center>
                </center>
                <br>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                </thead>
				<?php 

        $no=1;
			     foreach ($omset as $x) {
          
				?>
		<tr>
				<td><?php echo $no ++; ?></td>
				<td><?php echo $x->id_trans; ?></td>
				<td><?php echo $x->nama_menu; ?></td>
				<td><?php echo $x->total_harga; ?></td>
        <td><?php echo $x->tgl_trans; ?></td>
<!--         <td><button><a href="<?php echo base_url()?>"></a>Detail</button></td> -->
		</tr>

		<?php } ?>
              </table>
              <br>
              <?php 
             //echo $this->pagination->create_links();
              ?>
            </div>
          </div>
        </div>
      </center>
</body>
</html>
 <?php $this->load->view('theme/footerkasir');?>
