<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends BaseModel {
	/**
	 * 
	 */
	public function tree() {
		$tree = array(
			0 => array(
				"id" 	=>	1,
			    "text" 	=>	"Node 1",
			    "state"	=>	"closed",
			),
		);
		
		return $tree;
	}
	
	/**
	 * 获取用户信息
	 */
	public function getUerInfo($id) {
		// query map
		$where = array();
		$where['id'] = array('eq', $id);
		
		// find
		$data = $this->field('account, name')->where($where)->find();
		
		return $data;
	}
	
	/**
	 * get user name
	 */
	public function getUserName($id) {
		// query map
		$where = array();
		$where['id'] = array('eq', $id);
		
		// find
		$value = $this->where($where)->getField('name');
		if (false == $value || null === $value) {
			$value = '';
		}
		
		return $value;
	}
	
	/**
	 * bref:	data filter
 	 * param:	&$data
	 */
	public function dataFilter(&$data) {
		$arry_usertype = array('个人用户', '企业用户');
  		$arry_sex= array('男', '女');
		
		$data['usertype'] = $arry_usertype[$data['usertype']];
		$data['sex'] = $arry_sex[$data['sex']];
	}
}