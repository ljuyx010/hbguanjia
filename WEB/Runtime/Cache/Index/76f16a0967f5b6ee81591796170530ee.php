<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>购物车</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width,initial-scale= 1.0, minimum-scale=1.0, maximum-scale=1.0"/>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<link type="text/css" rel="stylesheet" href="/Public/member/css/head.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css">
<link type="text/css" rel="stylesheet" href="/Public/member/css/styles.min.css"/>
</head>
<body>
<!-- html code start -->
<main class="jumbotron-main">
    <section class="masthead-section no-padding-layer no-border-layer">
        <input type="hidden" value="0" id="fromzdh"/>

        <div class="masthead-login">
            <figure class="masthead-figure">
				<img src="<?php echo (session('userHeadimgurl')); ?>" width="64"/>
            </figure>
            <div class="masthead-caption">
                <h3 class="masthead-caption-title line-ellipsis">
                <?php echo (session('userNickname')); ?>
                </h3>

                <p class="masthead-wallet" data-space="&nbsp;" id="underName">会员积分:<?php echo ($member["integral"]); ?></p>

                <p class="masthead-setting"><?php if(!$member['state']): ?><span style="color:red;">认证送积分</span>&nbsp;-->&nbsp;<?php endif; ?><a href="/index.php/Index/member/person/">修改资料<i class="icon icon-right"></i></a></p>
            </div>
        </div>
    </section>

  
    <section class="service-section normal-layer no-padding-layer i-border-image">
        <ul class="feature-list interaction-list">
            <li class="feature-item">                
                <p class="inner-bar"><span class="order-text">我的购物车<em id="orderInfo"></em></span></p>
            </li>
			<?php if(is_array($cert)): foreach($cert as $key=>$v): ?><li>
				<div class="padding5">
				<p><?php echo ($v["pname"]); ?></p>
				<div class="space-b"><p><?php echo (date('Y-m-d',$v["buytime"])); ?></p><p>价格：<?php echo ($v["price"]); ?>X<?php echo ($v["num"]); ?>=<?php echo ($v["sumprice"]); ?>元</p></div>
				<p style="text-align:right;">
				<a class="zd" href="<?php echo U('/Index/Orders/index',array('id'=>$v['id']));?>">购买</a><a href="<?php echo U('/Index/orders/del',array('id'=>$v['id']));?>">删除</a>
				</p>
				</div>
			</li><?php endforeach; endif; ?>		
        </ul>        
    </section>

</main>
<div style="height:76px; background:#eee;"></div>
<div class="bottom">
	<div class="fdh">
	<a href="/index.php/Index/index/index/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Index'): ?><img src="/Public/images/sy1.png">
	<p class="hover">首页</p>
	<?php else: ?>
	<img src="/Public/images/sy.png">
	<p>首页</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/article/index/id/2/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Article' && $cid != 1): ?><img src="/Public/images/kc1.png">
	<p class="hover">资料</p>
	<?php else: ?>
	<img src="/Public/images/kc.png">
	<p>资料</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/goods/index/id/3/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'goods'): ?><img src="/Public/images/sc1.png">
	<p class="hover">商城</p>
	<?php else: ?>
	<img src="/Public/images/sc.png">
	<p>商城</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/article/index/id/1/spread/<?php echo (session('userID')); ?>">
	<?php if($cid == 1): ?><img src="/Public/images/xm1.png">
	<p class="hover">项目</p>
	<?php else: ?>
	<img src="/Public/images/xm.png">
	<p>项目</p><?php endif; ?>
	</a>
	</div>
	<div class="fdh">
	<a href="/index.php/Index/member/index/spread/<?php echo (session('userID')); ?>">
	<?php if(CONTROLLER_NAME == 'Member'): ?><img src="/Public/images/me1.png">
	<p class="hover">我的</p>
	<?php else: ?>
	<img src="/Public/images/me.png">
	<p>我的</p><?php endif; ?>
	</a>
	</div>
</div>
<script type="text/javascript" src="/Public/JS/check.js"></script>
</body>
</html>