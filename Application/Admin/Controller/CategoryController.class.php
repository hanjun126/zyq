<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends BaseController {
	/**
	 * _lsit-filter
	 */
	protected function _onListFilter(&$voList) {
		$enableArray = array('男', '女');
		
		foreach ($voList as $key=>$value) {
			$voList[$key]['enable'] = $enableArray[$value['enable']];	// 是否可用
			
			$name = $value['name'];
			for ($i = 0; $i != $value['lv']; ++$i) {
				$name = '-'.$name;
			}
			
			$name = '|-'.$name;
			
			$voList[$key]['name'] = $name;
		}
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