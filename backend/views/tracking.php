
 <?php $this->load->view('theme/headerkasir');?>

<!DOCTYPE html>
<html>
<head>
	<title>Tracking Transaksi</title>


</head>
<body>
<center>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tracking Transaksi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <center>
                </center>
                <br>
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Tanggal Update</th>
                    <th>Status Lama</th>
                    <th>Status Baru</th>
                  </tr>
                </thead>
				<?php 

        $no=1;
			     foreach ($data as $x) {
          
				?>
				<tr>
				<td><?php echo $no ++; ?></td>
				<td><?php echo $x->id_trans; ?></td>
				<td><?php echo $x->tgl_update; ?></td>
				<td><?php echo $x->statLama; ?></td>
				<td><?php echo $x->statBaru; ?></td>
		</tr>
		<?php } ?>
              </table>
              <br>
              <?php 
             echo $this->pagination->create_links();
              ?>
            </div>
          </div>
        </div>
      </center>
</body>
</html>
 <?php $this->load->view('theme/footerkasir');?>
