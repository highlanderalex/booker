<div style="width:700px;margin:0 auto;margin-top:30px;padding-bottom:10px;">
    <div style="float:left; font-size:1.8em;margin-left:10px;margin-right:10px;"><?= $_SESSION['nameRoom'];?></div>
    <div style="float:left;">
		<form action="index.php?view=index" method="post">
		<input type="hidden" name="type_week" value="1"><input type="submit" name="mon" value="Mon" class="btn btn-default">
	   </form>
	</div>
    <div style="float:left;">
		<form action="index.php?view=index" method="post">
		<input type="hidden" name="type_week" value="0"><input type="submit" name="sun" value="Sun" class="btn btn-default">
		</form>
	</div>
    <div style="float:left;">
		<form action="index.php?view=index" method="post">
		<input type="submit" name="prev" value="<<" class="btn btn-default">
	   </form>
	</div>
    <div style="float:left; font-size:1.8em;margin-left:10px;margin-right:10px;"><?=date('F', mktime(0,0,0, $_SESSION['month'])) . '-' . date('Y', mktime(0,0,0, $_SESSION['month'], 1, $_SESSION['year']));?></div>
	<div style="float:left;">
		<form action="index.php?view=index" method="post">
		<input type="submit" name="next" value=">>" class="btn btn-default">
		</form>
	</div>
	
	<div style="float:left;margin-left:10px;">
    <a href="javascript://" onclick="_open( 'index.php?view=addevent', 500 , 450 );"style="text-decoration:none"><button class="btn btn-primary"><?=$this->LANG_bookit;?></button></a>&nbsp;
<?php
    if ($_SESSION['statusUser'] == 1)
    {
?>
    <a href="index.php?view=admin" style="text-decoration:none"><button class="btn btn-primary"><?=$this->LANG_list;?></button></a>
<?php
    }
?>
</div>
</div>
<div class="cal" style="display:none; width:800px; margin:0 auto;margin-top:30px;"><img src="resources/img/<?=date('m', mktime(0,0,0, $_SESSION['month']));?>.jpg"></div>
<div class="cal" style="display:none;"><?=$this->calendar;?></div>



