<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/zyq/index.php/Admin/Category/insert"
	 class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>类目-中文：</label>
				<input type="text" name="categoryzh" class="required" maxlength="20" size="30"
					remote="/zyq/index.php/Admin/Category/vlidateExist" />
			</div>
			<div class="unit">
				<label>类目-英文：</label>
				<input type="text" name="categoryen" class="required" maxlength="20" size="30"
					remote="/zyq/index.php/Admin/Category/vlidateExist" />
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"lf.e;;lfc.....ler><button type="submit">Submit</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
			</ul>
		</div>
	</form>
</div>

<script language="JavaScript">
	function checkName(){
		ThinkAjax.send('/zyq/index.php/Admin/Category/checkAccount/','ajax=1&account='+$F('account'));
	}
</script>