<?php
class Modify extends IController
{
	public $layout='';

	public function init()
	{
		$checkObj = new CheckRights($this);
		$checkObj->checkUserRights();
	}
	public function admission_detail_edit()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_detail_info');
			$dataRow = $Obj->getObj($where);
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
		}
		$this->redirect('admission_detail_edit');
	}
	public function admission_detail_edit_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		if($id)
		{
			//更新
			$where = 'id ='.$id;
			$Obj = new IModel('admission_detail_info');
			$dataarray= array(
				'time' =>IReq::get('time'),
				'unit' =>IReq::get('unit'),
				'form_where' =>IReq::get('form_where'),
				'accompany' =>IReq::get('accompany'),
				'add_nurse' =>IReq::get('add_nurse'),
				'via' =>IReq::get('via')
				);
			$Obj->setData($dataarray);
			$Obj->update($where);		
		}
		else 
		{

			$Obj = new IModel('admission_detail_info');
			$dataarray= array(
				'basic_id' =>IReq::get('basic_id'),
				'time' =>IReq::get('time'),
				'unit' =>IReq::get('unit'),
				'form_where' =>IReq::get('form_where'),
				'accompany' =>IReq::get('accompany'),
				'add_nurse' =>IReq::get('add_nurse'),
				'via' =>IReq::get('via')
				);
			$Obj->setData($dataarray);
			$Obj->add();		
		}
		$url = IUrl::creatUrl("/obstetrical/admission_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	//入院主述
	public function admission_complaint_edit()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_complaint');
			$dataRow = $Obj->getObj($where);
			$Obj1 = new IModel('admission_ob_physical_info');
			$dataRow1 = $Obj1->getObj($where);
			//处理pre_sympton
			$array = $dataRow['pre_sympton'];
			$array = Util::removeSeparator($array,-1);
			$select=explode(',', $array);
			$this->select = $select;
			
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1) )
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('admission_complaint_edit');
	}
	
	
	public function admission_complaint_edit_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		//连接pre_sympton
		$temp = IReq::get('pre_sympton');
		$pre_sympton = implode(',', $temp);
		if($id)
		{
			//更新
			$where = 'basic_id ='.$basic_id;
			$Obj = new IModel('admission_complaint');
			$dataarray= array(
				'pre_sympton' => $pre_sympton
				);
			$Obj->setData($dataarray);
			$Obj->update($where);
			
			
			$Obj1 = new IModel('admission_ob_physical_info');
			$dataarray1= array(
				'age' => IReq:: get('age'),
				'gracida' =>IReq::get('gracida'),
				'age' => IReq:: get('age'),
				'term' =>IReq::get('term'),
				'preter' => IReq:: get('preter'),
				'antibdy' =>IReq::get('antibdy'),
				'living' => IReq:: get('living'),
				'lmp' =>IReq::get('lmp'),
				'ega' => IReq:: get('ega'),
				'edc' =>IReq::get('edc'),
				'ht' => IReq:: get('ht'),
				'wt' =>IReq::get('wt'),
				'wt_gain' =>IReq::get('wt_gain')
				);
			$Obj1->setData($dataarray1);
			$Obj1->update($where);
			
		}
		else 
		{
			//添加
			
			$Obj = new IModel('admission_complaint');
			$dataarray= array(
				'basic_id' =>IReq::get('basic_id'),
				'pre_sympton' => $pre_sympton
				);
			$Obj->setData($dataarray);
			$Obj->add();	
			
			
			$Obj1 = new IModel('admission_ob_physical_info');
			$dataarray1= array(
				'basic_id' =>IReq::get('basic_id'),	
				'age' => IReq:: get('age'),
				'gracida' =>IReq::get('gracida'),
				'age' => IReq:: get('age'),
				'term' =>IReq::get('term'),
				'preter' => IReq:: get('preter'),
				'antibdy' =>IReq::get('antibdy'),
				'living' => IReq:: get('living'),
				'lmp' =>IReq::get('lmp'),
				'ega' => IReq:: get('ega'),
				'edc' =>IReq::get('edc'),
				'ht' => IReq:: get('ht'),
				'wt' =>IReq::get('wt'),
				'wt_gain' =>IReq::get('wt_gain')
				);
			$Obj1->setData($dataarray1);
			$Obj1->add();
		}
		$url = IUrl::creatUrl("/obstetrical/admission_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	
	//admission_ob_assessment
	public function admission_ob_assessment()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_ob_assessment');
			$dataRow = $Obj->getObj($where);
			$Obj1 = new IModel('admission_ultrasound_other');
			$dataRow1 = $Obj1->getObj($where);	
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1) )
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('admission_ob_assessment');
	}
	
	
	public function admission_ob_assessment_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
			'uterus' => IReq:: get('uterus'),
			'contraction' => IReq:: get('contraction'),
			'contruction_date' => IReq:: get('contruction_date'),
			'fetal_movement' => IReq:: get('fetal_movement'),
			'fetal_date' => IReq:: get('fetal_date'),
			'membranes' => IReq:: get('membranes'),
			'membranes_date' => IReq:: get('membranes_date'),
			'recent_intercourse' => IReq:: get('recent_intercourse'),
			's_p' => IReq:: get('s_p'),
			'basic_id' => IReq:: get('basic_id')
			);
		$dataarray1= array(
			'initial' => IReq:: get('initial'),
			'basic_id' => IReq:: get('basic_id'),
			'initial_date' =>IReq::get('initial_date'),
			'edc_by_us' => IReq:: get('edc_by_us'),
			'ega_by_us' =>IReq::get('ega_by_us'),
			'final_edc' => IReq:: get('final_edc'),
			'blood_transfusion_solid' =>IReq::get('blood_transfusion_solid'),
			'pre_c_s' => IReq:: get('pre_c_s'),
			'attempted' =>IReq::get('attempted'),
			'last_intake_solid' => IReq:: get('last_intake_solid'),
			'lasr_intake_fluid' =>IReq::get('lasr_intake_fluid')
			);
		if($id)
		{
			//更新
			$where = 'basic_id ='.$basic_id;
			$Obj = new IModel('admission_ob_assessment');		
			$Obj->setData($dataarray);
			$Obj->update($where);
			
			
			$Obj1 = new IModel('admission_ultrasound_other');
			$Obj1->setData($dataarray1);
			$Obj1->update($where);
			
		}
		else 
		{
			//添加
			
			$Obj = new IModel('admission_ob_assessment');
			$Obj->setData($dataarray);
			$Obj->add();	
			
			
			$Obj1 = new IModel('admission_ultrasound_other');
			$Obj1->setData($dataarray1);
			$Obj1->add();
		}
		$url = IUrl::creatUrl("/obstetrical/admission_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	//admission_prenatal_labs
	//admission_current_info
	public function admission_prenatal_labs()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_prenatal_labs');
			$dataRow = $Obj->getObj($where);
			$Obj1 = new IModel('admission_current_info');
			$dataRow1 = $Obj1->getObj($where);	
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1) )
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('admission_prenatal_labs');
	}
	
	
	public function admission_prenatal_labs_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
			'status' => IReq:: get('status'),
			'blood_type' => IReq:: get('blood_type'),
			'antibody' => IReq:: get('antibody'),
			'rubella' => IReq:: get('rubella'),
			'hbsag' => IReq:: get('hbsag'),
			'vdrl' => IReq:: get('vdrl'),
			'vdrl_date' => IReq:: get('vdrl_date'),
			'gbbs' => IReq:: get('gbbs'),
			'hiv' => IReq:: get('hiv'),
			'ppd' => IReq:: get('ppd'),
			'cxr' => IReq:: get('cxr'),
			'basic_id' => IReq:: get('basic_id')
			);
		$dataarray1= array(
			'current_medication' => IReq:: get('current_medication'),
			'current_risk' =>IReq::get('current_risk'),
			'pre_risk' => IReq:: get('pre_risk'),
			'medical_surgical_hx' =>IReq::get('medical_surgical_hx'),
			'allergies' => IReq:: get('allergies'),
			'reaction' =>IReq::get('reaction'),
			'nkda' => IReq:: get('nkda'),
			'allergy' =>IReq::get('allergy'),
			'basic_id' => IReq:: get('basic_id')
			);
		if($id)
		{
			//更新
			$where = 'basic_id ='.$basic_id;
			$Obj = new IModel('admission_prenatal_labs');
			$Obj->setData($dataarray);
			$Obj->update($where);
			
			
			$Obj1 = new IModel('admission_current_info');
			$Obj1->setData($dataarray1);
			$Obj1->update($where);
			
		}
		else 
		{
			//添加
			
			$Obj = new IModel('admission_prenatal_labs');

			$Obj->setData($dataarray);
			$Obj->add();	
			
			
			$Obj1 = new IModel('admission_current_info');
			$Obj1->setData($dataarray1);
			$Obj1->add();
		}
		$url = IUrl::creatUrl("/obstetrical/admission_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	//admission_procedures
	//admission_procedures_other
	public function admission_procedures()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_procedures');
			$dataRow = $Obj->getObj($where);
			$Obj1 = new IModel('admission_procedures_other');
			$dataRow1 = $Obj1->getObj($where);	
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1) )
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('admission_procedures');
	}
	
	
	public function admission_procedures_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
				'iv_start_location' => IReq:: get('iv_start_location'),
				'iv_start_size' => IReq:: get('iv_start_size'),
				'fluid_type_rate' => IReq:: get('fluid_type_rate'),
				'fluid_glucose' => IReq:: get('fluid_glucose'),
				'sse_examiner' => IReq:: get('sse_examiner'),
				'sse_date_time' => IReq:: get('sse_date_time'),
				'sse_intact' => IReq:: get('sse_intact'),
				'sse_rom_color' => IReq:: get('sse_rom_color'),
				'sse_ferning' => IReq:: get('sse_ferning'),
				'sse_nitrazine' => IReq:: get('sse_nitrazine'),
				'sse_pooling' => IReq:: get('sse_pooling'),				
				'sse_is_labs_sent' => IReq:: get('sse_is_labs_sent'),
				'sse_labs_sent' => IReq:: get('sse_labs_sent'),
				'sse_is_urine_sent' => IReq:: get('sse_is_urine_sent'),
				'sse_urine_sent' => IReq:: get('sse_urine_sent'),
				'sse_is_cultures_sent' => IReq:: get('sse_is_cultures_sent'),
				'sse_cultures_sent' => IReq:: get('sse_cultures_sent'),
				'sse_is_other' => IReq:: get('sse_is_other'),
				'sse_other' => IReq:: get('sse_other'),
				'urinalysis_sgravity' => IReq:: get('urinalysis_sgravity'),
				'urinalysis_color' => IReq:: get('urinalysis_color'),
				'urinalysis_apprnce' => IReq:: get('urinalysis_apprnce'),		
				'urinalysis_leuo' => IReq:: get('urinalysis_leuo'),
				'urinalysis_heme' => IReq:: get('urinalysis_heme'),
				'urinalysis_glucose' => IReq:: get('urinalysis_glucose'),
				'urinalysis_ketones' => IReq:: get('urinalysis_ketones'),
				'urinalysis_protein' => IReq:: get('urinalysis_protein'),
				'basic_id' => IReq:: get('basic_id')
				);
			$dataarray1= array(
				'research_sudies' => IReq:: get('research_sudies'),
				'ambulation_em_off' =>IReq::get('ambulation_em_off'),
				'ambulation_em_off' => IReq:: get('ambulation_em_off'),
				'disposition_date' =>IReq::get('disposition_date'),
				'disposition_admitted' => IReq:: get('disposition_admitted'),
				'disposition_via' =>IReq::get('disposition_via'),
				'disposition_report_given' => IReq:: get('disposition_report_given'),
				'ida' =>IReq::get('ida'),
				'clinical_nutrition_consult' => IReq:: get('clinical_nutrition_consult'),
				'home_with_instruction' =>IReq::get('home_with_instruction'),
				'verbalizes_understand' => IReq:: get('verbalizes_understand'),
				'discharge_ama' =>IReq::get('discharge_ama'),
				'social_work_center_consult' => IReq:: get('social_work_center_consult'),
				'basic_id' => IReq:: get('basic_id')
				);
		if($id)
		{
			//更新
			$where = 'basic_id ='.$basic_id;
			$Obj = new IModel('admission_procedures');
			$Obj->setData($dataarray);
			$Obj->update($where);	
								
			$Obj1 = new IModel('admission_procedures_other');
			$Obj1->setData($dataarray1);
			$Obj1->update($where);
			
		}
		else 
		{
			//添加			
			$Obj = new IModel('admission_procedures');
			$Obj->setData($dataarray);
			$Obj->add();	
	
			$Obj1 = new IModel('admission_procedures_other');
			$Obj1->setData($dataarray1);
			$Obj1->add();
		}
		$url = IUrl::creatUrl("/obstetrical/admission_edit/id/").$basic_id;
		header('Location:'.$url);
	}
}
?>