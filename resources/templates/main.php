<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/style/style.css" type="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="resources/js/jquery.js"></script>
	<script type="text/javascript" src="resources/js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript" src="resources/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="resources/js/myscript.js"></script>
	<script type="text/javascript" src="resources/js/jquery.nivo.slider.js"></script>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="title" content="" />
	<title>Calendar</title>
</head>
<body>
	<table align="center" width="980" cellpadding="0" cellspacing="0" border="0" id="main-table">
	<tr>
		<td id="menu">
		<div class="lk">Welcome, <strong>Alex!</strong> <a href="index.php?view=logout">Exit</a></div>
		<div class="menu" align="right"><a href="index.php?view=">Room1</a> <a href="index.php?view=">Room2</a> <a href="index.php?view=">Room3</a></div>
		</td>
	</tr>
	 
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
	</script>
<? //if ($view == 'index')
//{ 
?>
	<!--tr>
		<td id="header">
			<div id="slider" class="nivoSlider">
				<img src="resources/userfiles/header.png" alt="" />
				<img src="resources/userfiles/header2.png" alt="" />
				<img src="resources/userfiles/header3.png" alt="" />
			</div>
		</td>
	</tr-->
<?
//}
?>
	<tr>
		<td id="content">
			<? require_once ('resources/templates/'. $view. '.php');?>
			<div class="clear"></div>
			<div id="bottom-menu">
				<div align="center">
					&copy; 2015 Design by AlexSoft
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
</body>
</html>
