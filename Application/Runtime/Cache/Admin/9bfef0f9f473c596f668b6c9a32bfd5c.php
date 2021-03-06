<?php if (!defined('THINK_PATH')) exit();?><!--
	作者：hanjun126@163.com
	时间：2016-06-10
	描述：分页参数
-->
<form id="pagerForm" action="/zyq/index.php/Admin/Category" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="${model.numPerPage}" />
	<input type="hidden" name="orderField" value="${param.orderField}"/>
	<input type="hidden" name="orderDirection" value="${param.orderDirection}"/>
	
	<input type="hidden" name="_numPerPage" value="<?php echo ($numPerPage); ?>" />
	<input type="hidden" name="_orderField" value="<?php echo ($sort); ?>"/>
	<input type="hidden" name="_orderDirection" value="<?php echo ($order); ?>"/>
</form>


<!--
	作者：hanjun126@163.com
	时间：2016-06-10
	描述：搜索
-->
<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="/zyq/index.php/Admin/Category" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>用户名：</label>
				<input type="text" name="name" value="<?php echo ($search["name"]); ?>"/>
			</li>
			<li>
				<label>用户名：</label>
				<input type="text" name="xx" value="<?php echo ($search["xx"]); ?>"/>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<!--
	作者：hanjun126@163.com
	时间：2016-06-10
	描述：内容
-->
<div class="pageContent">
	<!--
		作者：hanjun126@163.com
		时间：2016-06-10
		描述：数据操作
	-->
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/zyq/index.php/Admin/Category/add" target="dialog" mask="true"><span>新增</span></a></li>
			<li><a class="edit" href="/zyq/index.php/Admin/Category/edit/id/{sid}" target="dialog" mask="true" warn="请选择用户"><span>编辑</span></a></li>
			<li><a class="delete" href="/zyq/index.php/Admin/Category/del/id/{sid}" target="ajaxTodo" title="你确定要删除吗？" warn="请选择用户"><span>删除</span></a></li>
		</ul>
	</div>

	<!--
		作者：hanjun126@163.com
		时间：2016-06-10
		描述：表格显示数据
	-->
	<table class="table" width="100%" asc="asc" desc="desc" layoutH="138">
		<thead>
			<tr>
				<th width="50" orderField="id" <?php if(($sort) == "id"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>序号</th>
				<th orderField="name" <?php if(($sort) == "name"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>分类名称</th>
				<th orderField="sort" <?php if(($sort) == "sort"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>排序</th>
				<th orderField="enable" <?php if(($sort) == "enable"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>是否可以</th>
				<th orderField="title" <?php if(($sort) == "title"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>标题</th>
				<th orderField="keywords" <?php if(($sort) == "keywords"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>关键字</th>
				<th orderField="description" <?php if(($sort) == "description"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>描述</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo["id"]); ?>">
					<td><?php echo ($i); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["sort"]); ?></td>
					<td><?php echo ($vo["enable"]); ?></td>
					<td><?php echo ($vo["title"]); ?></td>
					<td><?php echo ($vo["keywords"]); ?></td>
					<td><?php echo ($vo["description"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<!--
		作者：hanjun126@163.com
		时间：2016-06-10
		描述：页码显示
	-->
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="1" <?php if(($numPerPage) == "1"): ?>selected="selected"<?php endif; ?>>1</option>
				<option value="20" <?php if(($numPerPage) == "20"): ?>selected="selected"<?php endif; ?>>20</option>
				<option value="50" <?php if(($numPerPage) == "50"): ?>selected="selected"<?php endif; ?>>50</option>
				<option value="100" <?php if(($numPerPage) == "100"): ?>selected="selected"<?php endif; ?>>100</option>
				<option value="200" <?php if(($numPerPage) == "200"): ?>selected="selected"<?php endif; ?>>200</option>
			</select>
			<span>条，共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>