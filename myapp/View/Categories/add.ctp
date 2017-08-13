<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('parent');
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('keywords');
		echo $this->Form->input('description');
		echo $this->Form->input('thumb');
		echo $this->Form->input('content');
		echo $this->Form->input('color');
		echo $this->Form->input('isdisabled');
		echo $this->Form->input('listorder');
		echo $this->Form->input('createtime');
		echo $this->Form->input('updatetime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
