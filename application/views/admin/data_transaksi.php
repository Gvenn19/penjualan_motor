<div class="page-header">
	<h3>Data Transaksi</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_transaksi'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Transaksi</a>
<a href="<?php echo base_url().'admin/cetak'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th><center>No</center></th>
				<th><center>Tgl Transaksi</center></th>
				<th><center>Kode Transaksi</center></th>
				<th><center>ID Pembeli</center></th>
				<th><center>Nama Pembeli</center></th>
				<th><center>Kode Motor</center></th>
				<th><center>Nama Motor</center></th>
				<th><center>Tahun Motor</center></th>
				<th><center>Warna Motor</center></th>
				<th><center>Harga Motor</center></th>
				<th><center>Jumlah Bayar</center></th>
				<th><center>Kembali</center></th>
				<th><center>Aksi</center></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($trx_cash as $t){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $t->tgl_trx ?></td>
				<td><?php echo $t->kode_trx ?></td>
				<td><?php echo $t->id_ktp ?></td>
				<td><?php echo $t->nama_pembeli ?></td>
				<td><?php echo $t->kode_motor ?></td>
				<td><?php echo $t->nama_motor ?></td>
				<td><?php echo $t->tahun_motor ?></td>
				<td><?php echo $t->warna_motor ?></td>
				<td><?php echo "Rp.".number_format($t->harga_motor) ?></td>
				<td><?php echo "Rp.".number_format($t->cash_harga) ?></td>
				<?php $kembali = ($t->cash_harga-$t->harga_motor);?>
				<td><?php echo "Rp.".number_format($kembali) ?></td>
				<td nowrap="nowrap" align="center">
					<a class="btn btn-danger btn-xs" href="<?php echo base_url().'admin/hapus_transaksi/'.$t->kode_trx;?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
