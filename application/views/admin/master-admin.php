<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/').'css/admin/public_ad.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/').'css/all/public.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/').'css/all/form-input.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/').'bootstrap/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<mp:stylesheet/>
</head>
<body>
	<div class="my-topbar">
		<mp:topbar/>
	</div>
	<div class="my-center">
		<div class="container" style="margin: 1em auto;">
			<div class="row">
				<div class="my-leftMenu col-3">
					<mp:left-menu/>
				</div>
				<div class="my-centerContent col bg-light">
					<mp:center/>
				</div>
			</div>
		</div>	
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url('public/').'jquery-3.3.1.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/').'bootstrap/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<mp:javascript/>