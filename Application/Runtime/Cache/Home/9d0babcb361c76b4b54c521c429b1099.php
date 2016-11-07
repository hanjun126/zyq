<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>联系月子季</title>
		
		<link rel="stylesheet" type="text/css" href="/yz/Public/style/hui.css"/>
		<link rel="stylesheet" type="text/css" href="/yz/Public/style/public.css"/>
		<link rel="stylesheet" type="text/css" href="/yz/Public/style/about/index.css"/>
	</head>
	<body>
		<div class="block-head min-width">
	<div class="container">
		<div class="line flex-justify-content-sb">
			<div class="welcome">
				> 欢迎登陆帽牌货冒菜官网
			</div>
			<div class="tel">
				<span class="jm">加盟热线</span>
				<span class="num">400-0838-683</span>
				<div class="serach">
					<input class="key" type="text" name="search" id="search" value="" />
					<button class="btn"></button>
				</div>
			</div>
		</div>
		<div class="line flex-justify-content-sb">
			<div class="log">
				<a href="/yz/index.php/Home/Index/index">
					<img src="/yz/Public/img/logo.png" alt="" />
				</a>
			</div>
			<ul class="nav">
				<li>
					<a href="/yz/index.php/Home/Index/index">
						<span class="zh">首 页</span>
						<span class="en">HOME</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/About/index">
						<span class="zh">关于帽牌货</span>
						<span class="en">ABOUT</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/Join/index">
						<span class="zh">加盟帽牌货</span>
						<span class="en">JOIN</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/Taste/index">
						<span class="zh">品味帽牌货</span>
						<span class="en">TASTE</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/News/index">
						<span class="zh">帽牌货动态</span>
						<span class="en">NEWS</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/Contact/index">
						<span class="zh">联系帽牌货</span>
						<span class="en">CONTACT</span>
					</a>
				</li>
				<li>
					<a href="/yz/index.php/Home/Comment/index">
						<span class="zh">吃货点评</span>
						<span class="en">COMMENT</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<script src="/yz/Public/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
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
		<div class="container block-indicate">
	<div class="line flex-justify-content-end">
		<div class="txt">
			<?php echo ($indicate); ?><br />
			MAO MASTER
		</div>
	</div>
</div>
		
		<div class="container padding-tb-50px">
			<div class="line">
				<div class="block-menu">
					<ul class="">
						<li class="title">联系月子季</li>
						<li><a href="#">联系方式</a></li>
						<li><a href="#">人才计划</a></li>
					</ul>
					<div class="tel">
						<span>加盟热线</span><br />
						400-0838-683
					</div>
				</div>
				<div class="flex-flex-1">
					<div class="line block-guid">
						<a href="/yz/index.php/Home/Index/index">首页</a>
						&gt; 联系月子季 &gt; 联系方式
					</div>
					<div class="line block-show-title">
						联系方式
					</div>
					<div class="line">
						<h1>公司地址</h1>
						<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
  <!--百度地图容器-->
  <div style="width:697px;height:550px;border:#ccc solid 1px;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(103.996307,30.613049);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    
    initMap();//创建和初始化地图
</script>
</html>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container block-recommend">
	<ul class="line flex-justify-content-sb">
		<li class="pre"></li>
		<li>
			<a href="#">
				<img src="/yz/Public/img/hz.jpg" alt="" />
			</a>
		</li>
		<li>
			<a href="#">
				<img src="/yz/Public/img/hz.jpg" alt="" />
			</a>
		</li>
		<li>
			<a href="#">
				<img src="/yz/Public/img/hz.jpg" alt="" />
			</a>
		</li>
		<li>
			<a href="#">
				<img src="/yz/Public/img/hz.jpg" alt="" />
			</a>
		</li>
		<li>
			<a href="#">
				<img src="/yz/Public/img/hz.jpg" alt="" />
			</a>
		</li>
		<li class="next"></li>
	</ul>
</div>
		<div class="block-foot">
	<div class="container padding-tb-40px info">
		<div class="line flex-justify-content-sb">
			<div class="plan display-flex flex-direction-column">
				<img class="item margin-tb-30px" src="/yz/Public/img/foot_logo.png" alt="" />
				<img class="item margin-tb-30px" src="/yz/Public/img/foot_logo1.png" alt="" />
			</div>
			<div>
				<ul class="contact">
					<li class="title">
						联系冒牌货<br />
						<span>CONTACT US</span>
					</li>
					<li>
						<span>电话 -</span><br />
						400 - 0838 - 683
					</li>
					<li>
						<span>公司地址 -</span><br />
						四川省 成都市 武侯区锦绣路保利中心C栋17楼1720号
					</li>
					<li>
						<span>总店地址 -</span><br />
						四川省 什邡市 中立步行街88号
					</li>
				</ul>
				<div class="display-flex flex-justify-content-sb share">
        	<div class="tip">
        		PLEASE CLICK HERE<br>
          	TO SHARE, 
        	</div>
        	<div class="">
        		<a href="#"><img src="/yz/Public/img/xn.jpg" width="23" height="23"></a>
        		<a href="#"><img src="/yz/Public/img/fs.jpg" width="23" height="23"></a>
        		<a href="#"><img src="/yz/Public/img/t.jpg" width="23" height="23"></a>
        		<a href="#"><img src="/yz/Public/img/f.jpg" width="23" height="23"></a>
        		<a href="#"><img src="/yz/Public/img/g.jpg" width="23" height="23"></a>
        	</div>
      	</div>
			</div>
			<div class="collect">
				<div class="title">
					留言板<br />
					<span>MESSAGE</span>
				</div>
				<ul>
          <li>
            <input type="text" style=" width:342px; height:30px; line-height:30px; background:#313131; border:1px solid #5d5d5d; color:#8a8a8a; font-size:12px; padding:0px 10px;  -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;" value="姓名 -">
          </li>
          <li>
            <input type="text" style=" width:342px; height:30px; line-height:30px; background:#313131; border:1px solid #5d5d5d; color:#8a8a8a; font-size:12px; padding:0px 10px;  -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;" value="电话 -">
          </li>
          <li>
            <input type="text" style=" width:342px; height:30px; line-height:30px; background:#313131; border:1px solid #5d5d5d; color:#8a8a8a; font-size:12px; padding:0px 10px;  -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;" value="邮箱 -">
          </li>
          <li>
            <textarea name="" cols="" rows="" style=" width:342px; height:110px; line-height:30px; background:#313131; border:1px solid #5d5d5d; color:#8a8a8a; font-size:12px; padding:0px 10px;  -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; overflow:hidden;">内容 -
            </textarea>
          </li>
          <li style="text-align:right; margin-top:22px;">
            <input name="" type="submit" value="" style=" width:126px; height:22px; background:url(/yz/Public/img/an.jpg) no-repeat; border:none; cursor:pointer;">
          </li>
        </ul>
			</div>
		</div>
	</div>
	<div class="container padding-tb-10px copyright">
		<div class="line flex-justify-content-end">
			<div class="text">
				CopyRight @ 2015 Mao Master . ALL Right Reserved     蜀ICP备12028461号-4
			</div>
		</div>
	</div>
</div>
		
		<script src="/yz/Public/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			});
		</script>
	</body>
</html>