
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pesanan Hari  

                    <script type='text/javascript'>

var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

var date = new Date();

var day = date.getDate();

var thisDay = date.getDay();

    thisDay = myDays[thisDay];

var month = date.getMonth();

var yy = date.getYear();

var year = (yy < 1000) ? yy + 1900 : yy;

document.write(thisDay+ ', ' + day + ' ' + months[month] + ' ' + year);

</script>
                  <!-- <?php

                    $hari = array(" ","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");

                   foreach ($menu as $y) {
                    $date = date('D',strtotime($y->tgl_trans));
                    if ($date=='Mon') {
                      echo $hari[1];
                       
                     }elseif ($date=='Tue') {
                      echo "string";
                       
                     } } ?> --> 

                   </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <table class="table table-bordered table-hover" border="1">
                  <thead class="thead-dark">
                    <tr>
                      <th>No</th>
                      <th>Nama Pemesan</th>
                      <th align="center">Menu</th>
                      <th>Nomor Meja</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <?php 
                      $no=1;
                  foreach ($menu as $y) {
                    
                  ?>
                  <tr align="center">
                    <td><?php echo $no ++; ?></td>
                    <td><?php echo $y->nama_pemesan; ?></td>
                    <td><?php echo $y->nama_menu; ?></td>
                    <td><?php echo $y->nomor_meja; ?></td>
                    <td><?php echo "Rp ".number_format($y->total_harga,0,"",".");?></td>
                    <td align="center"><button><a href="<?php echo base_url().'Cmerch/proses/'.$y->id_trans; ?>">Selesai</a></button></td>
                  </tr>
                  <?php } ?>
                </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Bulan 
                    <script type="text/javascript">
                      
                      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                      var month = date.getMonth();
                      document.write(months[month] + ' ' + year);
                    </script>
                  <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->
                </div>
                <!-- Card Body -->
                
                 <div class="col-md-10 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan Bruto (Omzet)</div>
              <h3 class="number"><?php foreach ($total as $x) { ?>

                 <?php echo "Rp ".number_format($x->Omset,0,"",".");?></h3><?php } ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-coins fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-10 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Transaksi</div>
              <h2 class="number"><?php foreach ($jumlah as $x) {echo $x->jumlah; } ?></h2>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>

      </div>
      <!-- End of Main Content -->

   <?php $this->load->view('theme/footerkasir');?>