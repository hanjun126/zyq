<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/zyq/index.php/Admin/Category/update"
	 class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>类目-中文：</label>
				<input type="text" name="categoryzh" class="required" maxlength="20" size="30" value="<?php echo ($data["categoryzh"]); ?>" />
			</div>
			<div class="unit">
				<label>类目-英文：</label>
				<input type="text" name="categoryren" class="required" maxlength="20" size="30" value="<?php echo ($data["categoryen"]); ?>" />
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