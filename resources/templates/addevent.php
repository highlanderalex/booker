<div style="color:#000;">
<h4 align="center" style="color:#fff;"><?=$this->LANG_addnew;?> </h4>
<?php
    if ( '' == $this->success )
    {
?>
<div style="color:red;"><p align="center"><?=$this->error;?></p></div>
<form action="index.php?view=addevent" method="post">
<table align="center" width="400px" cellpadding="10" cellspacing="10" border="0">
	<tr>
    <td><span style="color:#fff;"><?=$this->LANG_date;?></span></td>
        <td><input id="datepicker" type="text" placeholder="" name="date" value="<?=($_POST['date']) ? $_POST['date'] : date('Y-m-d');?>" size="40"><br/></td>
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
            <option value="<?=$i;?>" <?=($_POST['startHour'] == $i) ? 'selected' : ''?>><?=$i;?></option>
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
                <option value="<?=$i;?>" <?=($_POST['startMin'] == $i) ? 'selected' : ''?>><?=$i;?></option>
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
            <option value="<?=$i;?>" <?=($_POST['endHour'] == $i) ? 'selected' : ''?>><?=$i;?></option>
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
                <option value="<?=$i;?>" <?=($_POST['endMin'] == $i) ? 'selected' : ''?>><?=$i;?></option>
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
        <td><input type="text" placeholder="" name="title" value="<?=(isset($_POST['title'])) ? $_POST['title'] : ''?>" size="40"><br/></td>
	</tr>
	<tr>
    <td><span style="color:#fff;"><?=$this->LANG_who;?></span></td>
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
            <option value="<?=$user['idUser']?>" <?=($_POST['idUser'] == $user['idUser']) ? 'selected' : '' ?>><?=$user['name'];?></option>
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
			<span style="color:#fff;"><?=$this->LANG_rec_event;?></span><br />
            <input type="radio" name="rec" value="0" checked> <span style="color:#fff;"><?=$this->LANG_none?></span><br />
            <input type="radio" name="rec" value="1" <?=($_POST['rec'] == '1') ? 'checked' : ''?>> <span style="color:#fff;"><?=$this->LANG_weekly;?></span><br />
            <input type="radio" name="rec" value="2" <?=($_POST['rec'] == '2') ? 'checked' : ''?>> <span style="color:#fff;"><?=$this->LANG_be_weekly;?></span><br />
            <input type="radio" name="rec" value="3" <?=($_POST['rec'] == '3') ? 'checked' : ''?>> <span style="color:#fff;"><?=$this->LANG_monthly;?></span><br />
            <input type="number" name="num" max="4" min="1" value="<?=(isset($_POST['num'])) ? $_POST['num'] : ''?>"> <span style="color:#fff;"><?=$this->LANG_dur;?></span><br />
		</td>
	</tr>
</table>
<br />
<p align="center"><input type="submit" class="btn btn-primary" value="<?=$this->LANG_addevent;?>" name="addevent">&nbsp;&nbsp;

</form>
</div>
<?php
    }
    else
    {
?>
    <h6 align="center" style="color:#fff;"><?=$this->success?></h6>
    <p align="center"><a href="" onclick="closeWin();return false;"><button class="btn btn-primary"><?=$this->LANG_close; ?></button></a></p>
<?php
    }
?>
