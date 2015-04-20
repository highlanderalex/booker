<div style="color:#000;">
<h4 align="center" style="color:#fff;">Add new event</h4>
<div style="color:red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=addevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
		<td><span style="color:#fff;">Date:</span></td>
        <td><input id="datepicker" type="text" placeholder="" name="date" value="<?=date('Y-m-d');?>" size="40"><br/></td>
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
            <option value="<?=$i;?>"><?=$i;?></option>
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
                <option value="<?=$i;?>"><?=$i;?></option>
            <?php
                endfor;
            ?>
                </select>
				<select name="typestart">
					<option value="0" selected>AM</option>
					<option value="1">PM</option>
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
            <option value="<?=$i;?>"><?=$i;?></option>
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
                <option value="<?=$i;?>"><?=$i;?></option>
            <?php
                endfor;
            ?>
			</select>
			<select name="typeend">
					<option value="0" selected>AM</option>
					<option value="1">PM</option>
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
		<td></td>
		<td>
			<span style="color:#fff;">Is this to be recurent event?</span><br />
			<input type="radio" name="rec[]" checked> <span style="color:#fff;">none</span><br />
			<input type="radio" name="rec[]"> <span style="color:#fff;">weekly</span><br />
			<input type="radio" name="rec[]"> <span style="color:#fff;">be-weekly</span><br />
			<input type="radio" name="rec[]"> <span style="color:#fff;">monthly</span><br />
			<input type="number" name="num" max="4" min="1" value=""> <span style="color:#fff;">Duration(max 4 week)</span><br />
		</td>
	</tr>
</table>
<br />
<p align="center"><input type="submit" class="btn btn-primary" value="AddEvent" name="addevent">&nbsp;&nbsp;

</form>
</div>
