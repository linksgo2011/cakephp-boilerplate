<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">导航</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>CRUD例子</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $this->request->url=='admin/Categories/add'?'active':'';?>"><a href="<?php echo $this->Html->url('/admin/Categories/add')?>"><i class="fa fa-circle-o"></i>添加分类</a></li>
                    <li class="<?php echo $this->request->url=='admin/Categories/index'?'active':'';?>"><a href="<?php echo $this->Html->url('/admin/Categories/index')?>"><i class="fa fa-circle-o"></i>文章分类管理</a></li>
                    <li class="<?php echo $this->request->url=='admin/Posts/index'?'active':'';?>"><a href="<?php echo $this->Html->url('/admin/Posts/index')?>"><i class="fa fa-circle-o"></i>文章管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>常用特性</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo $this->Html->url('/admin/Utils/upload')?>"><i class="fa fa-circle-o"></i>文件上传</a></li>
                    <li><a href="<?php echo $this->Html->url('/admin/Utils/generation')?>"><i class="fa fa-circle-o"></i>代码生成</a></li>
                </ul>
            </li>
            <li class="header">其他</li>
            <li class="<?php echo $this->request->url=='admin/Users/about'?'active':'';?>"><a href="<?php echo $this->Html->url('/admin/Users/about');?>"><i class="fa fa-circle-o text-red"></i> <span>关于本项目</span></a></li>
        </ul>
    </section>
</aside>