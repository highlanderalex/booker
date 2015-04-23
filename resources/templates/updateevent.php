<div style="color:#000;">
<h4 align="center" style="color:#fff;"><?=$this->LANG_details;?></h4>
<?php
    if ( '' == $this->success )
    {
?>
<div style="color:red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=updateevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
		<td></td>
        <td>
			<input type="hidden" name="idEvent" value="<?=(isset($_POST['idEvent'])) ? $_POST['idEvent'] : $this->item['idEvent'];?>">
			<input type="hidden" name="name" value="<?=(isset($_POST['name'])) ? $_POST['name'] : $this->item['name'];?>">
			<input type="hidden" name="date" value="<?=(isset($_POST['date'])) ? $_POST['date'] : $this->item['date'];?>">
			<input type="hidden" name="iUser" value="<?=(isset($_POST['iUser'])) ? $_POST['iUser'] : $this->item['idUser'];?>">
			<input type="hidden" name="idPar" value="<?=(isset($_POST['idPar'])) ? $_POST['idPar'] : $this->item['idPar'];?>">
			<br/>
		</td>
	</tr>
	<tr>
    <td><span style="color:#fff;"><?=$this->LANG_when;?></span></td>
		<td>
            <select name="startHour">
            <?php
                for ( $i=0; $i < 24; $i++):
                if ( $i < 10 )
                {
                    $i = '0' . $i;
                }
            ?>
            <option value="<?=$i;?>" <?=($_POST['startHour']==$i || $i==$this->item['startHour']) ? 'selected' : ''?>><?=$i;?></option>
            <?php
                endfor;
            ?>
			</select>
            <select name="startMin">
            <?php
                for ( $i=0; $i<31; $i+=30):
                    if ( 0 == $i )
                    {
                        $i = '0' . $i;
                    }
            ?>
                <option value="<?=$i;?>" <?=($_POST['startMin']==$i || $i==$this->item['startMin']) ? 'selected' : ''?>><?=$i;?></option>
            <?php
                endfor;
            ?>
                </select>
				<select name="typestart">
					<option value="AM" <?=($_POST['typestart'] == 'AM') ? 'selected' : ''?>>AM</option>
					<option value="PM" <?=($_POST['typestart'] == 'PM') ? 'selected' : ''?>>PM</option>
				</select>
            <br />
			<select name="endHour">
            <?php
                for ( $i=0; $i < 24; $i++):
                if ( $i < 10 )
                {
                    $i = '0' . $i;
                }
            ?>
            <option value="<?=$i;?>" <?=($_POST['endHour']==$i || $i==$this->item['endHour']) ? 'selected' : '' ?>><?=$i;?></option>
            <?php
                endfor;
            ?>
            </select>
			<select name="endMin">
		     <?php
                for ( $i=0; $i<31; $i+=30):
                    if ( 0 == $i )
                    {
                        $i = '0' . $i;
                    }
            ?>
                <option value="<?=$i;?>" <?=($_POST['endMin']==$i || $i==$this->item['endMin']) ? 'selected' : ''?>><?=$i;?></option>
            <?php
                endfor;
            ?>
			</select>
			<select name="typeend">
				<option value="AM" <?=($_POST['typeend'] == 'AM') ? 'selected' : ''?>>AM</option>
				<option value="PM" <?=($_POST['typeend'] == 'PM') ? 'selected' : ''?>>PM</option>
			</select>
			<br/>
		</td>
	</tr>
	<tr>
    <td><span style="color:#fff;"><?=$this->LANG_notes;?></span></td>
        <td><input type="text" placeholder="" name="title" value="<?=(isset($_POST['title'])) ? $_POST['title'] : $this->item['title'];?>" size="40"><br/></td>
	</tr>
	<tr>
    <td><span style="color:#fff;"><?=$this->LANG_who;?></span></td>
		<td>
        <?php
            if ($_SESSION['statusUser'] == 0)
            {
            ?>    
			<span style="color:#fff;"><?=(isset($_POST['name'])) ? $_POST['name'] : $this->item['name'];?></span><br/>
        <?php
            }
            else
            {
        ?>
            <select name="idUser">
            <?php
                foreach($this->users as $user):
            ?>
            <option value="<?=$user['idUser']?>" <?=($_POST['idUser']==$user['idUser'] || $user['idUser']==$this->item['idUser']) ? 'selected' : '' ?>><?=$user['name'];?></option>
            <?php
                endforeach;
            ?>
            </select>
            <?php
            }
            ?>
		</td>
	</tr>
	<?php
		if ((($this->item['idPar'] || $_POST['idPar']) && ($_SESSION['statusUser'] == 1 || $_SESSION['idUser'] == $_POST['iUser'])) ||
			(($this->item['idPar'] || $_POST['idPar']) && ($_SESSION['statusUser'] == 1 || $_SESSION['idUser'] == $this->item['idUser'])))
		{
	?>
	<tr>
		<td align="right"><input type="checkbox" name="rc" value="1" <?=($_POST['rc']) ? 'checked' : '';?>></td>
        <td><span style="color:#fff;"><?=$this->LANG_apply;?></span></td>
	</tr>
	<?php
	}
	?>
</table>
<br />
<?php
	if(($this->item['date'] >= date('Y-m-d') || $_POST['date'] >= date('Y-m-d')) &&
		($_SESSION['idUser'] == $this->item['idUser'] || $_SESSION['idUser'] == $_POST['iUser']) ||
		((($this->item['date'] >= date('Y-m-d') || $_POST['date'] >= date('Y-m-d')) && ($_SESSION['statusUser'] == 1))))
    {
?>
    <p align="center"><input type="submit" class="btn btn-primary" value="<?=$this->LANG_update;?>" name="updateevent">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="<?=$this->LANG_delete;?> " name="deleteevent"></p>
<?php
    }
?>
</form>
</div>
<?php
    }
    else
    {
?>
    <h6 align="center" style="color:#fff;"><?=$this->success?></h6>
    <p align="center"><a href="" onclick="closeWin();return false;"><button class="btn btn-primary"><?=$this->LANG_close;?></button></a></p>
<?php
    }
?>
