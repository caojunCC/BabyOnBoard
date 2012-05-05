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
}