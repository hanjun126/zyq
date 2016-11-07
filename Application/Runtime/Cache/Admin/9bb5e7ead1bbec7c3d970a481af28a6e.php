<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/zyq/index.php/Admin/Config/update"
	 class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>网站标题：</label>
				<input type="text" name="wzbt" class="required" maxlength="200" size="99" value="<?php echo ($data["wzbt"]); ?>" />
			</div>
			<div class="unit">
				<label>网站版权：</label>
				<input type="text" name="wzbq" class="required" maxlength="200" size="99" value="<?php echo ($data["wzbq"]); ?>" />
			</div>
			<div class="unit">
				<label>公司简称：</label>
				<input type="text" name="gsjc" class="required" maxlength="200" size="99" value="<?php echo ($data["gsjc"]); ?>" />
			</div>
			<div class="unit">
				<label>公司全称：</label>
				<input type="text" name="gsqc" class="required" maxlength="200" size="99" value="<?php echo ($data["gsqc"]); ?>" />
			</div>
			<div class="unit">
				<label>公司地址：</label>
				<input type="text" name="gsdz" class="required" maxlength="200" size="99" value="<?php echo ($data["gsdz"]); ?>" />
			</div>
			<div class="unit">
				<label>热线电话：</label>
				<input type="text" name="rxdh" class="required" maxlength="20" size="99" value="<?php echo ($data["rxdh"]); ?>" />
			</div>
			<div class="unit">
				<label>企业QQ：</label>
				<input type="text" name="qyqq" class="required" maxlength="20" size="99" value="<?php echo ($data["qyqq"]); ?>" />
			</div>
			<div class="unit">
				<label>企业邮箱：</label>
				<input type="text" name="qyyx" class="required email" size="99" value="<?php echo ($data["qyyx"]); ?>" />
			</div>
			<div class="unit">
				<label>服务时段：</label>
				<input type="text" name="fwsd" class="required" maxlength="20" size="99" value="<?php echo ($data["fwsd"]); ?>" />
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
			</ul>
		</div>
	</form>
</div>