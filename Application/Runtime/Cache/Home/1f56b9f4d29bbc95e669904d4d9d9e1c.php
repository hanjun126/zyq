<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<title>案例展示 - 逸家盛宇办公家具</title>
		
		<link rel="stylesheet" type="text/css" href="/zyq/Public/third/awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/zyq/Public/style/hui.css"/>
		<link rel="stylesheet" type="text/css" href="/zyq/Public/style/public.css"/>
		<link rel="stylesheet" type="text/css" href="/zyq/Public/style/cases/index.css"/>
	</head>
	<body>
		<div class="block-head">
	<div class="container toolbar">
		<div class="line">
			欢迎光临 登录注册
			<a href="/zyq/index.php/Home/Shopping/index">购物车</a>
			<li class="tel"><i class="icon-phone"></i>135-9050-0758</li>
		</div>
	</div>
	<div class="container nav">
		<div class="line flex-justify-content-sb">
			<div class="logo">
				<a href="/zyq/index.php/Home/Index/index">
					<img src="/zyq/Public/img/logo.png"/>
				</a>
			</div>
			<div class="cl">
				<a href="/zyq/index.php/Home/Index/index">首页</a>
				<a href="/zyq/index.php/Home/Cases/index">案例展示</a>
				<a href="/zyq/index.php/Home/Goods/index/id/0">全部商品</a>
				<a href="/zyq/index.php/Home/Goods/index/id/1">办公沙发</a>
				<a href="/zyq/index.php/Home/Goods/index/id/2">办公椅子</a>
				<a href="/zyq/index.php/Home/Goods/index/id/3">办公桌子</a>
				<a href="/zyq/index.php/Home/Goods/index/id/4">办公柜子</a>
			</div>
		</div>
	</div>
</div>

<script src="/zyq/Public/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".serach").mouseenter(function(){
			$(".serach .key").animate({
		   	width:"160", opacity:"1"
		   },"slow");
		});
		
		$(".serach").mouseleave(function(){
			$(".serach .key").animate({
	   		width:"0",opacity:"0"
	   	}, 1000);
		});
	});
</script>
		
		<div class="container">
			<div class="line">
				<div class="flex-flex-1 block-indicate">
					您的位置：
					<a href="/zyq/index.php/Home/Index/index">首页</a>
					&nbsp;<i class="icon-double-angle-right"></i>&nbsp;
					<span>案例展示</span>
				</div>
			</div>
			
			<div class="line flex-wrap block-cases">
				<?php $__FOR_START_31867__=1;$__FOR_END_31867__=10;for($i=$__FOR_START_31867__;$i < $__FOR_END_31867__;$i+=1){ ?><div class="item flex-row-start">
						<div class="cn flex-flex-1">
							<a href="#">
								<img src="http://i3.mifile.cn/a4/f43035f0-7b18-442c-a022-4708829a67e5"/>
							</a>	
							<div class="name">
								<a href="#">东风雪铁龙中华店-eeeeeee</a>
							</div>
						</div>
					</div><?php } ?>
			</div>
		</div>
		
		<div class="block-foot">
	<div class="container promise">
		<div class="line flex-justify-content-sb">
			<a class="item">
				<b class="b1"></b>
				<p><span>0</span>运费购家具</p>
			</a>
			<a class="item">
				<b class="b2"></b>
				<p><span>30</span>天无理由退货</p>
			</a>
			<a class="item">
				<b class="b3"></b>
				<p>电子发票</p>
			</a>
			<a class="item">
				<b class="b4"></b>
				<p>原厂品质</p>
			</a>
		</div>
	</div>
	<div class="container help">	
		<div class="line flex-justify-content-sb">
			<dl>
				<dt><b class="b1"></b>购买流程</dt>
				<dd><a href="#">· 新手入门</a></dd>
				<dd><a href="#">· 支付宝支付</a></dd>
				<dd><a href="#">· 发票说明</a></dd>
			</dl>
			<dl>
				<dt><b class="b2"></b>配送方式</dt>
				<dd><a href="#">· 配送方式</a></dd>
				<dd><a href="#">· 配送费用</a></dd>
				<dd><a href="#">· 签收须知</a></dd>
			</dl>
			<dl>
				<dt><b class="b3"></b>服务支持</dt>
				<dd><a href="#">· 服务保证</a></dd>
				<dd><a href="#">· 售后服务</a></dd>
				<dd><a href="#">· 售后网点查询</a></dd>
			</dl>
			<dl>
				<dt><b class="b4"></b>品牌服务</dt>
				<dd><a href="#">· 常见问题</a></dd>
				<dd><a href="#">· 相关下载</a></dd>
				<dd><a href="#">· 联系我们</a></dd>
			</dl>
			<dl>
				<dt><b class="b5"></b>联系我们</dt>
				<dd>周一至周五 08:00-21:00</dd>
				<dd>周六、周日 09:00-18:00</dd>
				<dd>
					<a href="">
						<img src="/zyq/Public/img/online-service.png" alt="在线客服"/>
					</a>
				</dd>
			</dl>
		</div>
	</div>
	<div class="container copyright">
		<div class="line">
			<div class="logo">
				<a href="/zyq/index.php/Home/Index/index">
					<img src="/zyq/Public/img/logo.png"/>
				</a>
			</div>
			<div>
				<p>Copyright ©2011-2016 广东步步高电子工业有限公司</p>
				<p>版权所有 保留一切权利粤B2-20080267 | 粤ICP备05100288号</p>
			</div>
		</div>
	</div>
</div>
	</body>
</html>