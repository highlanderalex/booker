<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/style/style.css" type="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="resources/js/myscript.js"></script>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="title" content="" />
    <title><?=($view=='updateevent') ? 'EditEvent' : 'NewEvent'?></title>
</head>
<body bgcolor="#062134">
	<? require_once ('resources/templates/'. $view. '.php');?>
</body>
</html>
