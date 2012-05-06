<?php
/**
 * @class Mastercode
 * @brief 模板数据配置
 */
class Hospital extends IController
{
	public $layout='admin';
	protected $checkRight = 'all';
	
	function init()
	{
		$checkObj = new CheckRights($this);
		$checkObj->checkAdminRights();
		$hospital_data = $checkObj->checkHospitalRight();
	}
	function providers_list()
	{
		$this->redirect('providers_list');
	}
	
}