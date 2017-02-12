<?php
namespace Admin\Model;
use Think\Model;

class BaseModel extends Model {
	/**
	 * 获取日期时间
	 */
	public function getDateTime() {
		return date('Y-m-d H:i:s', time());
	}
	
	public function getDate() {
		return date('Y-m-d', time());
	}
	
	public function getTime() {
		return date('H:i:s', time());
	}
	
	public function getYear() {
		return date('Y', time());
	}
}