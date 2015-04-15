<div style="width:400px;margin:0 auto;margin-top:50px;padding-bottom:10px;">
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
    <div style="float:left; font-size:1.8em;margin-left:10px;margin-right:10px;"><?=date('F', mktime(0,0,0, $_SESSION['month'])) . '-' . $_SESSION['year'];?></div>
	<div style="float:left;">
		<form action="index.php?view=index" method="post">
		<input type="submit" name="next" value=">>" class="btn btn-default">
		</form>
	</div>
</div>
<div style="margin-top:50px;"><?=$this->calendar;?></div>

<div style="width:200px;margin:0 auto; margin-top:20px;margin-bottom:50px;">
<p><a href="index.php?view=addEvent" style="color:#062134;font-size:1.5em;border:1px solid #062134;text-decoration:none">BookIt</a>&nbsp;&nbsp;&nbsp;
<a href="index.php?view=adminPanel" style="color:#062134;font-size:1.5em;border:1px solid #062134;text-decoration:none">ListEmployee</a></p>
</div>
