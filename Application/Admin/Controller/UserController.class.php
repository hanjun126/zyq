<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends BaseController {
	/**
	 * _lsit-filter
	 */
	protected function _onListFilter(&$voList) {
		$usertypeArray = array('个人用户', '企业用户');
		$sexArray = array('男', '女');
		
		foreach ($voList as $key=>$value) {
			$voList[$key]['usertype'] = $usertypeArray[$value['usertype']];
			$voList[$key]['sex'] = $sexArray[$value['sex']];
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