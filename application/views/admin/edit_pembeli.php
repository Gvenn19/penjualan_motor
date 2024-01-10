<div class="page-header">
	<h3>Edit Data Pembeli</h3>
</div>
<?php foreach($pembeli as $p){ ?>
<form action="<?php echo base_url().'admin/update_pembeli' ?>" method="post">
	<div class="form-group">
		<label>No. KTP *</label>
		<input class="form-control" type="text" name="id_ktp" value="<?php echo $p->id_ktp; ?>">
		<?php echo form_error('id_ktp'); ?>
	</div>

	<div class="form-group">
		<label>Nama Pembeli *</label>
		<input class="form-control" type="text" name="nama_pembeli" value="<?php echo $p->nama_pembeli; ?>">
		<?php echo form_error('nama_pembeli'); ?>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin *</label><br>
		<input type="radio" name="jenis_kelamin" <?php if($p->jenis_kelamin == "L"){echo "checked='checked'";} echo $p->jenis_kelamin; ?> value="L"> Laki-Laki<br>
		<input type="radio" name="jenis_kelamin" <?php if($p->jenis_kelamin == "P"){echo "checked='checked'";} echo $p->jenis_kelamin; ?> value="P"> Perempuan
		<?php echo form_error('jenis_kelamin'); ?>
	</div>

	<div class="form-group">
		<label>Alamat *</label>
		<input class="form-control" type="text" name="alamat_pembeli" value="<?php echo $p->alamat_pembeli; ?>">
		<?php echo form_error('alamat'); ?>
	</div>

	<div class="form-group">
		<label>No Telp</label>
		<input class="form-control" type="text" name="telp_pembeli" value="<?php echo $p->telp_pembeli; ?>">
	</div>

	<div class="form-group">
		<label>No HP</label>
		<input class="form-control" type="text" name="hp_pembeli" value="<?php echo $p->hp_pembeli; ?>" >
	</div>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btn-primary">
	</div>
</form>
<?php } ?>