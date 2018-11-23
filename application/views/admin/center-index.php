<?php 
	echo ucwords($last_name.' '.$first_name).' - '.$email; 
?>
<a href="<?php echo base_url('access/logout'); ?>"><button class="btn btn-outline-info">Logout</button></a>