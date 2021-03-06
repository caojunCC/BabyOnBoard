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
	public $data = array();
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
			//处理pre_sympton
			$pre = $data['pre_sympton'];
			$array = Util::removeSeparator($pre,-1);
			$select=explode(',', $pre);
			$this->all_pre_sympton =$select;
			
			
			$this->setRenderData($data);
			$this->redirect('admission_edit');
		}
		else 
		{
			$this->redirect('admission_list',false);
			Util::showMessage('Please choose a person');
		}
	}
	
	//anesthesia surgery
	function surgery_list()
	{
		$this->redirect('surgery_list');
	}
	
	function surgery_edit()
	{
		$id = IReq::get('id');
		if($id)
		{
			$admission_Obj = new IModel('surgery_view');
			$where ='id= '.$id;		
			$data = array();
			$data = $admission_Obj->getObj($where);
					
			$this->setRenderData($data);
			$this->redirect('surgery_edit');
		}
		else 
		{
			$this->redirect('surgery_list',false);
			Util::showMessage('Please choose a person');
		}
	}
	
	//labor analgesia record
	function analgesia_list()
	{
		$this->redirect('analgesia_list');
	}
	//analgesia_edit
	function analgesia_edit()
	{
		
		$id = IReq::get('id');
		if($id)
		{
			$analgesia_Obj = new IModel('labor_analgesia_view');
			$where ='id= '.$id;		
			$data = array();		
			$data = $analgesia_Obj->getObj($where);
			
			$this->setRenderData($data);
			$this->redirect('analgesia_edit');
		}
		else 
		{
			$this->redirect('analgesia_list',false);
			Util::showMessage('Please choose a person');
		}
	}
		
	//progress
	function progress_list()
	{
		$this->redirect('progress_list');
	}
	
	function progress_edit()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$progress_Obj = new IModel('obstetrical_progress_basic_view');
			$where ='id= '.$id;		
			$this->data['basic'] = $progress_Obj->getObj($where);
			
			$progress_Obj = new IModel('obstetrical_progress_medsname');
			$where ='basic_id= '.$id;		
			$this->data['meds'] = $progress_Obj->getObj($where);
			
			$progress_Obj = new IModel('obstetrical_progress_ivname');
			$where ='basic_id= '.$id;		
			$this->data['iv'] = $progress_Obj->getObj($where);
			
			$progress_Obj = new IModel('obstetrical_progress_ivnotes');
			$where ='basic_id= '.$id;		
			$this->data['ivnotes'] = $progress_Obj->getObj($where);
			
			$progress_Obj = new IModel('obstetrical_progress_opnotes');
			$where ='basic_id= '.$id;		
			$this->data['opnotes'] = $progress_Obj->getObj($where);
			
			$progress_Obj = new IModel('obstetrical_progress_opname');
			$where ='basic_id= '.$id;		
			$this->data['op'] = $progress_Obj->getObj($where);
			
			$this->setRenderData($this->data);
			$this->redirect('progress_edit');
		}
		else 
		{
			$this->redirect('progress_list',false);
			Util::showMessage('Please choose a person');
		}
	}
	//postpartum 
	function postpartum_list()
	{
		$this->redirect('postpartum_list');
	}
	
	function postpartum_edit()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$postpartum_Obj = new IModel('obstetrical_postpartum_basic_view');
			$where ='id= '.$id;		
			$data = $postpartum_Obj->getObj($where);		
			$this->setRenderData($data);
			$this->redirect('postpartum_edit');
		}
		else 
		{
			$this->redirect('postpartum_list',false);
			Util::showMessage('Please choose a person');
		}
	}
	
}

?>