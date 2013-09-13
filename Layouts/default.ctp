<?php
// Adjusting content width
if (!empty($this->Regions->blocks('left')) && !empty($this->Regions->blocks('right'))) {
	$span = "col-sm-6 col-sm-push-3";
} elseif (empty($this->Regions->blocks('left')) ^ empty($this->Regions->blocks('right'))) {
	$span = "col-sm-9";
	if (!empty($this->Regions->blocks('left'))) {
		$span .= " col-push-3";
	}
} else {
	$span = "col-sm-12";
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
		<?php
			echo $this->Meta->meta();
			echo $this->Layout->feed();
			echo $this->Html->css(array(
				'/components/bootstrap/dist/css/bootstrap',
				'/css/theme',
			));
			echo $this->Blocks->get('css');
	?>
	
	</head>
	<body>
		<div id="wrap">
			<?php echo $this->element('header'); ?>
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12 <?php echo $span; ?>">
					<?php
						echo $this->Custom->sessionFlash();
						echo $content_for_layout;
					?>
					</div>
					
					<?php if ($this->Regions->blocks('left')): ?>
						<div class="col-xs-12 col-sm-3 col-sm-pull-3">
							<?php echo $this->Regions->blocks('left'); ?>
						</div>
					<?php endif; ?>	
					
					<?php if ($this->Regions->blocks('right')): ?>
						<div class="col-xs-12 col-sm-3">
							<?php echo $this->Regions->blocks('right'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="pull-left">
						Powered by <a href="http://www.croogo.org">Croogo</a>.
					</div>
					<div class="pull-right">
						<a href="http://www.cakephp.org"><?php echo $this->Html->image('/img/cake.power.gif'); ?></a>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Js placed at the end of the document so the pages load faster -->
    <?php
			echo $this->Layout->js();
			echo $this->Html->script(array(
				'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
				'/components/bootstrap/dist/js/bootstrap',
			));
			echo $this->Blocks->get('script');
			echo $this->Blocks->get('scriptBottom');
			echo $this->Js->writeBuffer();
		?>
	</body>
</html>