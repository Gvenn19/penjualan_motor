<div class="page-header">
	<h3>Data Transaksi Baru</h3>
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
<form action="<?php echo base_url().'admin/tambah_transaksi_act' ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Tanggal Transaksi *</label>
		<input type="date" name="tgl_trx" class="form-control" required="true">
		<?php echo form_error('tgl_trx'); ?>
	</div>

	<div class="form-group">
		<label>Kode Transaksi *</label>
		<input type="text" name="kode_trx" class="form-control" value="<?= $kode_unik_trx;?>" readonly>
		<?php echo form_error('kode_trx'); ?>
	</div>

	<div class="form-group">
		<label>Pembeli *</label>
		<a href="<?php echo base_url().'admin/tambah_pembeli_baru'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></a>
		<select name="id_ktp" class="form-control" required="true">
			<option value="">-Pilih Pembeli-</option>
			<?php foreach($pembeli as $p){ ?>
			<option value="<?php echo $p->id_ktp; ?>"><?php echo $p->id_ktp." - ".$p->nama_pembeli; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_ktp'); ?>
	</div>

	<div class="form-group">
		<label>Motor *</label>
		<select name="kode_motor" class="form-control" required="true">
			<option value="">-Pilih Motor-</option>
			<?php foreach($motor as $m){ ?>
			<option value="<?php echo $m->kode_motor; ?>"><?php echo $m->kode_motor." - ".$m->nama_motor." - "."Rp.".number_format($m->harga_motor); ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('kode_motor'); ?>
	</div>

	<div class="form-group">
		<label>Jumlah Bayar *</label>
		<input type="text" name="cash_harga" class="form-control" required="true">
		<?php echo form_error('cash_harga');?>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
		<input type="button" value="Batal" class="btn btn-warning" onclick="window.location.href='<?php echo base_url()."admin/transaksi";?>'">
	</div>
</div>
</form>