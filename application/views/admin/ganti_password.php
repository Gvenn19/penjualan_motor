<div class="page-header">
	<h3>Ganti Password</h3>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "berhasil"){
					echo "<div class='alert alert-success'>Password berhasil diganti.</div>";
				}else if($_GET['pesan'] == "gagal"){
					echo "<div class='alert alert-danger alert-dismissible'>";
					echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}
			}
		?>
		<form action="<?php echo base_url().'admin/ganti_password_aksi';?>" method="post">
			<div class="form-group">
				<label>Password Baru</label>
				<input class="form-control" type="password" name="pass_baru">
				<?php echo form_error('pass_baru');?>
			</div>

			<div class="form-group">
				<label>Ulangi Password Baru</label>
				<input class="form-control" type="password" name="ulang_pass">
				<?php echo form_error('ulangi_pass');?>
			</div>

			<div class="form-group">
				<input class="btn btn-primary btn-sm" type="submit" value="Simpan">
			</div>
		</form>
	</div>
</div>