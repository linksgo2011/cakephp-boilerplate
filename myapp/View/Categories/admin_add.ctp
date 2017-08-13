<section class="content-header">
	<h1>
		添加分类
	</h1>
	<ol class="breadcrumb">
		<li><a href="/<?php echo $this->Html->url("/admin/Users/home");?>"><i class="fa fa-dashboard"></i> 首页</a></li>
		<li><a href="<?php echo $this->Html->url("/admin/Categories/index"); ?>">分类列表</a></li>
		<li class="active">添加分类</li>
	</ol>
</section>
<section class="content bg-white">
	<?php echo $this->Session->flash(); ?>

	<div class="categories BForm">
		<?php echo $this->BForm->create('Category'); ?>
		<fieldset>
			<?php
			echo $this->BForm->input('name',array('label'=>"分类名",'class'=>'col-sm-6'));
			echo $this->BForm->input('title',array('label'=>'标题'));
			echo $this->BForm->input('keywords',array('label'=>'关键字'));
			echo $this->BForm->input('description',array('label'=>'描述'));
			echo $this->BForm->input('listorder',array('label'=>'排序'));
			echo $this->BForm->submit('提交');
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>

</section>