<?php if (!defined('THINK_PATH')) exit();?><!--
	作者：hanjun126@163.com
	时间：2016-06-10
	描述：分页参数
-->
<form id="pagerForm" action="/zyq/index.php/Admin/Order" method="post">
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
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="/zyq/index.php/Admin/Order" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>用户名：</label>
				<input type="text" name="account" value="<?php echo ($search["account"]); ?>"/>
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
			<li><a class="edit" href="/zyq/index.php/Admin/Order/Order/detail/id/{sid}" target="navTab" rel="OrderDetail" warn="请选择"><span>订单详情</span></a></li>
			<li><a class="delete" href="/zyq/index.php/Admin/Order/cancel/id/{sid}" target="ajaxTodo" title="你确定要删除吗？" warn="请选择"><span>取消</span></a></li>
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
				<th width="200" orderField="sn" <?php if(($sort) == "sn"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>订单号</th>
				<th width="120" orderField="amount" <?php if(($sort) == "amount"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>数量</th>
				<th width="120" orderField="total" <?php if(($sort) == "total"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>总价</th>
				<th width="120" orderField="ordertime" <?php if(($sort) == "ordertime"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>下单时间</th>
				<th width="120" orderField="status" <?php if(($sort) == "status"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>状态</th>
				<th width="120" orderField="pay" <?php if(($sort) == "pay"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>是否支付</th>
				<th width="120" orderField="paytype" <?php if(($sort) == "paytype"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>支付类型</th>
				<th width="120" orderField="paytime" <?php if(($sort) == "paytime"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>支付时间</th>
				<th width="120" orderField="contact" <?php if(($sort) == "contact"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>联系人</th>
				<th width="120" orderField="phone" <?php if(($sort) == "phone"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>电话</th>
				<th width="120" orderField="address" <?php if(($sort) == "address"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>地址</th>
				<th width="120" orderField="post" <?php if(($sort) == "post"): ?>class="<?php echo ($order); ?>"<?php endif; ?>>邮编</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['id']); ?>">
					<td><?php echo ($i); ?></td>
					<td><?php echo ($vo["sn"]); ?></td>
					<td><?php echo ($vo["amount"]); ?></td>
					<td><?php echo ($vo["total"]); ?></td>
					<td><?php echo ($vo["ordertime"]); ?></td>
					<td><?php echo ($vo["status"]); ?></td>
					<td><?php echo ($vo["pay"]); ?></td>
					<td><?php echo ($vo["paytype"]); ?></td>
					<td><?php echo ($vo["paytime"]); ?></td>
					<td><?php echo ($vo["contact"]); ?></td>
					<td><?php echo ($vo["phone"]); ?></td>
					<td><?php echo ($vo["address"]); ?></td>
					<td><?php echo ($vo["post"]); ?></td>
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