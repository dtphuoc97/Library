<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<?php include('include_ad/head.php'); ?>
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
					<?php 
						echo ucwords($last_name.' '.$first_name).' - '.$email; 
					?>
					<a href="<?php echo base_url('access/logout'); ?>"><button class="btn btn-outline-info">Logout</button></a>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>