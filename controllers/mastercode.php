<?php
/**
 * @class Mastercode
 * @brief 模板数据配置
 */
class Mastercode extends IController
{
	public $layout='admin';
	protected $checkRight = 'all';
	public  $data =array();
	
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
		$id = IReq::get('id','get');
		if($id)
		{
			$hospital_obj = new IModel('hospital_detail');
			$where = "id =".$id;
			$data = $hospital_obj->getObj($where);
			$this->setRenderData($data);
			$this->redirect('hospital_edit');
		}
		else 
		{
			$this->redirect('hospital_edit');
		}
	}
	//医院保存
	function hospital_edit_act()
	{
		$id = IReq::get('id','post');
		$obj = new IModel('hospital_detail');
		$dataarray= array(
		'hospital_name_ch' =>IReq::get('hospital_name_ch'),
		'hospital_name_en' =>IReq::get('hospital_name_en'),
		'hospital_adress_ch' =>IReq::get('hospital_adress_ch'),
		'hospital_adress_en' =>IReq::get('hospital_adress_en'),
		'hospital_province_ch' =>IReq::get('hospital_province_ch'),
		'hospital_province_en' =>IReq::get('hospital_province_en'),
		'hospital_zipcode' =>IReq::get('hospital_zipcode'),
		'visited_date_b' =>IReq::get('visited_date_b'),
		'visited_date_e' =>IReq::get('visited_date_e')	
		);
		$obj->setData($dataarray);
		//更新操作
		if ($id)
		{
			$where = 'id ='.$id;
			$obj->update($where);
		}
		//增加操作
		else
		{
			$obj->add($where);
		}
		$this->redirect('hospital_list');
	}
	//医院删除
	function hospital_del()
	{
		$id = IFilter::act( IReq::get('id') ,'int' );
		
		$obj = new IModel('hospital_detail');

		if(is_array($id) && isset($id[0]) && $id[0]!='')
		{
			$id_str = join(',',$id);
			$where1 = ' id in ('.$id_str.')';
		}
		else
		{
			$where1 = 'id = '.$id;
		}
		$obj->del($where1);               //删除商品
		$this->redirect('hospital_list');
	}
	
	/**
	 * @科室模板数据配置
	 */
	//科室列表
	function department_type_list()
	{
		$this->redirect('department_type_list');
	}
	//科室编辑
	function department_type_edit()
	{
		$id = IReq::get('id','get');
		if($id)
		{
			$department_type_obj = new IModel('department_type');
			$where = "id =".$id;
			$data = $department_type_obj->getObj($where);
			$this->setRenderData($data);
			$this->redirect('department_type_edit');
		}
		else 
		{
			$this->redirect('department_type_edit');
		}
	}
	//科室保存
	function department_type_edit_act()
	{
		$id = IReq::get('id','post');
		$obj = new IModel('department_type');
		$dataarray= array(
		'name_ch' =>IReq::get('name_ch'),
		'name_en' =>IReq::get('name_en'),
		'order' =>IReq::get('order'),
		);
		$obj->setData($dataarray);
		//更新操作
		if ($id)
		{
			$where = 'id ='.$id;
			$obj->update($where);
		}
		//增加操作
		else
		{
			$obj->add($where);
		}
		$this->redirect('department_type_list');
	}
	//科室删除
	function department_type_del()
	{
		$id = IFilter::act( IReq::get('id') ,'int' );
		
		$obj = new IModel('department_type');

		if(is_array($id) && isset($id[0]) && $id[0]!='')
		{
			$id_str = join(',',$id);
			$where1 = ' id in ('.$id_str.')';
		}
		else
		{
			$where1 = 'id = '.$id;
		}
		$obj->del($where1);               //删除商品
		$this->redirect('department_type_list');
	}
	/**
	 * @床位模板数据配置
	 */
	//床位列表
	function beds_list()
	{
		$this->redirect('beds_list');
	}
	//床位编辑
	function beds_add()
	{
		$id = IReq::get('id','get');
		//读取床位信息
		if($id)
		{
			$beds_type_obj = new IModel('beds_type');
			$where = "id =".$id;
			$this->data['beds'] = $beds_type_obj->getObj($where);				
		}
		//加载医院信息
		$hospital_obj = new IModel('hospital_detail');
		
		$temp =  $hospital_obj->query();

		$this->data['hospital'] = $temp;
		//加载科室信息
		$department_obj = new IModel('department_type');
		$this->data['department'] = $department_obj->query();
		
		$this->setRenderData($this->data);
		$this->redirect('beds_add');
	}
	//床位保存
	function beds_add_act()
	{
		$id = IReq::get('id');
		$obj = new IModel('beds_type');
		$dataarray= array(
		'hospital_id' =>IReq::get('hospital_id'),
		'department' =>IReq::get('department'),
		'description_en' =>IReq::get('description_en'),
		'description_ch' =>IReq::get('description_ch'),
		'order' =>IReq::get('order'),
		);
		$obj->setData($dataarray);
		//更新操作
		if ($id)
		{
			$where = 'id ='.$id;
			$obj->update($where);
		}
		//增加操作
		else
		{
			$obj->add($where);
		}
		$this->redirect('beds_list');
	}
	//床位删除
	function beds_del()
	{
		$id = IFilter::act( IReq::get('id') ,'int' );
		
		$obj = new IModel('beds_type');

		if(is_array($id) && isset($id[0]) && $id[0]!='')
		{
			$id_str = join(',',$id);
			$where1 = ' id in ('.$id_str.')';
		}
		else
		{
			$where1 = 'id = '.$id;
		}
		$obj->del($where1);               //删除商品
		$this->redirect('beds_list');
	}
	
	
}