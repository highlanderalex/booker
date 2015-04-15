<div style="color:red;width:400px;margin:0 auto;margin-top:10px;"><?=$this->error;?></div>
<div style="width:400px;margin:0 auto; margin-top:30px;margin-bottom:50px;">
<form action="index.php?view=registration" method="post">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName" name="name" maxlength="15" placeholder="Your name" value="<?=(isset($_POST['name']))? $_POST['name']:''?>">
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Email</label>
    <input type="email" class="form-control" id="exampleInputAddress" name="email" maxlength="25" placeholder="Your email" value="<?=(isset($_POST['email']))? $_POST['email']:''?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" maxlength="15" placeholder="Password 3-15 chars">
  </div>
  <input type="submit" class="btn btn-primary" value="Registration" name="registration">
</form>
</div>
