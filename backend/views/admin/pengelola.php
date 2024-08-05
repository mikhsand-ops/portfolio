<div class="container-fluid">
  <div class="card 0-hidden border-0 shadow-lg my-5 col-sm mx-auto">
    <div class="card-body">

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Merchant</div>
                  <h2 class="number"><?= $this->db->get('merchant')->num_rows(); ?></h2>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Merchant Aktive</div>
                  <h2 class="number"><?= $this->db->get_where('merchant', ['status_merch' => '2'])->num_rows(); ?></h2>
                </div>
                <div class="col-auto">
                  <i class="fas fa-unlock-alt fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Merchant No Aktive</div>
                  <h2 class="" s="number"><?= $this->db->get_where('merchant', ['status_merch' => '1'])->num_rows(); ?>
                </div>
                <div class="col-auto">
                  <i class="fas fa-ban fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Merchant No Aktive</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                 <h2 class="number"><?= $this->db->get_where('merchant', ['status_merch' => '2'])->num_rows(); ?></h2>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-ban fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
 -->

      <!-- Content Row -->
      <!-- DATA TABLE-->




      <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
          <div class="card-body">
            <div class="row">
              <h5 class="fas fa-edit"> Data Merchant</h5><br><br>
              <div class="table-responsive m-b-40">

                <a href="<?php echo base_url('user/registration'); ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah Merchant</a>

                <div class="row">
                  <div class="col-md-5">
                    <form action="<?= base_url('user/index'); ?>" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off" autofocus>
                        <div class="input-group-append">
                          <input class="btn btn-primary " type="submit" name="submit"></input>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <h5> Hasil Pencarian : <?= $total_rows; ?></h5>

                <table class="table table-hover">
                  <thead class="thead-dark">

                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Nama Merchant</th>
                      <th>Kontak</th>
                      <th>Alamat</th>
                      <th>Tanggal Kontrak</th>
                      <th>Nomor Kios</th>
                      <th>Status</th>
                      <th colspan="3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($merchant)) : ?>
                      <tr>
                        <td colspan="9">
                          <div class="alert alert-danger" role="alert">
                            Hasil Pencarian Kosong!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach ($merchant as $me) : ?>
                      <tr>
                        <th><?= ++$start; ?></th>
                        <td><?= $me['nama'] ?></td>
                        <td><?= $me['nama_merchant'] ?></td>
                        <td><?= $me['no_hp'] ?></td>
                        <td><?= $me['alamat'] ?></td>
                        <td><?= $me['tanggal_kontrak'] ?></td>
                        <td><?= $me['nomor_kios'] ?></td>
                        <td><?= $me['status_merch'] ?></td>
                        <td><?php echo anchor('User/detail_merchant/' . $me['id_merchant'], '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
                        <td><a href="<?php echo base_url() . 'User/editmerchant/' . $me['id_merchant']; ?>">
                            <div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                          </a></td>

                        <td><?php echo anchor('User/hapusmerchant/' . $me['id_merchant'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></div>') ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?= $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>