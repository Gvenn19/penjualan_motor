<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Aplikasi Penjualan Sepeda Motor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js';?>"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-togglecollapsed" data-toggle="collapse" data-target="#bs-example-navbarcollapse-1" aria-expanded="true">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url().'admin';?>">APES</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbarcollapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url().'admin';?>"><span class="glyphicon glyphicon-home"></span> Dashboard <span class="sr-only">(Current)</span></a></li>
					<li><a href="<?php echo base_url().'admin/motor'; ?>"><span class="glyphicon glyphicon-folder-open"></span> Data Motor</a></li>
					<li><a href="<?php echo base_url().'admin/pembeli';?>"><span class="glyphicon glyphicon-user"></span> Data Pembeli</a></li>
					<li><a href="<?php echo base_url().'admin/transaksi';?>"><span class="glyphicon glyphicon-sort"></span> Transaksi Penjualan</a></li>
					<li><a href="<?php echo base_url().'admin/laporan';?>"><span class="glyphicon glyphicon-list-alt"></span> Laporan</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url().'admin/logout';?>"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
					<li class="dorpdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ariaexpanded="false"><?php echo "Halo, <b>".$this->session->userdata('nama')."</b>";?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'admin/ganti_password'?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">