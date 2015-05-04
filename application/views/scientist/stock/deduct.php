<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

<h3>Add more stock to database</h3>
<h5><?php if(isset($error)){
        echo $error;
}
?></h5>

<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form', 'id' => '');
echo form_open('stocks/deduct/'.$stock->code, $attributes); ?>
<div class="panel">
<p>
        <label for="itemname"><?php echo $stock->title;?></label>
</p>

<p>
        <label for="itemname">Item Code: <?php echo $stock->code;?> </label>
        <input type="hidden" name="code" value="<?php echo $stock->code;?> ">
</p>

<p>
        <label for="itemname">Currently in stock: <?php echo $stock->instock." ".$stock->measurement;?> </label>
</p>

        <p><label for="ammount">Ammount to Deduct <span class="required">*</span></label>
        <?php echo form_error('ammount'); ?>
        <br /><input id="ammount" type="text" name="ammount" maxlength="255" value="<?php echo set_value('measurement'); ?>"  /></p>
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
</div>
</div>
