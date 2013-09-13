<div class="comment-form">
	<h3><?php echo __('Post a comment'); ?></h3>
	<?php
		$type = $types_for_layout[$node['Node']['type']];

		if ($this->params['controller'] == 'comments') {
			$nodeLink = $this->Html->link(__('Go back to original post') . ': ' . $node['Node']['title'], $node['Node']['url']);
			echo $this->Html->tag('p', $nodeLink, array('class' => 'back'));
		}

		$formUrl = array(
			'plugin' => 'comments',
			'controller' => 'comments',
			'action' => 'add',
			$node['Node']['id'],
		);
		if (isset($parentId) && $parentId != null) {
			$formUrl[] = $parentId;
		}

		echo $this->Form->create('Comment', array('url' => $formUrl, 'class' => 'well'));
			$this->Form->inputDefaults(array(
				'class' => 'form-control',
				'div' => 'form-group',
				'label' => false
			));
			if ($this->Session->check('Auth.User.id')) {
				echo $this->Form->input('Comment.name', array(
					'placeholder' => __('Your name'),
					'value' => $this->Session->read('Auth.User.name'),
					'readonly' => 'readonly',
				));
				echo $this->Form->input('Comment.email', array(
					'placeholder' => __('Your email address'),
					'value' => $this->Session->read('Auth.User.email'),
					'readonly' => 'readonly',
				));
				echo $this->Form->input('Comment.website', array(
					'placeholder' => __('Website'),
					'value' => $this->Session->read('Auth.User.website'),
					'readonly' => 'readonly',
				));
				echo $this->Form->input('Comment.body', array('label' => false));
			} else {
				echo $this->Form->input('Comment.name', array('placeholder' => __('Your name (Required)')));
				echo $this->Form->input('Comment.email', array('placeholder' => __('Your email address (Required)')));
				echo $this->Form->input('Comment.website', array('placeholder' => __('Your website address')));
				echo $this->Form->input('Comment.body', array('label' => false));
			}

			if ($type['Type']['comment_captcha']) {
				echo $this->Recaptcha->display_form();
			}
		echo $this->Form->end(array(
			'class' => 'btn btn-primary',
			'label' => __('Post comment'),
		));
	?>
</div>