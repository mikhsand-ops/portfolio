<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!--++==++==++==++==++==++==++==++==++==++==FORM REGISTRATION DIBAWAH++==++==++==++==++==++==++==++==++==++==++==++==-->


            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Pendaftaran Merchant</h1>
                        </div>
                        <form class="horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>User/proses_tambah">

                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" class="form-control"  autofocus="autofocus" name="name" value="<?= set_value('nama'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control"  autofocus="autofocus" name="user" value="<?= set_value('user'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Merchant</label>
                                <input type="text"  autofocus="autofocus" class="form-control" id="nama_merchant" name="nama_merchant" value="<?= set_value('nama_merchant'); ?>">
                                <?= form_error('nama_merchant', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                           <!--  <div class="form-group">
                                <label> Email</label>
                                <input type="text" class="form-control " id="email" autofocus="autofocus" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div> -->

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="text" class="form-control form-control"  autofocus="autofocus" id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>">
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea type="text"  autofocus="autofocus" class="form-control form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>"></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>

                            <div class="form-group">
                                <label>Tanggal Kontrak</label>
                                <input type="date"  autofocus="autofocus" class="form-control form-control" id="tanggal_kontrak" name="tanggal_kontrak" value="<?= set_value('tanggal_kontrak'); ?>">
                                <?= form_error('tanggal_kontrak', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <label>Nomor Kios</label>
                                <select type="text" autofocus="autofocus" class="form-control" id="nomor_kios" name="nomor_kios" value="<?= set_value('nomor_kios'); ?>">
                                    <?= form_error('nomor_kios', '<small class="text-danger pl-3">', '</small>'); ?>

                                    <option selected>Pilih Toko</option>
                                    <option value="KIOS A">KIOS A</option>
                                    <option value="KIOS B">KIOS B</option>
                                    <option value="KIOS C">KIOS C</option>
                                    <option value="KIOS D">KIOS D</option>
                                    <option value="KIOS E">KIOS E</option>
                                    <option value="KIOS F">KIOS F</option>
                                    <option value="KIOS G">KIOS G</option>
                                    <option value="KIOS H">KIOS H</option>
                                    <option value="KIOS I">KIOS I</option>
                                    <option value="KIOS J">KIOS J</option>
                                    <option value="KIOS K">KIOS K</option>
                                    <option value="KIOS L">KIOS L</option>
                                    <option value="KIOS M">KIOS M</option>

                                </select>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>