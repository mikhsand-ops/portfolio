  <div class="container-fluid">
      <div class="row">
          <div class="table-responsive m-b-40">
              <h3><i class="fas fa-fw fa-chart-area"></i>Keranjang Belanja</h3>
              <table class=" table table-bordered table-hover">
                  <thead class="thead-dark">
                      <tr>
                          <th>No</th>
                          <th>Nama Menu</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Sub-total</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($this->cart->contents() as $items) : ?>
                          <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $items['name'] ?></td>
                              <td><?php echo $items['qty'] ?></td>
                              <td>Rp.<?php echo number_format($items['price'],0,',','.') ?></td>
                              <td>Rp.<?php echo number_format($items['subtotal'],0,',','.')  ?></td>
                          </tr>   
                      <?php endforeach; ?>
                          <tr>
                              <td colspan="4">Total Belanja</td>
                              <td>Rp. <?php echo number_format($this->cart->total(),0,',','.') ?></td>
                          </tr>
                  </tbody>
              </table>
              <div align="right">
                <a href="<?php echo base_url('C_dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger"> Hapus Keranjang</div></a>
                <a href="<?php echo base_url('C_dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
                <a href="<?php echo base_url('C_dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
              </div>
          </div>
      </div>