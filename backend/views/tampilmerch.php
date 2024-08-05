
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
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <center>
                </center>
                <br>
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama Kios</th>
                    <th>Alamat</th>
                    <th>Omset</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
        <?php 

        $no=1;
           foreach ($merch as $x) {
          
        ?>
        
        <tr>
        <td><?php echo $no ++; ?></td>
        <td><?php echo $x->nama; ?></td>
        <td><?php echo $x->nama_merchant; ?></td>
        <td><?php echo $x->alamat; ?></td>
        <td><?php echo "Rp ".number_format($x->Omset,0,"",".");?></td>
        <td><button><a href="<?php echo base_url().'Ckasir/detailomsethari/'. $x->id_merchant; ?>">Detail</a></button>
          <button><a href="<?php echo base_url().'Ckasir/cetakomset/'. $x->id_merchant; ?>" target="_blank">Cetak</a></button></td>
    </tr>
    <?php } ?>
              </table>
              <br>
              <button><a href="<?php echo base_url();?>Ckasir/tampilmerch">Per-hari</a></button>
        <button><a href="<?php echo base_url();?>Ckasir/tampilmerchmingguan">Per-minggu</a></button>
        <button><a href="<?php echo base_url();?>Ckasir/tampilmerchbulanan">Per-bulan</a></button>
              <?php 
             //echo $this->pagination->create_links();
              ?>
            </div>
           <table class="table table-bordered" border="1">
              </table>
          </div>
        </div>
      </center>
</body>
</html>
 <?php $this->load->view('theme/footerkasir');?>