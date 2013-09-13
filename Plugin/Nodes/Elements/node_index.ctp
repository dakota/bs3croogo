<div class="nodes">
	<div class="page-header">
		<h2><?php echo $title_for_layout; ?></h2>
	</div>

	<?php
		if (count($nodes) == 0) {
			echo __d('croogo', 'No items found.');
		}
	?>

	<?php
		foreach ($nodes as $node):
			$this->Nodes->set($node);
	?>
	<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
		<h3>
			<?php	echo $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url'));	?>
		</h3>
		<?php
			echo $this->Nodes->info();
			echo $this->Nodes->excerpt();
			echo $this->Nodes->moreInfo();
		?>
	</div>
	<?php
		endforeach;
	?>

	<div class="paging"><?php echo $this->Paginator->numbers(); ?></div>
</div>