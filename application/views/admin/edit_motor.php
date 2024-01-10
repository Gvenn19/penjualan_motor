<div class="page-header">
	<h3>Edit Motor</h3>
</div>
<?php foreach($motor as $m){ ?>
<form action="<?php echo base_url().'admin/update_motor' ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kode</label>
		<input class="form-control" type="text" name="kode_motor" value="<?php echo $m->kode_motor; ?>" readonly>
		<input class="form-control" type="hidden" name="status_motor" value="<?php echo $m->status_motor;?>">
		<?php echo form_error('kode_motor'); ?>
	</div>

	<div class="form-group">
		<label>Jenis Motor</label>
		<input class="form-control" type="text" name="jenis_motor" value="<?php echo $m->jenis_motor; ?>">
		<?php echo form_error('jenis_motor'); ?>
	</div>

	<div class="form-group">
		<label>Merk Motor</label>
		<input class="form-control" type="text" name="merk_motor" value="<?php echo $m->merk_motor; ?>">
		<?php echo form_error('merk_motor'); ?>
	</div>

	<div class="form-group">
		<label>Nama Motor</label>
		<input class="form-control" type="text" name="nama_motor" value="<?php echo $m->nama_motor; ?>">
		<?php echo form_error('nama_motor'); ?>
	</div>

	<div class="form-group">
		<label>Tahun</label>
		<input class="form-control" type="text" name="tahun_motor" value="<?php echo $m->tahun_motor; ?>" >
		<?php echo form_error('tahun_motor'); ?>
	</div>

	<div class="form-group">
		<label>Warna Motor</label>
		<input class="form-control" type="text" name="warna_motor" value="<?php echo $m->warna_motor; ?>">
		<?php echo form_error('warna_motor'); ?>
	</div>

	<div class="form-group">
		<label>Kondisi</label>
		<select name="kondisi_motor" class="form-control">
			<option <?php if($m->kondisi_motor == "BARU"){echo "selected='selected'";} echo $m->kondisi_motor; ?> value="BARU">Baru</option>
			<option <?php if($m->kondisi_motor == "BEKAS"){echo "selected='selected'";} echo $m->kondisi_motor; ?> value="BEKAS">Bekas</option>
		</select>
		<?php echo form_error('kondisi_motor'); ?>
	</div>

	<div class="form-group">
		<label>Harga</label>
		<input class="form-control" type="text" name="harga_motor" value="<?php echo $m->harga_motor; ?>">
		<?php echo form_error('harga_motor'); ?>
	</div>

	<div class="form-group">
	<label>Gambar</label>
		<?php
			if(isset($m->gambar_motor)){
				echo '<input type="hidden" name="old_pict" value="'.$m->gambar_motor.'">';
				echo '<img src="'.base_url().'assets/upload/'.$m->gambar_motor.'" width="30%">';
			}
		?>
		<input name="foto" type="file" class="form-control">
	</dir>
	<br>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btn-primary">
	</div>
</form>
<?php } ?>