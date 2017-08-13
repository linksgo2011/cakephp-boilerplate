<section class="content-header">
	<h1>
		分类列表
	</h1>
	<ol class="breadcrumb">
		<li><a href="/<?php echo $this->Html->url("/admin/Users/home");?>"><i class="fa fa-dashboard"></i> 首页</a></li>
		<li><a >分类列表</a></li>
	</ol>
</section>
<section class="content bg-white">
	<?php echo $this->Session->flash(); ?>

	<div class="box">
		<div class="box-header">
			<div class="inline-form row-fluid">
				<?php $this->BForm->formatInput = "%s %s"; ?>
				<?php echo $this->Form->Create('Category',array('type'=>'get','class'=>'form-inline')); ?>
				<?php echo $this->BForm->input("parent",array('label'=>false,'value'=>0,'type'=>'hidden')); ?>
				<?php echo $this->BForm->input("title",array('label'=>'标题')); ?>
				<?php echo $this->BForm->input("name",array('label'=>'分类名')); ?>
				<?php echo $this->BForm->input("startTime",array('label'=>'创建时间')); ?>
				<?php echo $this->BForm->submit("搜索",array('class'=>'btn')); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>

		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('keywords'); ?></th>
				<th><?php echo $this->Paginator->sort('description'); ?></th>
				<th><?php echo $this->Paginator->sort('listorder'); ?></th>
				<th><?php echo $this->Paginator->sort('createtime'); ?></th>
				<th><?php echo $this->Paginator->sort('updatetime'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($categories as $category): ?>
				<tr>
					<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['keywords']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['description']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['listorder']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
			<?php echo $this->element('admin_pagination'); ?>
		</div>
	</div>

	<link rel="stylesheet" href="<?=$this->base?>/bower_components/AdminLTE/plugins/datepicker/datepicker3.css">
	<script src="<?=$this->base?>/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script>
		$(function(){
			$("#CategoryStartTime").datepicker({
				autoclose: true,
				language:'zh-CN'
			});
		});
	</script>
</section>