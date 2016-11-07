<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>米斯户外家具</title>
		
		<link rel="stylesheet" type="text/css" href="/fdc/Public/Style/public.css"/>
		<link rel="stylesheet" type="text/css" href="/fdc/Public/Style/Index/more.css"/>
	</head>
	<body>
		<div class="wapper">
			<div class="head">
	
</div> 
			
			<div class="content">
				<div class="category">
					<ul>
						<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="/fdc/index.php/Home/Index/more/id/<?php echo ($vo["id"]); ?>">
									<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
									<span><?php echo ($vo["categoryzh"]); ?><br /><?php echo ($vo["categoryen"]); ?></span>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="list">
					<ul>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="/fdc/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>">
									<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
									<div class="title"><?php echo ($vo["title"]); ?></div>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			
			<div class="foot">
	违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
</div>
		</div>
	</body>
</html>