<div id="comment-<?php echo $comment['Comment']['id']; ?>" class="panel panel-default comment<?php if ($node['Node']['user_id'] == $comment['Comment']['user_id']) { echo ' author'; } ?>">
	<div class="panel-heading comment-info">
		<span class="avatar"><?php echo $this->Html->image('http://www.gravatar.com/avatar/' . md5(strtolower($comment['Comment']['email'])) . '?s=32', array('class' => 'img-rounded img-polaroid')) ?></span>
		<span class="name">
		<?php
			if ($comment['Comment']['website'] != null) {
				echo $this->Html->link($comment['Comment']['name'], $comment['Comment']['website'], array('target' => '_blank'));
			} else {
				echo $comment['Comment']['name'];
			}
		?>
		</span>
		<span class="date pull-right text-muted">
			<?php 
				echo __('Posted %s', $this->Time->timeAgoInWords($comment['Comment']['created'], array(
					'format' => Configure::read('Comment.date_time_format'),
					'timezone' => Configure::read('Site.timezone')
				)));
			?>
		</span>
	</div>
	<div class="panel-body">
		<?php
			if ($level < Configure::read('Comment.level')) {
				echo '<div class="comment-reply pull-right">';
				echo $this->Html->link(__('Reply to this comment'), array(
					'plugin' => 'comments',
					'controller' => 'comments',
					'action' => 'add',
					$node['Node']['id'],
					$comment['Comment']['id'],
				), array(
					'class' => 'pull-right',
					'icon' => 'comment',
				));
				echo '</div>';
			}
		?>	
		<div class="comment-body">
			<?php 
				echo nl2br($this->Text->autoLink($comment['Comment']['body'], array('escape' => false)));
			?>
		</div>
	</div>

	<?php
		if (isset($comment['children']) && count($comment['children']) > 0) {
			echo '<div class="panel-group child-comments">';
			foreach ($comment['children'] as $childComment) {
				echo $this->element('Comments.comment', array('comment' => $childComment, 'level' => $level + 1));
			}
			echo '</div>';
		}
	?>
</div>