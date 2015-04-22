<?php
	//echo date('2015-04-21+7');
	$str = strtotime('2015-04-21');
	echo date('Y-m-d',($str+86400*7));
?>