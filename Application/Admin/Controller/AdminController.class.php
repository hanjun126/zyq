<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends BaseController {
	/**
	 * _lsit-filter
	 */
	protected function _onListFilter(&$voList) {
		$sexArray = array('男', '女');
		$priArray = array('普通', '高级', '特级');
		
		foreach ($voList as $key=>$value) {
			$voList[$key]['sex'] = $sexArray[$value['sex']];
			$voList[$key]['pri'] = $priArray[$value['pri']];
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
		$search['name'] = I('request.name', '');
		
		// 模板显示赋值
		$this->assign('search', $search);
		
		return $map;
	}
}