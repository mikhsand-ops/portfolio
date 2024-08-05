 
<!DOCTYPE html>
<html>
<head>
	<title>Pelaporan Limbah</title>


</head>
<body>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            DATA MENU</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <center>
          <a class="tombol" href="<?php echo base_url()?>Cmerch/indextambah">Tambah Menu Baru</a>
                </center>
                <br>
                <thead class="thead-dark">
                  <tr>
                    <th>NO</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
      <?php
      $no=1;
        foreach ($tambah as $x) {
      ?>
				<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $x->nama_menu; ?></td>
				<td><?php echo "Rp ".number_format($x->harga,0,"",".");?></td>
        <td><?php echo $x->status_menu; ?></td>
				<td>
				 <button><a href="<?php echo base_url().'Cmerch/Veditmenu/'.$x->id_menu; ?>">Edit</a></button>
				 <button><a href="<?php echo base_url().'Cmerch/single/'.$x->id_menu; ?>">Detail</a></button>
         <button><a href="<?php echo base_url().'Cmerch/aktif/'.$x->id_menu; ?>">Aktifkan</a></button>
         <button><a href="<?php echo base_url().'Cmerch/delete/'.$x->id_menu; ?>">Non-Aktifkan</a></button>
			</td>
		</tr>
  <?php } ?>

              </table>
            </div>
          </div>
        </div>
</body>
</html>
 <?php $this->load->view('theme/footer');?>
