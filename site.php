<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style/style.css" type="text/css" />
<!--link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'-->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/myscript.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<meta name="keywords" content="<?=$page_data['keywords'];?>" />
<meta name="description" content="<?=$page_data['description'];?>" />
<meta name="title" content="<?=$page_data['title'];?>" />
<title><?=$page_data['title'];?></title>

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
    
        
        <div id="login-form">
            <? if (!isset($_SESSION['username'])) {?>
            <form action="index.php?view=login_cab" method="post">
                <input type="text" name="login" value="<?=lang('login');?>" onfocus="this.value=''" onclick="" />
                <input type="password" name="password" value="пароль" onfocus="this.value=''" onclick="" />
                <input type="submit" name="enter" value="<?=lang('enter');?>" class="enter" />
            </form>
            <div id="reg-links"><a href="index.php?view=signup"><?=lang('signup');?></a><a href="index.php?view=forgot"><?=lang('forgot');?></a></div>
        &nbsp;
        
        <?
        } 
        else 
        { 
        ?>
        <div class="lk">Приветствуем, <strong><?=$_SESSION['username'];?>!</strong> <a href="index.php?view=exit_cab">Выйти</a></div>
        <?}?>
        </div>
        <div class="menu" align="right">
            <?
            $menu = get_menu($_SESSION['lang']);
            foreach ($menu as $item) :
            ?>
            <a href="index.php?view=<?=$item['title_url'];?>" <? if ($view == $item['title_url']) print "class='menu-active'";?>><?=$item['title'];?></a>
            <? endforeach;?>
        </div>
            
            
    </td>
</tr>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<? if ($view == 'index'){ ?>
<tr>
	<td id="header">
        <div id="slider" class="nivoSlider">
            <img src="userfiles/header.png" alt="" />
            <img src="userfiles/header2.png" alt="" />
            <img src="userfiles/header3.png" alt="" />
        </div>
    </td>
</tr>
<?}?>
<tr>
	<td id="content">
    
        <? require_once ($_SERVER['DOCUMENT_ROOT'] . '/mega/views/pages/'. $view. '.php');?>
  
  
        <div class="clear"></div>
        <div id="bottom-menu">
            <div align="center">
            <?
            $menu = get_menu($_SESSION['lang']);
            foreach ($menu as $item) :
            ?>
            <a href="index.php?view=<?=$item['title_url'];?>" <? if ($view == $item['title_url']) print "class='menu-active2'";?>><?=$item['title'];?></a>
            <? endforeach;?>
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
