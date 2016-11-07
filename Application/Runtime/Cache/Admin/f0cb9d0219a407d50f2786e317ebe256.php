<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/zyq/index.php/Admin/Goods/insert"
	 class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<?php $__FOR_START_20374__=0;$__FOR_END_20374__=11;for($i=$__FOR_START_20374__;$i < $__FOR_END_20374__;$i+=1){ ?><div class="unit">
					<input id="testFileInput-<?php echo ($i); ?>" type="file" name="imgshow<?php echo ($i); ?>" 
						uploaderOption="{
							swf:'/zyq/Public/DWZ/uploadify/scripts/uploadify.swf',
							uploader:'/zyq/index.php/Admin/Goods/uploadImg',
							formData:{index:<?php echo ($i); ?>,id:<?php echo ($id); ?>},
							buttonText:'上传展示图片-<?php echo ($i); ?>',
							fileSizeLimit:'3072KB',
							fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;',
							fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;',
							auto:true,
							multi:false,
							onUploadSuccess:uploadifySuccess,
							onQueueComplete:uploadifyQueueComplete
						}"
					/>
				</div><?php } ?>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"lf.e;;lfc.....ler><button type="submit">Submit</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
			</ul>
		</div>
	</form>
</div>