<?php
namespace Admin\Controller;
use Think\Controller;

class CarouselController extends BaseController {
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
	 * insert-before
	 */
	protected function onInsertBefore() {
		// 实例化上传类
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;	// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');	// 设置附件上传类型 
		$upload->rootPath  = './Public/uploads/';
		$upload->savePath  = '';	// 设置附件上传目录
		
		// 上传单个文件
		$info = $upload->uploadOne($_FILES['imgpath']);
		if (!$info) {	// 上传错误提示错误信息
			$data = array();
			$data['statusCode'] = 300;
			$data['message'] = '增加失败';
			$data['navTabId'] = CONTROLLER_NAME;
			$data['callbackType'] = 'closeCurrent';
			$data['rel'] = '';
			$data['forwardUrl'] = '';
			
			$this->ajaxReturn($data);
		} else {	// 上传成功 获取上传文件信息
			$_POST['imgpath'] = $info['savepath'].$info['savename'];
		}
	}
	
	/**
	 * del-before
	 */
	protected function onDelBefore($id) {
		// 查找图片路径
		$model = D(CONTROLLER_NAME);
		$map['id'] = array('eq', $id);
		$imgpath = $model->where($map)->getField('imgpath');
		
		unlink('./Public/uploads/'.$imgpath);
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