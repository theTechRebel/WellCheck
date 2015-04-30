<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

<h3>Add A New Stock Item to the Database</h3>
<h4><?php if(isset($error)){
        echo $error;
}
?></h4>

<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form', 'id' => '');
echo form_open('stocks/add/', $attributes); ?>
<div class="panel">
<p>
        <label for="itemname">Name of the Item <span class="required">*</span></label>
        <?php echo form_error('itemname'); ?>
        <br /><input id="itemname" type="text" name="itemname" maxlength="255" value="<?php echo set_value('itemname'); ?>"  />
</p>

<p>
        <label for="description">A short description</label>
	<?php echo form_error('description'); ?>
	<br />
							
	<?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => set_value('description') ) )?>
</p>
<p>
        <label for="ammount">Oppening Quantity <span class="required">*</span></label>
        <?php echo form_error('ammount'); ?>
        <br /><input id="ammount" type="text" name="ammount" maxlength="255" value="<?php echo set_value('ammount'); ?>"  /><br/>

        <p><label for="measurement">Measurement <span class="required">*</span></label>
        <?php echo form_error('measurement'); ?>
        <br /><input id="measurement" type="text" name="measurement" maxlength="255" value="<?php echo set_value('measurement'); ?>"  /></p>
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
</div>
</div>
