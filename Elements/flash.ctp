<?php
	$heading = ucfirst($class);
	$class = $class == 'error' ? 'danger' : $class;
?>
<div class="alert alert-<?php echo $class ?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong><?php echo $heading; ?>!</strong>
	<?php echo $message; ?>
</div>