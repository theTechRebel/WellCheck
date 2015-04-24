<div class="container-fluid">
<div class="row">
<form class="form" method="POST" action="<?php echo $url?>dashboard/walkInClient/1">

<h5 align="center"><font color="red"><?php if(isset($problem)){echo $problem;}?></font></h5>

<h4 align="center">Enter new client details</h4>
<div align="center"><br/>

<input type="text" class="form-control" name="idnumber" placeholder="Enter Client ID-Number" autofocus value="<?php echo set_value('idnumber')?>">
<font color="red"><?php echo form_error('idnumber'); ?></font><br/>

<label>Select Salutation</label>
<select name="salutation" class="form-control">
<option value="mr" name="mr">Mr</option>
<option value="mrs" name="mrs">Mrs</option>
<option value="miss" name="miss">Miss</option>
<option value="ms" name="ms">Ms</option>
<option value="dr" name="dr">Dr</option>
<option value="prof" name="prof">Prof</option>
</select><br/>

<input type="text" class="form-control" name="clientname" placeholder="Enter Client name" autofocus value="<?php echo set_value('clientname')?>">
<font color="red"><?php echo form_error('clientname'); ?></font><br/>
        
<input type="text" class="form-control" name="clientsurname" placeholder="Enter Client surname" value="<?php echo set_value('clientsurname')?>">
<font color="red"><?php echo form_error('clientsurname'); ?></font><br/>
		
<label>Select Marital Status</label>
<select name="marital" class="form-control">
<option value="single" name="single">Single</option>
<option value="engaged" name="engaged">Engaged</option>
<option value="married" name="married">Married</option>
<option value="divorced" name="divorced">Divorced</option>
<option value="widowed" name="widowed">Widowed</option>
</select><br/>

<textarea name="address" placeholder="Enter Address" class="form-control"><?php echo set_value('address')?></textarea>
<font color="red"><?php echo form_error('address'); ?></font><br/>
		
	<label>Gender</label>
<select name="gender" class="form-control">
<option value="male" name="male">Male</option>
<option value="female" name="female">Female</option>
</select><br/>
		
<input type="text" class="form-control" name="occupation" placeholder="Enter Client Occupation" value="<?php echo set_value('occupation')?>">
<font color="red"><?php echo form_error('occupation'); ?></font><br/>
		
<input type="text" class="form-control" name="employer" placeholder="Enter Client Employer" value="<?php echo set_value('employer')?>">
<font color="red"><?php echo form_error('employer'); ?></font><br/>

<input type="text" class="form-control" name="dob" placeholder="Enter Client Date of Birth" value="<?php echo set_value('dob')?>">
<font color="red"><?php echo form_error('dob'); ?></font><br/>
		
<input type="text" class="form-control" name="email" placeholder="Enter Client Email Address" value="<?php echo set_value('email')?>">
<font color="red"><?php echo form_error('email'); ?></font><br/>
		
<input type="text" class="form-control" name="phone" placeholder="Enter Client Phone Number" value="<?php echo set_value('phone')?>">
<font color="red"><?php echo form_error('phone'); ?></font><br/>

<input type="hidden" name="type" value="<?php if(isset($type)){echo $type;}else{echo 2;}?>"/>

<input type="submit" name="save" value="Save Client Details" class="btn btn-lg btn-success btn-block"/>

</div>
</form>

</div>
</div><br/><br/>