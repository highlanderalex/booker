<div style="color:red;width:400px;margin:0 auto;margin-top:10px;"><?=$this->error;?></div>
<div style="width:400px;margin:0 auto; margin-top:30px;margin-bottom:50px;">
<form action="index.php?view=login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email" name="email" value="<?=(isset($_POST['email'])) ? $_POST['email']:''?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <input type="submit" class="btn btn-primary" value="Enter" name="login">
</form>
</div>