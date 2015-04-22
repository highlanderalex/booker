<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/style/style.css" type="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="resources/js/jquery.js"></script>
	<script type="text/javascript" src="resources/js/myscript.js"></script>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="title" content="" />
    <title><?=$this->LANG_calendar;?></title>
</head>
<body>
	<div id="lang">
		<form action="" method="post">
			<input type="hidden" name="lang" value="ru" />
			<input type="submit" name="change_lang" value="RU"  <?=($_SESSION['lang']=='ru') ? "class='lang-active'" : "";?> />
		</form>
		<form action="" method="post">
			<input type="hidden" name="lang" value="en" />
			<input type="submit" name="change_lang" value="EN" <?=($_SESSION['lang']=='en') ? "class='lang-active'" : "";?> />
		</form>   
	</div>
	<table align="center" width="980" cellpadding="0" cellspacing="0" border="0" id="main-table">
	<tr>
        <td id="menu">
        <?php
            if($_SESSION['idUser'])
            {
        ?>
            <div class="lk"><?=$this->LANG_welcome;?>&nbsp;<strong><?=$_SESSION['nameUser'];?></strong> <a href="index.php?view=logout"><?=$this->LANG_exit;?></a></div>
        <?php
            }
        ?>
    <?php
        if ($view == 'index')
        {
    ?>
        <div class="menu" align="right">
        <?php
            foreach($this->linkRooms as $room):
        ?>
        <a href="index.php?view=index&idRoom=<?=$room['idRoom']?>"><?=$room['name']?></a>
        <?php
            endforeach;
        ?>
        </div>
    <?php
        }
    ?>
		</td>
	</tr>
	<tr>
		<td id="content">
			<div style="min-height:600px;"><? require_once ('resources/templates/'. $view. '.php');?></div>
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
