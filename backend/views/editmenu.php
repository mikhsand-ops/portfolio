<?php 
$this->load->view('theme/headermech'); 
?>
				<div class="about-heading">
			
		</div>
	</div>
	<!-- //banner -->
	
	<div class="blog">
		<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-sm mx-auto">
        <div class="card-body">
            <!--++==++==++==++==++==++==++==++==++==++==FORM REGISTRATION DIBAWAH++==++==++==++==++==++==++==++==++==++==++==++==-->

            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-8">
                    <div class="p-5">

                        <h4 class="fas fa-edit">&nbsp &nbsp Edit Menu</h4><br><br>
 <form class="horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>Cmerch/editmenu/<?php echo $detail[0]->id_menu; ?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Menu</label>
                                <input type="text" class="form-control" required="required" autofocus="autofocus" name="nama" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Harga Menu</label>
                                <input type="text" required="required" autofocus="autofocus" class="form-control" id="nama_merchant" name="harga" value="<?= set_value('nama_merchant'); ?>">
                                <?= form_error('nama_merchant', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label> Deskripsi</label>
                                <input type="text" class="form-control " id="email" required="required" autofocus="autofocus" name="deskripsi" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select type="text" autofocus="autofocus" class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>">
                                    <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>

                                    <option selected>Pilih Kategori</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Gambar Menu</label>
                                <input type="file" class="form-control form-control" name="foto">

                            </div>


                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Edit Menu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
	</div>
	
	
	<?php $this->load->view('theme/footer'); ?>