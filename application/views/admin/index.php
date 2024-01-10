<div class="page-header">
	<h3>Dashboard</h3>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-folder-open"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<font size="18"><?php echo $this->m_penjualan->edit_data(array('status_motor'=>0),'motor')->num_rows(); ?><b></b></font>
						</div>
						<div><b>Jumlah Motor yang Tersedia</b></div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/motor' ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Detail</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-user"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<font size="18"><b><?php echo $this->m_penjualan->get_data('pembeli')->num_rows(); ?></b></font>
						</div>
						<div><b>Jumlah Pembeli yang Terdaftar</b></div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/pembeli' ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Detail</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-sort"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<font size="18"><b><?php echo $this->m_penjualan->get_data('trx_cash')->num_rows(); ?></b></font>
						</div>
						<div><b>Jumlah Motor yang Terjual</b></div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/transaksi'; ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Detail</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-user"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<font size="18"><b><?php echo $this->m_penjualan->get_data('user')->num_rows(); ?></b></font>
						</div>
						<div><b>Jumlah Pengguna Aplikasi</b></div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/user'; ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Detail</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

<!-- end of row -->