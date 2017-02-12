<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends BaseController {
	/**
	 * index
	 */
 	public function index() {
  		echo '';
  	}
	
	/**
	 * datagrid
	 */
	public function datagrid() {
		// model
		$model = D(CONTROLLER_NAME);
		
		// select
		$count = $model->count();
		$list = $model
			->page(1, 20)
			->select();
		
		// data filter
		foreach ($list as $key=>&$value) {
			$value['_index'] = $key + 1;
			//$value['DT_RowId'] = '',
			//$value['DT_RowData'] = '',
			$value['DT_RowClass'] = 'text-c';
			//$value['DT_RowAttr'] = '',
			
			$model->dataFilter($value);
		}
		
		// ajax data
		$data = array(
			"draw"				=> I('post.draw'),
    		"recordsTotal"		=> $count,
    		"recordsFiltered"	=> $count,
    		"data" 				=> $list,
    		"error"				=> '',
		);
		
		// ajax return
		$this->ajaxReturn($data);
	}
	
	//////////////////////////////////////
	
	
	/**
	 * add
	 */
  public function add() {
  	$this->onAddBefore();	// add-before
  	$this->display();
  }
	
	/**
	 * add-before
	 */
	protected function onAddBefore() {
	}
	
	/**
	 * insert
	 */
	public function insert() {
		// 获取model
		$model = D(CONTROLLER_NAME);
		$data = array();
		$this->onInsertBefore();	// insert-before
		
		if ($model->create()) {	// 根据表单提交的POST数据创建数据对象
			$result = $model->add();	// 写入数据到数据库
			
			if ($result) {	// 如果主键是自动增长型 成功后返回值就是最新插入的值
				$this->onInsertAfter($insertId);	// insert-after
				$data['statusCode'] = 200;
				$data['message'] = '保存成功';
				$data['navTabId'] = CONTROLLER_NAME;
				$data['callbackType'] = 'closeCurrent';
				$data['rel'] = '';
				$data['forwardUrl'] = '';
			} else {	// 新增失败
				$data['statusCode'] = 300;
				$data['message'] = '新增失败';
			}
		} else {	// 创建数据对象失败
			$data['statusCode'] = 300;
			$data['message'] = '创建数据对象失败';
		}
		
		$this->ajaxReturn($data);
	}
	
	/**
	 * insert-before
	 */
	protected function onInsertBefore() {
	}
	
	/**
	 * insert-after
	 */
	protected function onInsertAfter($insertId) {
	}
	
	/**
	 * edit
	 */
  public function edit() {
  	// 获取model
		$model = D(CONTROLLER_NAME);
  	
  	$map = array();	// 查询数组
		$this->onEditBefore($map);	// edit-before
		
		// 按id加载
		if (isset($_GET['id'])) {
			$map['id'] = array('eq', $_GET['id']);	// id
		}
		
		$field = $this->onEditField();	// field
		$model->field($field);					// 设置查询字段
		$model->where($map);						// where
		$data = $model->find();					// 查询
		$this->onEditAfter($data);			// edit-after
		
		// 显示
		$this->assign('data', $data);
  	$this->display();
  }
	
	/**
	 * edit-field
	 */
	protected function onEditField() {
		return '*';
	}
	
	/**
	 * edit-before
	 */
	protected function onEditBefore(&$map) {
	}
	
	/**
	 * edit-after
	 */
	protected function onEditAfter(&$data) {
	}
	
	/**
	 * update
	 */
	public function update() {
		// 获取model
		$model = D(CONTROLLER_NAME);
		$data = array();
		
		if ($model->create()) {	// 根据表单提交的POST数据创建数据对象
			$result = $model->save();	// 写入数据到数据库
			
			if (false === $result) {	// 保存失败
				$data['statusCode'] = 300;
				$data['message'] = '保存失败';
			} else {	// 更新成功
				$data['statusCode'] = 200;
				$data['message'] = '更新成功';
				$data['navTabId'] = CONTROLLER_NAME;
				$data['callbackType'] = 'closeCurrent';
				$data['rel'] = '';
				$data['forwardUrl'] = '';
			}
		} else {	// 创建数据对象失败
			$data['statusCode'] = 300;
			$data['message'] = '创建数据对象失败';
		}
		
		$this->ajaxReturn($data);
	}
	
	/**
	 * update-before
	 */
	protected function onUpdateBefore($id) {
	}
	
	/**
	 * update-after
	 */
	protected function onUpdateAfter($id) {
	}
	
	/**
	 * del
	 */
  public function del() {
  	// 获取model
		$model = D(CONTROLLER_NAME);
		$data = array();
		
  	$id = $_GET['id'];	// 保存id
		$this->onDelBefore($id);	// del-before
		$rowAffected = $model->delete($id);	// 按id删除
		
		if (false === $rowAffected) {	// 删除出错
			$data['statusCode'] = 300;
			$data['message'] = '删除失败';
		} else {	// 删除成功
			$data['statusCode'] = 200;
			$data['message'] = '删除成功';
			$data['navTabId'] = CONTROLLER_NAME;
			$data['callbackType'] = '';
			$data['rel'] = '';
			$data['forwardUrl'] = '';
				
			$this->onDelAfter($id);	// del-after
		}
		
		$this->ajaxReturn($data);
  }
	
	/**
	 * del-before
	 */
	protected function onDelBefore($id) {
	}
	
	/**
	 * del-after
	 */
	protected function onDelAfter($id) {
	}
	
	/**
	 * 列表查询
	 */
	public function _list() {
		// 获取model
		$model = D(CONTROLLER_NAME);
		
		// 获取查询条件
		$pageNum = I('request.pageNum', 1);
		$numPerPage = I('request.numPerPage', 20);
		$orderField = I('request.orderField', "id");
		$orderDirection = I('request.orderDirection', asc);
		if ($numPerPage == '${model.numPerPage}') {
			$numPerPage = I('request._numPerPage', 1);
		}
		if ($orderField == '${param.orderField}') {
			$orderField = I('request._orderField', "id");
		}
		if ($orderDirection == '${param.orderDirection}') {
			$orderDirection = I('request._orderDirection', asc);
		}
		
		// 查询数据
		$map = $this->_search();	// 查询条件
		$count = $model->where($map)->count(); // 查询总数
		$page = new \Think\Page($count, $numPerPage);	// 实例化分页类 传入总记录数和每页显示的记录数
		$voList = $model
			->where($map)
			->page($pageNum, $numPerPage)
			->order($orderField.' '.$orderDirection)
			->select();
		
		// 模板赋值显示
		$this->_onListFilter($voList);	// _lsit-filter
		$this->assign('list', $voList);
		
		$this->assign('sort', $orderField);
		$this->assign('order', $orderDirection);
		
		$this->assign('totalCount', $count);
		$this->assign('numPerPage', $numPerPage);
		$this->assign('currentPage', $pageNum);
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
	}
	
	/*********************************************************/
	/*********************************************************/
	
	/**
	 * 验证是否存在
	 */
	public function vlidateExist() {
		// 获取model
		$model = D(CONTROLLER_NAME);
		
		foreach ($_GET as $key=>$value) {
			$map[$key] = array(('id' == $key) ? 'neq' : 'eq', $value);
		}
		
		$count = $model->where($map)->Count();
		//echo ($count > 0) ? fasle : true;
		$data = array();
		$data['statusCode'] = 300;
		$data['message'] = '用户名存在';
		$data['navTabId'] = '';
		$data['callbackType'] = '';
		$data['rel'] = '';
		$data['forwardUrl'] = '';
		
		$this->ajaxReturn($data);
	}
	
	/*********************************************************/
	/*********************************************************/
	
	/**
	 * 网格数据-字段
	 */
	protected function onGridField() {
		return '*';
	}
	
	/**
	 * 网格数据-where语句
	 */
	protected function onGridWhere(&$map) {
	}
	
	/**
	 * 网格数据-数据过滤
	 */
	protected function onGridFilter(&$data) {
	}
	
	/**
	 * 构造where map
	 */
	protected function makeWhereMap(&$map, $field, $exp, $condition, $unset=false) {
		switch ($exp) {
			case 'between':
				{
					if ('' !== $condition[0] && '' !== $condition[1]) {
						$map[$field] = array('between', $condition);
					} else if ('' !== $condition[0]) {
						$map[$field] = array('egt', $condition[0]);
					} else if ('' !== $condition[1]) {
						$map[$field] = array('elt', $condition[1]);
					}
				}
				break;
			default:
				{
					if ('' !== $_POST[$field]) {
						$map[$field] = array($exp, $condition);
						if ($unset) {
							unset($_POST[$field]);
						}
					}
				}
				break;
		}
	}
}