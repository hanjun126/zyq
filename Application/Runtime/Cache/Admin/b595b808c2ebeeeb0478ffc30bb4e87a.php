<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台管理中心欢迎您</title>

		<link href="/zyq/Public/DWZ/themes/default/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="/zyq/Public/DWZ/themes/css/core.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="/zyq/Public/DWZ/themes/css/print.css" rel="stylesheet" type="text/css" media="print" />
		<link href="/zyq/Public/DWZ/uploadify/css/uploadify.css" rel="stylesheet" type="text/css"media="screen" />
		<!--[if IE]>
		<link href="/zyq/Public/DWZ/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
		<![endif]-->

		<!--[if lt IE 9]><script src="/zyq/Public/DWZ/js/speedup.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/js/jquery-1.11.3.min.js" type="text/javascript"></script><![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="/zyq/Public/DWZ/js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<!--<![endif]-->

		<script src="/zyq/Public/DWZ/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/js/jquery.validate.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/js/jquery.bgiframe.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/xheditor/xheditor-1.2.2.min.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/uploadify/scripts/jquery.uploadify.js" type="text/javascript"></script>

		<!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
		<script src="/zyq/Public/DWZ/chart/raphael.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/chart/g.raphael.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/chart/g.bar.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/chart/g.line.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/chart/g.pie.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/chart/g.dot.js" type="text/javascript"></script>

		<script src="/zyq/Public/DWZ/bin/dwz.min.js" type="text/javascript"></script>
		<script src="/zyq/Public/DWZ/js/dwz.regional.zh.js" type="text/javascript"></script>

		<script type="text/javascript">
			function fleshVerify() {
				// 重载验证码
				$('#verifyImg').attr("src", '/zyq/index.php/Admin/Public/verify/' + new Date().getTime());
			}
		
			$(function() {
				DWZ.init("/zyq/Public/DWZ/dwz.frag.xml", {
					loginUrl: "login_dialog.html",
					loginTitle: "登录", // 弹出登录对话框
					//		loginUrl:"login.html",	// 跳到登录页面
					statusCode: {
						ok: 200,
						error: 300,
						timeout: 301
					}, //【可选】
					pageInfo: {
						pageNum: "pageNum",
						numPerPage: "numPerPage",
						orderField: "orderField",
						orderDirection: "orderDirection"
					}, //【可选】
					keys: {
						statusCode: "statusCode",
						message: "message"
					}, //【可选】
					ui: {
						hideMode: 'offsets'
					}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
					debug: false, // 调试模式 【true|false】
					callback: function() {
						initEnv();
						$("#themeList").theme({
							themeBase: "/zyq/Public/DWZ/themes"
						}); // themeBase 相对于index页面的主题base路径
					}
				});
			});
		</script>
	</head>

	<body>
		<div id="layout">
			<div id="header">
				<div class="headerNav">
					<a class="logo" href="http://j-ui.com">标志</a>
					<ul class="nav">
						<li id="switchEnvBox"><a href="javascript:">（<span>北京</span>）切换城市</a>
							<ul>
								<li><a href="sidebar_1.html">北京</a></li>
								<li><a href="sidebar_2.html">上海</a></li>
								<li><a href="sidebar_2.html">南京</a></li>
								<li><a href="sidebar_2.html">深圳</a></li>
								<li><a href="sidebar_2.html">广州</a></li>
								<li><a href="sidebar_2.html">天津</a></li>
								<li><a href="sidebar_2.html">杭州</a></li>
							</ul>
						</li>
						<li><a href="donation.html" target="dialog" height="400" title="捐赠 & DWZ学习视频">捐赠</a></li>
						<li><a href="changepwd.html" target="dialog" width="600">设置</a></li>
						<li><a href="http://www.cnblogs.com/dwzjs" target="_blank">博客</a></li>
						<li><a href="http://weibo.com/dwzui" target="_blank">微博</a></li>
						<li><a href="login.html">退出</a></li>
					</ul>
					<ul class="themeList" id="themeList">
						<li theme="default"><div class="selected">蓝色</div></li>
						<li theme="green"><div>绿色</div></li>
						<li theme="azure"><div>红色</div></li>
						<li theme="purple"><div>紫色</div></li>
						<li theme="silver"><div>银色</div></li>
						<li theme="azure"><div>天蓝</div>	</li>
					</ul>
				</div>
				<!-- navMenu -->
			</div>

			<div id="leftside">
				<div id="sidebar_s">
					<div class="collapse">
						<div class="toggleCollapse">
							<div></div>
						</div>
					</div>
				</div>
				<div id="sidebar">
					<div class="toggleCollapse">
						<h2>主菜单</h2>
						<div>收缩</div>
					</div>

					<div class="accordion" fillSpace="sidebar">
						<div class="accordionHeader">
							<h2><span>Folder</span>应用</h2>
						</div>
						<div class="accordionContent">
							<ul class="tree treeFolder">
								<li>
									<a href="#">基本配置</a>
									<ul>
										<li><a href="/zyq/index.php/Admin/Config" target="navTab" rel="Config">配置中心</a></li>
										<li><a href="/zyq/index.php/Admin/Carousel" target="navTab" rel="Carousel">轮播设置</a></li>
									</ul>
								</li>
								<li>
									<a href="#">用户管理</a>
									<ul>
										<li><a href="/zyq/index.php/Admin/Admin" target="navTab" rel="Category">管理员</a></li>
										<li><a href="/zyq/index.php/Admin/User" target="navTab" rel="Goods">用户管理</a></li>
									</ul>
								</li>
								<li>
									<a href="#">产品管理</a>
									<ul>
										<li><a href="/zyq/index.php/Admin/Category" target="navTab" rel="Category">类目管理</a></li>
										<li><a href="/zyq/index.php/Admin/Goods" target="navTab" rel="Goods">产品管理</a></li>
									</ul>
								</li>
								<li>
									<a href="#">订单中心</a>
									<ul>
										<li><a href="/zyq/index.php/Admin/Order/index/type/0" target="navTab" rel="Category">所有订单</a></li>
										<li><a href="/zyq/index.php/Admin/Order/index/type/1" target="navTab" rel="Goods">已支付订单</a></li>
										<li><a href="/zyq/index.php/Admin/Order/index/type/2" target="navTab" rel="Goods">已发货</a></li>
										<li><a href="/zyq/index.php/Admin/Order/index/type/3" target="navTab" rel="Goods">已完成</a></li>
										<li><a href="/zyq/index.php/Admin/Order/index/type/4" target="navTab" rel="Goods">已取消</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="container">
				<div id="navTab" class="tabsPage">
					<div class="tabsPageHeader">
						<div class="tabsPageHeaderContent">
							<!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
							<ul class="navTab-tab">
								<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
							</ul>
						</div>
						<div class="tabsLeft">left</div>
						<!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
						<div class="tabsRight">right</div>
						<!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
						<div class="tabsMore">more</div>
					</div>
					<ul class="tabsMoreList">
						<li><a href="javascript:;">我的主页</a></li>
					</ul>
					<div class="navTab-panel tabsPageContent layoutBox">
						<div class="page unitBox">
							<div class="accountInfo">
								<p><span>猪鼻孔工作室</span></p>
								<p>猪鼻孔工作室:<a href="http://weibo.com/dwzui" target="_blank">http://weibo.com/dwzui</a></p>
							</div>
							<div class="pageFormContent" layoutH="80">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="footer">
			Copyright &copy; 2010 <a href="demo_page2.html" target="dialog">DWZ团队</a> 京ICP备15053290号-2
		</div>
	</body>
</html>