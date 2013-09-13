<?php $this->Nodes->set($node); ?>
<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
	<div class="page-header">
		<h2>
			<?php
				echo $this->Nodes->field('title');
			?>
		</h2>
		<?php echo $this->Nodes->info();?>
	</div>
	<?php
		echo $this->Nodes->body();
		echo $this->Nodes->moreInfo();
	?>
</div>

<div id="comments" class="node-comments row">
<?php
	$type = $types_for_layout[$this->Nodes->field('type')];

	if ($type['Type']['comment_status'] > 0 && $this->Nodes->field('comment_status') > 0) {
		if ($type['Type']['comment_status'] == 2 && $this->Nodes->field('comment_status') == 2) {
			echo '<div class="col-sm-8">';
		}
		echo $this->element('Comments.comments');
		if ($type['Type']['comment_status'] == 2 && $this->Nodes->field('comment_status') == 2) {
			echo '</div>';
		}
	}

	if ($type['Type']['comment_status'] == 2 && $this->Nodes->field('comment_status') == 2) {
		echo '<div class="col-sm-4">';
			echo $this->element('Comments.comments_form');
		echo '</div>';
	}
?>
</div>