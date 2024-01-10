<div class="page-header">
	<h3>Tambah Data Motor</h3>
</div>
<?= validation_errors('<p style="color:red;">','</p>'); ?>
<?php
if($this->session->flashdata())
	{
		echo "<div class='alert alert-danger alert-message'>";
		echo $this->session->flashdata('alert');
		echo "</div>";
	}
?>
<form action="<?php echo base_url().'admin/tambah_motor_act' ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kode *</label>
		<input type="text" name="kode_motor" class="form-control" value="<?= $kodeunik;?>" readonly>
		<?php echo form_error('kode_motor'); ?>
	</div>

	<div class="form-group">
		<label>Jenis Motor *</label>
		<input type="text" name="jenis_motor" class="form-control" required>
		<?php echo form_error('jenis_motor'); ?>
	</div>

	<div class="form-group">
		<label>Merk Motor *</label>
		<input type="text" name="merk_motor" class="form-control" required>
		<?php echo form_error('merk_motor'); ?>
	</div>

	<div class="form-group">
		<label>Nama Motor *</label>
		<input type="text" name="nama_motor" class="form-control" required>
		<?php echo form_error('nama_motor');?>
	</div>

	<div class="form-group">
		<label>Tahun *</label>
		<input type="text" name="tahun_motor" class="form-control" required>
		<?php echo form_error('tahun_motor');?>
	</div>

	<div class="form-group">
		<label>Warna Motor</label>
		<input type="text" name="warna_motor" class="form-control">
	</div>

	<div class="form-group">
		<label>Kondisi *</label>
		<select name="kondisi_motor" class="form-control">
			<option value="BARU">Baru</option>
			<option value="BEKAS">Bekas</option>
		</select>
		<?php echo form_error('kondisi_motor'); ?>
	</div>

	<div class="form-group">
		<label>Harga *</label>
		<input type="text" name="harga_motor" class="form-control" required>
		<?php echo form_error('harga_motor'); ?>
	</div>

	<div class="form-group">
		<label>Gambar</label>
		<input name="foto" type="file" class="form-control">	
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
		<input type="button" value="Batal" class="btn btn-warning" onclick="window.location.href='<?php echo base_url()."admin/motor";?>'">
	</div>
</div>
</form>