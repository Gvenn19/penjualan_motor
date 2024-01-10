<div class="page-header">
	<h3>Data Pembeli</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_pembeli'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Data Pembeli</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Pembeli</th>
				<th>Nama Pembeli</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>No. Telp</th>
				<th>No. HP</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($pembeli as $p){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $p->id_ktp ?></td>
				<td><?php echo $p->nama_pembeli ?></td>
				<td><?php echo $p->jenis_kelamin ?></td>
				<td><?php echo $p->alamat_pembeli ?></td>
				<td><?php echo $p->telp_pembeli ?></td>
				<td><?php echo $p->hp_pembeli ?></td>
				<td nowrap="nowrap" align="center">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url().'admin/edit_pembeli/'.$p->id_ktp; ?>"><span class="glyphicon glyphicon glyphicon-pencil"> </span></a>
					<a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/hapus_pembeli/'.$p->id_ktp;?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>