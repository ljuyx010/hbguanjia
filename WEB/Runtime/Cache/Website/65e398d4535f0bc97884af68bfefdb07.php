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

  <title>内容管理</title>
  <script src="/WEB/Website/public/js/jquery-1.10.2.min.js"></script>
<!--tree-->
<script src="/WEB/Website/public/js/jquery.ztree.core-3.5.js"></script>
<link rel="stylesheet" href="/WEB/Website/public/css/zTreeStyle/metro.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/WEB/Website/public/css/userdefind.css" />
<!--pickers css-->
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="/WEB/Website/public/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
<script type="text/javascript">
	var app="";
	window.UEDITOR_HOME_URL = "/Data/ueditor/";
	window.onload = function (){
	//window.UEDITOR_CONFIG.initialFrameWidth = 1000; 初始化编辑器宽度,默认1000
	window.UEDITOR_CONFIG.initialFrameHeight = 500; //初始化编辑器高度,默认320
		UE.getEditor('content',{ initialFrameWidth: null });
	}
</script>
<script type="text/javascript" src="/Data/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Data/ueditor/ueditor.all.min.js"></script>
</head>

<body class="sticky-header left-side-collapsed">
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
				
                <li class="menu-list <?php if(CONTROLLER_NAME == Orders): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>1));?>"> 待付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>2));?>"> 已付款订单</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Orders/index',array(id=>3));?>"> 已发货订单</a></li>
                    </ul>
                </li>

                <li class="menu-list <?php if(in_array(CONTROLLER_NAME,array(Rbac,Member)) && ACTION_NAME == index): ?>nav-active<?php endif; ?>">
				<a target="_parent" href=""><i class="fa fa-users"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
						<li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Rbac/index');?>"> 系统用户</a></li>
                        <li><a target="_parent" href="<?php echo U(MODULE_NAME.'/Member/index');?>"> 会员管理</a></li>
                    </ul>
                </li>

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
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="mail-box">
                <?php echo W('Menu/mau');?>
                <section class="mail-box-info">
                   <div class="col-sm-12">
					<section class="panel">
					<header class="panel-heading">
						<?php echo ($cate['name']); ?><span class="text-muted">——发布文章</span>
						<span class="tools pull-right">
							<a class="fa fa-rotate-left" href="javascript:history.go(-1)"> 返回</a>
						 </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal adminex-form" method="post" action="<?php echo U(MODULE_NAME.'/Article/runAdd');?>">
								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-1">文章标题</label>
									<div class="col-lg-6">
										<input class=" form-control" id="firstname" name="title" type="text"/>
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-1">文章关键字</label>
									<div class="col-lg-6">
										<input class=" form-control" id="lastname" name="keywords" type="text"/>
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-1">文章描述</label>
									<div class="col-lg-6">
										<input class=" form-control" id="lastname" name="description" type="text"/>
									</div>
								</div>
								<div class="form-group ">
									<label for="username" class="control-label col-lg-1">题图</label>
									<div class="col-lg-6">
										<a class="btn btn-primary upimgs" id="btn">选择图片</a> 最大2M，支持jpg，gif，png格式。
										 <dl id="ul_pics" class="ul_pics clearfix"><dd id='slt'></dd></dl>
										 <input name="pic" id="picsa" style="display: none;">
									</div>
								</div>
								<div class="form-group ">
									<label for="password" class="control-label col-lg-1">属性</label>
									<div class="col-lg-2">
										<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label class="checkbox-inline">
												<input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?>&nbsp;
											</label><?php endforeach; endif; ?>
									</div>
									<?php if($cid == 1): ?><label for="confirm_password" class="control-label col-lg-1">查询手机号</label>
									<div class="col-lg-2">
										<input class="form-control " type="text" name="tel" value="" />
									</div>
									<?php else: ?>
									<label for="confirm_password" class="control-label col-lg-1">阅读积分</label>
									<div class="col-lg-2">
										<input class="form-control " type="text" name="jf" value="" />
									</div><?php endif; ?>
								</div>
								<div class="form-group ">
									<label for="confirm_password" class="control-label col-lg-1">文章作者</label>
									<div class="col-lg-2">
										<input class="form-control " type="text" name="author" value="<?php echo session('name');?>" />
									</div>
								</div>
								<div class="form-group ">
									<label for="email" class="control-label col-lg-1">发布时间</label>
									<div class="col-lg-2">
										<div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?php echo (date('Y-m-d H:i',(isset($v["time"]) && ($v["time"] !== ""))?($v["time"]):time())); ?>"  class="input-append date dpYears" style="width:200px;">
											<input type="text" name="time" value="<?php echo (date('Y-m-d H:i',(isset($v["time"]) && ($v["time"] !== ""))?($v["time"]):time())); ?>" size="16" class="form-control">
											<span class="input-group-btn add-on">
											  <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>                                           
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="control-label col-lg-1">文章内容</label>
									<div class="col-lg-10">
										<textarea name="content" id="content">
										<?php if($cid == 1): ?><p class="jbxx">基本信息</p>
										<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000"><tbody><tr><td>合同号</td><td></td></tr><tr><td>项目名称</td><td></td></tr><tr><td>项目负责人</td><td></td></tr><tr><td>约定完成日期</td><td></td></tr><tr><td>预付款</td><td></td></tr><tr><td>项目负责人联系方式</td><td></td></tr></tbody></table>
										<br />
										<p class="xmjd">项目进度</p>
										<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000"><tbody><tr><td>现场踏勘</td><td></td><td>第十章</td><td></td></tr><tr><td>资料情况</td><td></td><td><span>第<span>十</span>一章</span><br /></td><td></td></tr><tr><td>一次公示</td><td></td><td><span>第<span>十</span>二章</span><br /></td><td></td></tr><tr><td>监测方案</td><td></td><td><span>第<span>十</span>三章</span><br /></td><td></td></tr><tr><td>监测报告</td><td></td><td><span>第<span>十</span>四章</span><br /></td><td></td></tr><tr><td>标准申请</td><td></td><td><span>第<span>十</span>五章</span><br /></td><td></td></tr><tr><td>标准批复</td><td></td><td>二次公示</td><td></td></tr><tr><td>报告编制</td><td></td><td>公参调查</td><td></td></tr><tr><td>前言</td><td></td><td>一级审核</td><td></td></tr><tr><td>第一章</td><td></td><td>二级审核</td><td></td></tr><tr><td><span>第二章</span><br /></td><td></td><td>三级审核</td><td></td></tr><tr><td><span>第三章</span><br /></td><td></td><td>资质申请</td><td></td></tr><tr><td><span>第四章</span><br /></td><td></td><td>装订报告</td><td></td></tr><tr><td><span>第五章</span><br /></td><td></td><td>报审申请及送审</td><td></td></tr><tr><td><span>第六章</span><br /></td><td></td><td>评审会</td><td></td></tr><tr><td><span>第七章</span><br /></td><td></td><td>会后修改</td><td></td></tr><tr><td><span>第八章</span><br /></td><td></td><td>项目报批</td><td></td></tr><tr><td><span>第九章</span><br /></td><td></td><td>尾款</td><td></td></tr><tr><td colspan="4">备注：</td></tr></tbody></table><?php endif; ?>
										</textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-lg-offset-1 col-lg-10">
									<input type="hidden" name="cid" value="<?php echo ($cid); ?>">
										<input class="btn btn-primary" type="submit" value="保&nbsp;&nbsp;存">
									</div>
								</div>
							</form>
						</div>
					</div>
					</section>
					</div>
                </section>
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
<script src="/WEB/Website/public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/WEB/Website/public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/WEB/Website/public/js/bootstrap.min.js"></script>
<script src="/WEB/Website/public/js/modernizr.min.js"></script>
<script src="/WEB/Website/public/js/jquery.nicescroll.js"></script>
<!--pickers plugins-->
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript">
  $('.date-picker').datepicker({
      language: 'zh-CN',
      autoclose: true,
      todayHighlight: true
  })
</script>
<!--pickers initialization-->
<script src="/WEB/Website/public/js/pickers-init.js"></script>

<script type="text/javascript" src="/WEB/Website/public/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/WEB/Website/public/js/upload.js"></script>

<!--common scripts for all pages-->
<script src="/WEB/Website/public/js/scripts.js"></script>
</body>
</html>