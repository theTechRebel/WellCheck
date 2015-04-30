<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<style>
.form-control{
	height:40px;
}
</style>
    <div>
		<?php echo $output; ?>
    </div>
</html>
