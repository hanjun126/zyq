<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends BaseController {
	/**
	 * add-before
	 */
	protected function onAddBefore() {
		$model = D('Category');
		$category = $model->field('id, categoryzh')->select();
		
		$this->assign('category', $category);
	}
	
	/**
	 * edit-before
	 */
	protected function onEditBefore(&$map) {
		$model = D('Category');
		$category = $model->field('id, categoryzh')->select();
		
		$this->assign('category', $category);
	}
	
	/**
	 * _lsit-filter
	 */
	protected function _onListFilter(&$voList) {
		$model = D('Category');
		$category = $model->getField('id, categoryzh');
		
		foreach ($voList as $key=>$value) {
			$voList[$key]['category'] = $category[$value['categoryid']];
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
	
	/**
	 * upload
	 */
	public function upload() {
		$this->assign('id', $_GET['id']);
		$this->display();
	}
	
	/**
	 * _upload
	 */
	public function uploadImg() {
		$upload = new \Think\Upload();	// 实例化上传类
		$upload->maxSize = 3145728;	// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');	// 设置附件上传类型 
		$upload->rootPath  = './Public/Uploads/';
		$upload->savePath  = '';	// 设置附件上传目录
		$info = $upload->upload();
		
		if (!$info) {	// 上传错误提示错误信息
			echo $this->error($upload->getError());
		} else {	// 上传成功 获取上传文件信息 
			foreach ($info as $file) {
		 		$path = $file['savepath'].$file['savename'];
			}
			
			$model = D('Goods');
			$data['id'] = $_POST['id'];
			$data['imgshow'.$_POST['index']] = $path;
			$model->save($data);
			
			echo '上传成功';
		}
	}
}