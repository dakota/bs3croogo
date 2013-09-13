<small class="text-muted node-info">
<?php
	$type = $types_for_layout[$this->Nodes->field('type')];

	if ($type['Type']['format_show_author']) {
		echo ' ' . __d('croogo', 'by') . ' <span class="glyphicon glyphicon-user"></span> ';
		if ($this->Nodes->field('User.website') != null) {
			$author = $this->Html->link($this->Nodes->field('User.name'), $this->Nodes->field('User.website'));
		} else {
			$author = $this->Nodes->field('User.name');
		}
		echo $this->Html->tag('strong', $author, array(
			'class' => 'author',
		));
	}
	if ($type['Type']['format_show_date']) {
		echo ' ' . __d('croogo', 'on') . ' <span class="glyphicon glyphicon-time"></span> ';
		echo $this->Html->tag('em', $this->Time->format(Configure::read('Reading.date_time_format'), $this->Nodes->field('created'), null, Configure::read('Site.timezone')), array('class' => 'date'));
	}
?>
</small>