<div style="margin-top:20px;"><p align="center"><a href="index.php?view=index"><button class="btn btn-default"><?=$this->LANG_calendar;?></button></a></p></div>
<div style="color:red"><p align="center"><?=$this->error;?></p></div>
<div style="width:600px;margin:0 auto;">
	<table class="table table-striped">
		<tr>
        <td><?=$this->LANG_nameuser;?></td>
        <td><?=$this->LANG_emailuser;?></td>
        <td><?=$this->LANG_upduser;?></td>
        <td><?=$this->LANG_deluser;?></td>
		</tr>
		<?php
			foreach($this->users as $user):
		?>
		<form action="index.php?view=admin" method="post">
		<tr>
			<td><input type="hidden" value="<?=$user['idUser'];?>" name="idUser"><input type="text" value="<?=$user['name'];?>" name="name" class="form-control"></td>
			<td><input type="text" value="<?=$user['email'];?>" name="email" class="form-control"></td>
            <td><input type="submit" value="<?=$this->LANG_update;?> " name="updateUser" class="btn btn-default"></td>
            <td><input type="submit" value="<?=$this->LANG_delete;?>" name="deleteUser" class="btn btn-default"></td>
		</tr>
		</form>
		<?php
			endforeach;
		?>
	</table>
</div>
<div>
<p align="center"><a href="index.php?view=registration" style="text-decoration:none"><button class="btn btn-primary"><?=$this->LANG_adduser;?></button></a></p>
</div>
