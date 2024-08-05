<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT MERCHANT</h3>

	<?php foreach ($merchant as $merch) : ?>
		<form method="post" action="<?php echo base_url() . 'user/update' ?>">

			<div class="form-group">
				<label> Nama </label>
				<input type="text" name="name" class="form-control" value="<?php echo $merch->nama ?>">
			</div>

			<div class="form-group">
				<label> Nama Merchant</label>
				<input type="hidden" name="id_merchant" class="form-control" value="<?php echo $merch->id_merchant ?>">
				<input type="text" name="nama_merchant" class="form-control" value="<?php echo $merch->nama_merchant ?>">
			</div>

			<div class="form-group">
				<label> Alamat </label>
				<input type="hidden" name="id_merchant" class="form-control" value="<?php echo $merch->id_merchant ?>">
				<input type="text" name="alamat" class="form-control" value="<?php echo $merch->alamat ?>">
				<!-- <textarea type="text" name="alamat" class="form-control" value="<?php echo $merch->alamat ?>"></textarea> -->
			</div>

			<div class="form-group">
				<label> Tanggal Kontrak </label>
				<input type="date" name="tanggal_kontrak" class="form-control" value="<?php echo $merch->tanggal_kontrak ?>">
			</div>

			<div class="form-group">
				<label>Nomor Kios</label>
				<input type="hidden" name="id_merchant" class="form-control" value="<?php echo $merch->id_merchant ?>">
				<select type="text" class="form-control" id="nomor_kios" name="nomor_kios" value="<?= set_value('nomor_kios'); ?>">
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
			</div>


			<div class="form-group">
				<label>Status</label>
				<select type="text" class="form-control" id="status" name="status" value="<?= set_value('status_merch'); ?>">

				  <option selected>--Status--</option>
                  <option value="KIOS A">Aktif</option>
                  <option value="KIOS B">Non-aktif</option>
              </select>
			</div>

			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>

		</form>

	<?php endforeach;  ?>
</div>