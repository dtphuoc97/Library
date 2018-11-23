<!DOCTYPE html>
<html>
<head>
	<title>Users Manage</title>
	<?php include('include_ad/head.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('public/').'ajax/admin/user.js'; ?>"></script>
</head>
<body>
	<div class="my-topbar">
		<?php include('include_ad/topbar.php'); ?>
	</div>
	<div class="my-center">
		<div class="container" style="margin: 1em auto;">
			<div class="row">
				<div class="my-leftMenu col-3">
					<?php include('include_ad/left-menu.php'); ?>
				</div>
				<div class="my-centerContent col bg-light">
					<?php include('include_ad/center-user.php'); ?>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>