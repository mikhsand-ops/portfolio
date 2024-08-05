
 <?php $this->load->view('theme/headerkasir');?>

<!DOCTYPE html>
<html>
<head>
	<title>Pelaporan Transaksi</title>


</head>
<body>
<center>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Report Transaksi</div>
            <br/>
                  <form method="post" action="<?php echo base_url(); ?>Ckasir/filterreport">
                    <label>Pilih Tanggal</label>
                    <input type="date" name="tanggal">
                    <input type="submit" value="FILTER">
                  </form>
                  <br/>

                  <form method="post" action="<?php echo base_url(); ?>Ckasir/filterbulan">
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
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <center>
                </center>
                <br>
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Merchant</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>

                <button><a href="<?php echo base_url();?>Ckasir/reportkantin">Per-hari</a></button>
        <button><a href="<?php echo base_url();?>Ckasir/kantinmingguan">Per-minggu</a></button>
        <button><a href="<?php echo base_url();?>Ckasir/kantinbulanan">Per-bulan</a></button>
				<?php 

        $no=1;
			     foreach ($total as $x) {
          
				?>
				<tr>
				<td><?php echo $no ++; ?></td>
				<td><?php echo $x->nama_merchant; ?></td>
				<td><?php echo $x->nama_menu; ?></td>
				<td><?php echo "Rp ".number_format($x->total_harga,0,"",".");?></td>
        <td><?php echo $x->tgl_trans; ?></td>
        <td><?php echo $x->keterangan; ?></td>
		</tr>
		<?php } ?>
              </table>
              <br>
              <?php 
             //echo $this->pagination->create_links();
              ?>
            </div>
           <table class="table table-bordered" border="1">
                <?php
                  foreach ($omset as $x) {

                ?>

                <th>Omset :</th>
                <th><?php echo $x->Omset; ?></th>
              <?php } ?>
              </table>
          </div>
        </div>
      </center>
</body>
</html>
 <?php $this->load->view('theme/footerkasir');?>
