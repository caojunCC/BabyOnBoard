<?php
/**
 * @class Mastercode
 * @brief 模板数据配置
 */
class Mastercode extends IController
{
	public $layout='admin';
	protected $checkRight = 'all';
	
	function init()
	{
		$checkObj = new CheckRights($this);
		$checkObj->checkAdminRights();
	}
	
	/**
	 * @医院模板数据配置
	 */
	//医院列表
	function hospital_list()
	{
		$this->redirect('hospital_list');
	}
	//医院编辑
	function hospital_edit()
	{
		$this->redirect('hospital_edit');
	}
	//医院保存
	function hospital_edit_act()
	{
		$this->redirect('hospital_list');
	}
	
}