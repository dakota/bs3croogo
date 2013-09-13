<div class="node-excerpt">
	<?php
		echo $this->Nodes->field('excerpt');

		echo '<div>' . $this->Html->link('Read more...', $this->Nodes->field('url')) . '</div>';
	?>
</div>