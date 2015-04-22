<div style="margin-top:20px;">
<p align="center">
<a href="index.php?view=index"><button class="btn btn-default"><?=$this->LANG_calendar;?></button></a>
<a href="index.php?view=admin"><button class="btn btn-default"><?=$this->LANG_adm;?></button></a>
</p></div>
<div style="color:red;width:400px;margin:0 auto;margin-top:10px;"><?=$this->error;?></div>
<div style="width:400px;margin:0 auto; margin-top:30px;margin-bottom:50px;">
<form action="index.php?view=registration" method="post">
  <div class="form-group">
  <label for="exampleInputName"><?=$this->LANG_name;?></label>
  <input type="text" class="form-control" id="exampleInputName" name="name" maxlength="15" placeholder="<?=$this->LANG_yourname;?>" value="<?=(isset($_POST['name']))? $_POST['name']:''?>">
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Email</label>
    <input type="email" class="form-control" id="exampleInputAddress" name="email" maxlength="25" placeholder="<?=$this->LANG_youremail;?>" value="<?=(isset($_POST['email']))? $_POST['email']:''?>">
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1"><?=$this->LANG_pass;?></label>
  <input type="password" class="form-control" id="exampleInputPassword1" name="password" maxlength="15" placeholder="<?=$this->LANG_passdet;?>">
  </div>
  <input type="submit" class="btn btn-primary" value="<?=$this->LANG_reg;?>" name="registration">
</form>
</div>
