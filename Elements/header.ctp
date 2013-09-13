<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><?php echo Configure::read('Site.title'); ?></a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php echo $this->Custom->menu('main', array('dropdown' => true)); ?>
		</div>
	</div>
</nav>