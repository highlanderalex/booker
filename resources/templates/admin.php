<div style="margin-top:20px;"><p align="center"><a href="index.php?view=index"><button class="btn btn-default">Calendar</button></a></p></div>
<div style="color:red"><p align="center"><?=$this->error;?></p></div>
<div style="width:600px;margin:0 auto;">
	<table class="table table-striped">
		<tr>
			<td>NameUser</td>
			<td>EmailUser</td>
			<td>UpdateUser</td>
			<td>DeleteUser</td>
		</tr>
		<?php
			foreach($this->users as $user):
		?>
		<form action="index.php?view=admin" method="post">
		<tr>
			<td><input type="hidden" value="<?=$user['idUser'];?>" name="idUser"><input type="text" value="<?=$user['name'];?>" name="name" class="form-control"></td>
			<td><input type="text" value="<?=$user['email'];?>" name="email" class="form-control"></td>
			<td><input type="submit" value="Update" name="updateUser" class="btn btn-default"></td>
			<td><input type="submit" value="Delete" name="deleteUser" class="btn btn-default"></td>
		</tr>
		</form>
		<?php
			endforeach;
		?>
	</table>
</div>
<div>
	<p align="center"><a href="index.php?view=registration" style="text-decoration:none"><button class="btn btn-primary">AddUser</button></a></p>
</div>