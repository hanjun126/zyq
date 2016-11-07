<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends BaseController {
  /**
	 * index
	 */
  public function index(){
  	$this->_list();
		
  	$this->display();
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
		$this->assign ('search', $search);
		
		return $map;
	}
}