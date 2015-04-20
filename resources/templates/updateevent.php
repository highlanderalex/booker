<div style="color:#000;">
<h4 align="center" style="color:#fff;">B.B. DETAILS</h4>
<br />
<div style="color:#red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=updateevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
		<td><span style="color:#fff;">Date:</span></td>
		<td><input id="datepicker" type="text" placeholder="" name="date" value="" size="40"><br/></td>
	</tr>
	<tr>
        <td><span style="color:#fff;">When:</span></td>
		<td>
			<select name="startHour">
				<option selected>00</option>
				<option>01</option>
				<option>02</option>
			</select>
			<select name="startMin">
				<option selected>00</option>
				<option>01</option>
				<option>02</option>
			</select><span style="color:#fff;"> - </span>
			<select name="endHour">
				<option selected>00</option>
				<option>01</option>
				<option>02</option>
			</select>
			<select name="endMin">
				<option selected>00</option>
				<option>01</option>
				<option>02</option>
			</select>
			<br/>
		</td>
	</tr>
	<tr>
		<td><span style="color:#fff;">Notes:</span></td>
		<td><input type="text" placeholder="" name="title" value="" size="40"><br/></td>
	</tr>
	<tr>
		<td><span style="color:#fff;">Who:</span></td>
		<td>
			<select name="idUser" style="color:#000;">
				<option selected>Admin</option>
				<option>Alex</option>
				<option>Anna</option>
			</select><br/>
		</td>
	</tr>
	<tr>
		<td align="right"><input type="checkbox" class="form-control"></td>
		<td><span style="color:#fff;">Apply to all occurences?</span></td>
	</tr>
</table>
<br />
<p align="center"><a href="index.php?view=addEvent" style="text-decoration:none"><button class="btn btn-primary">Update</button></a>&nbsp;&nbsp;
<a href="index.php?view=admin" style="text-decoration:none"><button class="btn btn-primary">Delete</button></a></p>
</form>
</div>