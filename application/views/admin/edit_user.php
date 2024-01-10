<div class="page-header">
	<h3>Data Pengguna</h3>
</div>
<?php foreach($user as $u) {?>
<form action="<?php echo base_url().'admin/update_user' ?>" method="post">
	<div class="form-group">
		<label>Nama Pengguna</label>
		<input class="form-control" type="text" name="nama_user" value="<?php echo $u->nama_user;?>" required>
		<input class="form-control" type="hidden" name="id_user" value="<?php echo $u->id_user;?>">
		<?php echo form_error('nama_user'); ?>
	</div>

	<div class="form-group">
		<label>Username *</label>
		<input class="form-control" type="text" name="username" value="<?php echo $u->username;?>" required>
		<?php echo form_error('username'); ?>
	</div>

	<div class="form-group">
		<label>Password *</label>
		<input class="form-control" type="password" name="password">
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
		<input type="button" value="Batal" class="btn btn-warning" onclick="window.location.href='<?php echo base_url()."admin/user";?>'">
	</div>
</div>
</form>
<?php } ?>