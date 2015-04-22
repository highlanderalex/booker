<div style="color:#000;">
<h4 align="center" style="color:#fff;">B.B. DETAILS</h4>
<?php
    if ( '' == $this->success )
    {
?>
<div style="color:red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=updateevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
		<td><span style="color:#fff;">Date:</span></td>
        <td>
			<input type="hidden" name="idEvent" value="<?=(isset($_POST['idEvent'])) ? $_POST['idEvent'] : $this->item['idEvent'];?>">
			<input id="datepicker" type="text" placeholder="" name="date" value="<?=(isset($_POST['date'])) ? $_POST['date'] : $this->item['date'];?>" size="40">
			<br/>
		</td>
	</tr>
	<tr>
        <td><span style="color:#fff;">When:</span></td>
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
		<td><span style="color:#fff;">Notes:</span></td>
        <td><input type="text" placeholder="" name="title" value="<?=(isset($_POST['title'])) ? $_POST['title'] : $this->item['title'];?>" size="40"><br/></td>
	</tr>
	<tr>
		<td><span style="color:#fff;">Who:</span></td>
		<td>
        <?php
            if ($_SESSION['statusUser'] == 0)
            {
                ?>    <input type="text" placeholder="" name="name" value="<?=(isset($_POST['name'])) ? $_POST['name'] : $this->item['name'];?>" size="40" disabled><br/>
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
	<tr>
		<td align="right"><input type="checkbox"></td>
		<td><span style="color:#fff;">Apply to all occurences?</span></td>
	</tr>
</table>
<br />
<?php
    if ((($this->flagDate && $_SESSION['idUser'] == $this->item['idUser']) || ($this->flagDate && isset($_POST['idUser']))) ||
        ($this->flagDate && $_SESSION['statusUser'] == 1) )
    {
?>
<p align="center"><input type="submit" class="btn btn-primary" value="Update" name="updateevent">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Delete" name="deleteevent"></p>
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
    <p align="center"><a href="" onclick="closeWin();return false;"><button class="btn btn-primary">Close</button></a></p>
<?php
    }
?>
