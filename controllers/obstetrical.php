<?php
/**
* @class Obstetrical
* @brief 模板数据配置
*/
class Obstetrical extends IController
{
	public $layout='admin';
	protected $checkRight = 'all';
	public   $role_hospital_id ;
	public   $role_hospital_data ;
	
	function init()
	{
		$checkObj = new CheckRights($this);
		$checkObj->checkAdminRights();
		$this->role_hospital_data = $checkObj->checkHospitalRight();
		$this->role_hospital_id = ISafe::get('hospital_id');
	}
	//obstetrical basic 信息
	function obstetrical_basic_list()
	{
		$this->redirect('obstetrical_basic_list');
	}
	//obstetrical basic edit
	function obstetrical_basic_edit()
	{
		$id = IReq::get('id');
		if ($id)
		{
			//获取填充的数据
			$adminObj = new IModel('obstetrical_basic_info');
			$where = 'id = '.$id;
			$adminRow = $adminObj->getObj($where);
			$this->setRenderData($adminRow);
		}
		$this->redirect('obstetrical_basic_edit');
	}
	function obstetrical_basic_del()
	{
		$this->redirect('obstetrical_basic_list');
	}
	function obstetrical_list_data()
	{
		$hospital_id = IReq::get('id');
		if ($hospital_id == 0)
		{
			$hospital_Obj = new IQuery('obstetrical_basic_info'); 
			$hospital_Obj->fields = '*';
			$hospital_Obj->where = '1';
			$info = $hospital_Obj->find();
			if(!empty($info))
			{
				echo JSON::encode($info);
			}
			else 
			{
				echo 0;
			}
		}
		else 
		{
			$hospital_Obj = new IQuery('obstetrical_basic_info'); 
			$hospital_Obj->fields = '*';
			$hospital_Obj->where = 'hospital_id ='.$hospital_id;
			$info = $hospital_Obj->find();
			if(!empty($info))
			{
				echo JSON::encode($info);
			}
			else 
			{
				echo 0;
			}
		}
	}
	
	
	//Admission Record
	function admission_list()
	{
		$this->redirect('admission_list');
	}
	function admission_edit()
	{
		$id = IReq::get('id');
		if($id)
		{
			$admission_Obj = new IModel('addmission_view');
			$where ='id= '.$id;		
			$data = array();
			$data = $admission_Obj->getObj($where);
			$this->setRenderData($data);
			$this->redirect('admission_edit');
		}
		else 
		{
			$this->redirect('admission_list',false);
			Util::showMessage('Please choose a person');
		}
	}
	
}

?>