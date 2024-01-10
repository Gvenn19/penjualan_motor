<div class="page-header">
	<h3>Data Pengguna Aplikasi</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_user'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Data Pengguna</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th><center>No</center></th>
				<th><center>Nama Pengguna</center></th>
				<th><center>Username</center></th>
				<th><center>Password</center></th>
				<th><center>Aksi</center></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($user as $u){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $u->nama_user ?></td>
				<td><?php echo $u->username ?></td>
				<td><?php echo $u->password ?></td>
				<td nowrap="nowrap" align="center">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url().'admin/edit_user/'.$u->id_user; ?>"><span class="glyphicon glyphicon glyphicon-pencil"> </span></a>
					<a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/hapus_user/'.$u->id_user;?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
