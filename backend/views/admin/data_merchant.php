<div class="container-fluid">
  <div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
    <div class="card-body">
      <div class="row">
        <h3 class="fas fa-edit">&nbsp DATA MERCHANT KANTIN FIT</h3><br><br>
        <div class="table-responsive m-b-40">
          <a href="<?php echo base_url('user/registration'); ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah Merchant</a>

          <div class="row">
            <div class="col-md-5">
              <form action="<?= base_url('user/index'); ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off" autofocus>
                  <div class="input-group-append">
                    <input class="btn btn-primary " type="submit" name="submit">
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
                <th>Logo</th>
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
                  <td><?php echo $me['nama'] ?></td>
                  <td><?php echo $me['nama_merchant'] ?></td>
                  <td><?php echo $me['no_hp'] ?></td>
                  <td><?php echo $me['alamat'] ?></td>
                  <td><?php echo $me['tanggal_kontrak'] ?></td>
                  <td><?php echo $me['nomor_kios'] ?></td>
                  <td><?php echo $me['logo_merchant'] ?></td>
                  <td><?php echo $me['status_merch'] ?></td>
                  <!-- <td><?php echo anchor('User/detail_merchant/' . $me['id_merchant'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> -->
                  <td><?php echo anchor('User/editmerchant/' . $me['id_merchant'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                  <td><?php echo anchor('User/hapusmerchant/' . $me['id_merchant'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></div>') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>