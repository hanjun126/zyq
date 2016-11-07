<?php
namespace Admin\Controller;
use Think\Controller;

class ConfigController extends Controller {
	/*
	 * index
	 */
	function index() {
		$config = D('Config');
		$list = $config->select();
		
		$data = array();
		foreach ($list as $key=>$value) {
			$data[$value['ckey']] = $value['cvalue'];
		}
		
		$this->assign('data', $data);
		$this->display();
	}
	
	/*
	 * update
	 */
	function update() {
		$config = D('Config');
		foreach ($_POST as $key=>$value) {
			$map['ckey'] = array('eq', $key);
			$data['cvalue'] = $value;
			$config->where($map)->save($data);	// 写入数据到数据库
		}
		
		// ajax返回
		$data = array();
		$data['statusCode'] = 200;
		$data['message'] = '更新成功';
		$data['navTabId'] = CONTROLLER_NAME;
		$data['callbackType'] = '';
		$data['rel'] = '';
		$data['forwardUrl'] = '';
		$this->ajaxReturn($data);
	}
}