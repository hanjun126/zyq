<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>米斯户外家具-<?php echo ($data["title"]); ?></title>
		
		<link rel="stylesheet" type="text/css" href="/fdc/Public/Style/public.css"/>
		<link rel="stylesheet" type="text/css" href="/fdc/Public/Style/Index/detail.css"/>
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
				<div class="detail">
					<div class="imgs">
						<div class="cur" >
							<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
						</div>
						<div class="list">
							<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
							<img src="http://i3.mifile.cn/a4/25ba3a73-7dfc-485c-8313-867ff457e741"/>
							<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
							<img src="http://i3.mifile.cn/a4/25ba3a73-7dfc-485c-8313-867ff457e741"/>
							<img src="http://i3.mifile.cn/a4/aef22a68-7bf1-409d-9ee6-5e56e8cb274d"/>
						</div>
					</div>
					<div class="desc">
						
					</div>
				</div>
			</div>
			
			<div class="foot">
	违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
</div>
		</div>
		
		<script src="/fdc/Public/Js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.list img').click(function(){
					var imgPath = $(this).attr('src');
					$('.cur img').attr('src', imgPath);
				});
			});
		</script>
	</body>
</html>