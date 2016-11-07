<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/zyq/index.php/Admin/Order/insert"
	 class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>标题：</label>
				<input type="text" name="title" class="required" maxlength="20" size="30" />
			</div>
			<div class="unit">
				<label>类目：</label>
				<select class="combox" name="categoryid">
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["categoryzh"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="unit">
				<label>卖点：</label>
				<input type="text" name="usp" class="required" maxlength="20" size="100" />
			</div>
			<div class="unit">
				<label>规格：</label>
				<input type="text" name="specs" class="required" maxlength="20" size="100" />
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">Submit</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
			</ul>
		</div>
	</form>
</div>