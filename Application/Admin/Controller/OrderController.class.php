<?php
namespace Admin\Controller;
use Think\Controller;

class OrderController extends BaseController {
	/**
	 * _lsit-filter
	 */
	protected function _onListFilter(&$voList) {
		//$model = D('Category');
		//$category = $model->getField('id, categoryzh');
		
		//foreach ($voList as $key=>$value) {
		//	$voList[$key]['category'] = $category[$value['categoryid']];
		//}
	}
	
	
	/**
	 * 搜索条件处理
	 */
	public function _search() {
		$map = array();
		
		// 查询条件
		$search = array();
		$search['account'] = I('request.account', '');
		$search['xx'] = I('request.xx', '');
		
		// 模板显示赋值
		$this->assign('search', $search);
		
		return $map;
	}
}