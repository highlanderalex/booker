<div style="color:#000;">
<h4 align="center" style="color:#fff;">B.B. DETAILS</h4>
<div style="color:red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=updateevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
		<td><span style="color:#fff;">Date:</span></td>
        <td><input id="datepicker" type="text" placeholder="" name="date" value="<?=$this->item['date'];?>" size="40"><br/></td>
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
            <option value="<?=$i;?>" <?=($i==$this->item['startHour']) ? 'selected' : ''?>><?=$i;?></option>
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
                <option value="<?=$i;?>" <?=($i==$this->item['startMin']) ? 'selected' : ''?>><?=$i;?></option>
            <?php
                endfor;
            ?>
                </select>
            <span style="color:#fff;"> - </span>
			<select name="endHour">
            <?php
                for ( $i=0; $i < 24; $i++):
                if ( $i < 10 )
                {
                    $i = '0' . $i;
                }
            ?>
            <option value="<?=$i;?>" <?=($i==$this->item['endHour']) ? 'selected' : '' ?>><?=$i;?></option>
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
                <option value="<?=$i;?>" <?=($i==$this->item['endMin']) ? 'selected' : ''?>><?=$i;?></option>
            <?php
                endfor;
            ?>
			</select>
			<br/>
		</td>
	</tr>
	<tr>
		<td><span style="color:#fff;">Notes:</span></td>
        <td><input type="text" placeholder="" name="title" value="<?=$this->item['title'];?>" size="40"><br/></td>
	</tr>
	<tr>
		<td><span style="color:#fff;">Who:</span></td>
		<td>
        <?php
            if ($_SESSION['statusUser'] == 0)
            {
                ?>    <input type="text" placeholder="" name="name" value="<?=$this->item['name'];?>" size="40" disabled><br/>
        <?php
            }
            else
            {
        ?>
            <select name="idUser">
            <?php
                foreach($this->users as $user):
            ?>
            <option value="<?=$user['idUser']?>" <?=($user['idUser']==$this->item['idUser']) ? 'selected' : '' ?>><?=$user['name'];?></option>
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
    if (($this->flagDate && $_SESSION['idUser'] == $this->item['idUser']) ||
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
