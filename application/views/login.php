<?php
require_once('header.php');		
?>

    <div class="container-fluid">
  				<div class="row">
  				<?php echo form_open('home/')?>
      <form class="form-signin">
        <h2 class="form-signin-heading" align="center">Wellness Center WellCheck Application Portal</h2>
		<div align="center">
		<br/>
		<h3>User ID</h3>
        <input type="text" class="form-control" name="userid" placeholder="User ID" autofocus value="<?php echo set_value('userid')?>">
		<font color="red"><?php echo form_error('userid'); ?></font><br/>
		
		<h3>Password</h3>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password')?>">
		<font color="red"><?php echo form_error('password'); ?></font><br/>
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
		<h5 align="center"><font color="red"><?php if(isset($no_user)){echo $no_user;}?></font></h5>
		</div>
		
      </form>

     				</div>
							</div>

        <br/>
<?php
require_once('footer.php');
?>