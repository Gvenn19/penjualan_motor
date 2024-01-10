<div class="page-header">
	<h3>Tambah Data Pembeli</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_pembeli_act' ?>" method="post">
	<div class="form-group">
		<label>No. KTP *</label>
		<input class="form-control" type="text" name="id_ktp" required>
		<?php echo form_error('id_ktp'); ?>
	</div>

	<div class="form-group">
		<label>Nama *</label>
		<input class="form-control" type="text" name="nama_pembeli" required>
		<?php echo form_error('nama_pembeli'); ?>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin *</label><br>
		<input type="radio" name="jenis_kelamin" value="L"> Laki-Laki<br>
		<input type="radio" name="jenis_kelamin" value="P"> Perempuan
	</div>

	<div class="form-group">
		<label>Alamat *</label>
		<input class="form-control" type="textarea" name="alamat_pembeli" required>
	</div>

	<div class="form-group">
		<label>No Telp</label>
		<input class="form-control" type="text" name="telp_pembeli">
	</div>

	<div class="form-group">
		<label>No HP</label>
		<input class="form-control" type="text" name="hp_pembeli">
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
		<input type="button" value="Batal" class="btn btn-warning" onclick="window.location.href='<?php echo base_url()."admin/pembeli";?>'">
	</div>
</div>
</form>