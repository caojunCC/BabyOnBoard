<?php
/**
 * @class Hospital
 * @brief 医院人员配置
 */
class Hospital extends IController
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
	//人员列表
	function providers_list()
	{
		$this->redirect('providers_list');
	}
	
	//前台获取人员列表的方法
	function providers_list_data()
	{
		$hospital_id = IReq::get('id');
		if ($hospital_id == 0)
		{
			$hospital_Obj = new IQuery('admin as ad'); 
			$hospital_Obj->fields = 'ad.id,d.hospital_name_en,ad.admin_name,c.name';
			$hospital_Obj->join = 'left join admin_role as c on ad.role_id = c.id left join hospital_detail as d on ad.hospital_id = d.id';  
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
			$hospital_Obj = new IQuery('admin as ad'); 
			$hospital_Obj->fields = 'ad.id,d.hospital_name_en,ad.admin_name,c.name';
			$hospital_Obj->where = 'hospital_id ='.$hospital_id;
			$hospital_Obj->join = 'left join admin_role as c on ad.role_id = c.id left join hospital_detail as d on ad.hospital_id = d.id';  
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
	function providers_edit()
	{
		$id = IReq::get('id');
		if ($id)
		{
			//获取填充的数据
			$adminObj = new IModel('admin');
			$where = 'id = '.$id;
			$adminRow = $adminObj->getObj($where);
			$this->setRenderData($adminRow);
		}
		$this->redirect('providers_edit');
	}
	
	function providers_edit_act()
	{
		$id = IFilter::act( IReq::get('id','post') );
		$adminObj = new IModel('admin');

		//错误信息
		$message = null;

		$dataArray = array(
			'id'         => $id,
			'admin_name' => IFilter::string( IReq::get('admin_name','post') ),
			'hospital_id' => IFilter::string( IReq::get('hospital_id','post') ),
			'role_id'    => IFilter::act( IReq::get('role_id','post') ),
		);

		//检查管理员name唯一性
		$isPass = $this->check_admin($dataArray['admin_name'],$id);
		if($isPass == false)
		{
			$message = $dataArray['admin_name'].'管理员已经存在,请更改名字';
		}

		//提取密码 [ 密码设置 ]
		$password   = IReq::get('password','post');
		$repassword = IReq::get('repassword','post');

		//修改操作
		if($id)
		{
			if($password != null || $repassword != null)
			{
				if($password == null || $repassword == null || $password != $repassword)
				{
					$message = '密码不能为空,并且二次输入的必须一致';
				}
				else
					$dataArray['password'] = md5($password);
			}

			//有错误
			if($message != null)
			{
				$this->adminRow = $dataArray;
				$this->redirect('providers_list',false);
				Util::showMessage($message);
			}
			else
			{
				$where = 'id = '.$id;
				$adminObj->setData($dataArray);
				$adminObj->update($where);
			}
		}
		//添加操作
		else
		{
			if($password == null || $repassword == null || $password != $repassword)
			{
				$message = '密码不能为空,并且二次输入的必须一致';
			}
			else
				$dataArray['password'] = md5($password);

			if($message != null)
			{
				$this->adminRow = $dataArray;
				$this->redirect('providers_list',false);
				Util::showMessage($message);
			}
			else
			{
				$dataArray['create_time'] = ITime::getDateTime();
				$adminObj->setData($dataArray);
				$adminObj->add();
			}
		}
		$this->redirect('providers_list');
	}
	
		//[权限管理][管理员]检查admin_user唯一性
	function check_admin($name = null,$id = null)
	{
		//php校验$name!=null , ajax校验 $name == null
		$admin_name = ($name==null) ? IReq::get('admin_name','post') : $name;
		$admin_id   = ($id==null)   ? IReq::get('admin_id','post')   : $id;
		$admin_name = IFilter::act($admin_name);
		$admin_id = intval($id);


		$adminObj = new IModel('admin');
		if($admin_id)
		{
			$where = 'admin_name = "'.$admin_name.'" and id != '.$admin_id;
		}
		else
		{
			$where = 'admin_name = "'.$admin_name.'"';
		}

		$adminRow = $adminObj->getObj($where);

		if(!empty($adminRow))
		{
			if($name != null)
			{
				return false;
			}
			else
			{
				echo '-1';
			}
		}
		else
		{
			if($name != null)
			{
				return true;
			}
			else
			{
				echo '1';
			}
		}
	}
	//[权限管理][管理员]管理员更新操作[回收站操作][物理删除]
	function admin_del()
	{
		$id = IFilter::act( IReq::get('id') ,'int' );

		if($id == 1 || (is_array($id) && in_array(1,$id)))
		{
			$this->redirect('admin_list',false);
			Util::showMessage('不允许删除系统初始化管理员');
		}
		if(is_array($id) && isset($id[0]) && $id[0]!='')
		{
			$id_str = join(',',$id);
			$where = ' id in ('.$id_str.')';
		}
		else
		{
			$where = 'id = '.$id;
		}	
		if(!empty($id))
		{
			$obj   = new IModel('admin');
			$obj->del($where);
			$this->redirect('providers_list');
		}
		else
		{
			$this->redirect('providers_list',false);
			Util::showMessage('请选择要操作的管理员ID');
		}
	}

}