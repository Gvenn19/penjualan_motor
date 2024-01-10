<div class="page-header">
	<h3>Tambah Data User</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_user_act' ?>" method="post">
	<div class="form-group">
		<label>Nama Pengguna</label>
		<input class="form-control" type="text" name="nama_user" required>
		<?php echo form_error('nama_user'); ?>
	</div>

	<div class="form-group">
		<label>Username *</label>
		<input class="form-control" type="text" name="username" required>
		<?php echo form_error('username'); ?>
	</div>

	<div class="form-group">
		<label>Password *</label>
		<input class="form-control" type="password" name="password" required="true">
		<?php echo form_error('password'); ?>
	</div>

	<div class="form-group">
		<label>Konfirmasi Password *</label>
		<input class="form-control" type="password" name="konfirmasi_pass" required="true">
		<?php echo form_error('konfirmasi_pass'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
		<input type="button" value="Batal" class="btn btn-warning" onclick="window.location.href='<?php echo base_url()."admin/user";?>'">
	</div>
</div>
</form>
