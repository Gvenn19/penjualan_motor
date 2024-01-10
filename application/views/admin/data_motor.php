<div class="page-header">
	<h3>Data Motor</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_motor'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Data Motor</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Jenis Motor</th>
				<th>Merk Motor</th>
				<th>Nama Motor</th>
				<th>Tahun</th>
				<th>Warna Motor</th>
				<th>Kondisi</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($motor as $m){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $m->kode_motor ?></td>
				<td><?php echo $m->jenis_motor ?></td>
				<td><?php echo $m->merk_motor ?></td>
				<td><?php echo $m->nama_motor ?></td>
				<td><?php echo $m->tahun_motor ?></td>
				<td><?php echo $m->warna_motor ?></td>
				<td><?php echo $m->kondisi_motor ?></td>
				<td><?php echo "Rp.".number_format($m->harga_motor) ?></td>
				<td><img src="<?php echo base_url().'/assets/upload/'.$m->gambar_motor; ?>" width="80" height="80" alt="gambar tidak ada"></td>
				<td><?php if($m->status_motor == 0){echo "<b>Tersedia</b>";}else{echo "<b>Sudah Terjual</b>";}?></td>
				<td nowrap="nowrap">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url().'admin/edit_motor/'.$m->kode_motor;?>"><span class="glyphicon glyphicon glyphicon-pencil"></span></a>
					<a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/hapus_motor/'.$m->kode_motor;?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>