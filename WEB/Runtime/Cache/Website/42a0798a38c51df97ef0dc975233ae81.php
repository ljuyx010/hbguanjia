<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />


  <link href="/WEB/Website/public/css/style.css" rel="stylesheet">
  <link href="/WEB/Website/public/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/WEB/Website/public/js/html5shiv.js"></script>
  <script src="/WEB/Website/public/js/respond.min.js"></script>
  <![endif]-->

<title>权限管理</title>
  <!--pickers css-->
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
</head>

<body class="sticky-header">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><img src="/WEB/Website/public/images/logo2.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><img src="/WEB/Website/public/images/logo_icon1.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/WEB/Website/public/images/photos/Admin.png" class="media-object">
                    <div class="media-body">
                        <h4><a target="_parent" href="#"><?php echo (session('name')); ?></a></h4>
                        <span>"欢迎使用..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">帐户信息</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/userpwd');?>"><i class="fa fa-cog"></i> <span>修改密码</span></a></li>
                  <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/logout');?>"><i class="fa fa-sign-out"></i> <span>退出系统</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/index');?>"><i class="fa fa-home"></i> <span>首页</span></a></li>
				
                <li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(System,Cate,Assort,Attr,Link))): ?>nav-active<?php endif; ?>"><a target="_parent" href=""><i class="fa fa-laptop"></i> <span>网站参数</span></a>
					<ul class="sub-menu-list">
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/index');?>"> 基本参数</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/meter');?>"> 扩展参数</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Cate/index');?>"> 栏目管理</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Assort/index');?>"> 产品分类</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Attr/index');?>"> 文章属性</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/banner');?>"> 轮播管理</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Link/index');?>"> 友链管理</a></li>
                    </ul>
				</li>
				<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Menu/index');?>"><i class="fa fa-th-list"></i> <span>内容管理</span></a></li>
				<li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(Rbac,Member)) && ACTION_NAME == index): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-users"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/index');?>"> 系统用户</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Member/index');?>"> 会员管理</a></li>
                    </ul>
                </li>
                <li class="menu-list <?php if(CONTROLLER_NAME == Orders): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>1));?>"> 待付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>2));?>"> 已付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>3));?>"> 已发货订单</a></li>
                    </ul>
                </li>
				<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Comment/index');?>"><i class="fa fa-comment"></i> <span>评论管理</span></a></li>                

                <li class="menu-list <?php if(CONTROLLER_NAME == Rbac && ACTION_NAME != index): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-sort-amount-asc"></i> <span>权限管理</span></a>
					<ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/role');?>"> 角色列表</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/node');?>"> 节点列表</a></li>
                    </ul>
				</li>
                        
                <li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(Collect,Bak))): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-cogs"></i> <span>系统工具</span></a>
					<ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Collect/index');?>"> 采集设置</a></li>
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Collect/note');?>"> 采集记录</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Bak/index');?>"> 数据备份</a></li>
                    </ul>
				</li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
        <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            <form class="searchform" action="<?php echo U(MODULE_NAME.'/Index/search');?>" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="搜索关键字" />
            </form>
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">                  
					<li>
                        <a href="<?php echo U('Index/Index/index');?>" target="_blank" class="btn btn-default dropdown-toggle info-number">
                            <i class="fa fa-mail-reply" title="前台首页"></i>
                        </a>                        
                    </li>
					
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-gear"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">清除缓存</h5>
                            <ul class="dropdown-list normal-list">
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/index');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">清除首页缓存</span>
                                    </a>
                                </li>
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/all');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">清除所有缓存</span>
                                    </a>
                                </li>
                                <li class="new">
                                    <a href="<?php echo U(MODULE_NAME.'/Cache/temp');?>" >
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">重载模板 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
					
                    <li>
                        <a target="_parent" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="/WEB/Website/public/images/photos/Admin.png" alt="" />
                            <?php echo (session('name')); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/System/userpwd');?>"><i class="fa fa-keyboard-o"></i> <span>修改密码</span></a></li>
                            <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Index/logout');?>"><i class="fa fa-sign-out"></i> 退出系统</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->            
        <!-- page heading end-->
        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                设置角色权限
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">首页</a>
                </li>
                <li class="active"> 角色管理 </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                           角色管理
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
								<div class="clearfix">
									<div class="form-group">
										<a href="#myModal2" class="btn btn-primary" data-toggle="modal">
											添加角色 <i class="fa fa-plus"></i>
										</a>
										<!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">添加新角色</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo U(MODULE_NAME.'/Rbac/addRoleHandle');?>" method="post" class="form-horizontal ">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4"> 角色名称</label>
                                                    <div class="col-md-6">
                                                        <input size="16" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-4">角色描述</label>
                                                    <div class="col-md-6 col-xs-11">
                                                        <input class="form-control " name="remark" size="16" type="text" value="" />
                                                    </div>
                                                </div>                                              
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">开启状态</label>
                                                    <div class="col-md-6 col-xs-11">
													<label class="checkbox-inline">
                                                        <input type="radio" name="status" value="1" checked="checked" />&nbsp;开启&nbsp;
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="status" value="0" />&nbsp;关闭&nbsp;
													</label>
                                                    </div>
                                                </div>
												<div class="modal-footer center-block">
													<input class="btn btn-primary" type="submit" value="保存">
												</div>
                                            </form>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
									</div>
								</div>
								<div class="space15"></div>
								<table class="table table-bordered table-striped dataTable">
								
								<thead>								
								<tr role="row">
									<th>ID</th>
									<th width=40%>角色名</th>
									<th>角色描述</th>
									<th width=5%>状态</th>
									<th width=15%>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr class="">
									<td><?php echo ($v["id"]); ?></td>
									<td><?php echo ($v["name"]); ?></td>
									<td>
										<?php echo ($v["remark"]); ?>
									</td>
									<td><?php if($v["status"]): ?>开启<?php else: ?>关闭<?php endif; ?></td>
									<td>
										<?php if($v["status"]): ?><a onclick="return confirm('确实要关闭吗？')" href="<?php echo U(MODULE_NAME.'/Rbac/lockRole',array('id'=>$v['id']));?>"><span class="btn btn-warning btn-xs">关闭</span></a>
										<?php else: ?>
										<a onclick="return confirm('确实要开启吗？')" href="<?php echo U(MODULE_NAME.'/Rbac/lockRole',array('id'=>$v['id'],'type'=>1));?>"><span class="btn btn-primary  btn-xs">开启</span></a><?php endif; ?>
										<a href="<?php echo U(MODULE_NAME.'/Rbac/access',array('rid'=>$v['id']));?>"><span class="btn btn-success btn-xs">配置权限</span></a>
									</td>
								</tr><?php endforeach; endif; ?>
								</tbody>								
								</table>
							</div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->
<!--footer section start-->
        <footer class="">
		Copyright &copy; 2017 DPCMS T1 Powered by <a href="http://www.dpwl.net" target="_blank">湖北大鹏网络科技有限公司</a>.
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/WEB/Website/public/js/jquery-1.10.2.min.js"></script>
<script src="/WEB/Website/public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/WEB/Website/public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/WEB/Website/public/js/bootstrap.min.js"></script>
<script src="/WEB/Website/public/js/modernizr.min.js"></script>
<script src="/WEB/Website/public/js/jquery.nicescroll.js"></script>

<!--pickers plugins-->
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!--pickers initialization-->
<script src="/WEB/Website/public/js/pickers-init.js"></script>


<!--common scripts for all pages-->
<script src="/WEB/Website/public/js/scripts.js"></script>

</body>
</html>