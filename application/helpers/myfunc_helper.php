<?php 
	function cvt_level($lvl)
	{
		switch ($lvl) {
			case 0:
				return 'Wait confirm';
				break;
			case 1:
				return 'Member';
				break;
			case 2:
				return 'Admin';
				break;	
			default:
				return 'Error';
				break;
		}
	}
?>