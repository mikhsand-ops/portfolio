
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daily Order</h6>
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
                   <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <center>
                </center>
                <br>
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <!-- <th>Nama</th>
                    <th>Nomor Hp</th>
                    <th>Nomor Meja</th> -->
                    <th>Metode Pembayaran</th> 
                    <th>Total Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
        <?php 

        $no=1;
           foreach ($keranjang as $x) {

        ?>
        <tr>
        <td><?php echo $no ++; ?></td>
        <!-- <td><?php echo $x->nama_pemesan; ?></td>
        <td><?php echo $x->nomor_hp; ?></td>
        <td><?php echo $x->nomor_meja; ?></td> -->
        <td><?php echo $x->metode_pembayaran; ?></td>
        <td><?php echo "Rp ".number_format($x->grand_total,0,"",".");?></td>

        <td>
         <button><a href="<?php echo base_url().'Ckasir/acctrans/'.$x->id_keranjang; ?>" target="_blank">Dibayar</a></button>
         <!-- <button><a href="<?php echo base_url().'Ckasir/hapustrans/'.$x->id_trans; ?>">Hapus</a></button> -->
      </td>
    </tr>
    <?php } ?>
              </table>
                  </div>

                  <div>
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <tr>
                    <th>Nama Pemesan</th>
                    <th>Merchant</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Nomor Meja</th>
                  </tr>

                  <?php 
                     foreach ($kodebayar as $x) { ?>
                  <tr>
                  <td><?php echo $x->nama_pemesan; ?></td>
                  <td><?php echo $x->nama_merchant; ?></td>
                  <td><?php echo $x->nama_menu; ?></td>
                  <td><?php echo "Rp ".number_format($x->total_harga,0,"",".");?></td>
                  <td><?php echo $x->nomor_meja; ?></td>
                </tr>
              <?php } ?>

                    </table>
                  </div>

                </div>

              </div>
              <!-- <table class="table table-bordered" border="1">
                <?php foreach ($kodebayar as $x) { ?>

                <th>Grand total : </th>
                <th><?php echo $x->grand_total; ?></th>
              <?php } ?>
              </table> -->
            </div>


            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
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
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
      <!-- End of Main Content -->

   <?php $this->load->view('theme/footerkasir');?>