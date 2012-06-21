<?php
class Modify extends IController
{
	public $layout='';
	public  $data =array();
	public $time_id = 0;
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
				'pre_sympton' => $pre_sympton,
				'other' =>IReq::get('other'),
				'scheduled_provedure' =>IReq::get('scheduled_provedure')
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
				'pre_sympton' => $pre_sympton,
				'other' =>IReq::get('other'),
				'scheduled_provedure' =>IReq::get('scheduled_provedure')
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
				'is_research_sudies' => IReq:: get('is_research_sudies'),
				'research_sudies' => IReq:: get('research_sudies'),
				'ambulation_em_off' =>IReq::get('ambulation_em_off'),
				'ambulation_walking_for' => IReq:: get('ambulation_walking_for'),
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

	
	//surgery_illness_edit
	public function surgery_illness_edit()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('admission_ob_physical_info');
			$dataRow = $Obj->getObj($where,'gracida,living');
			$Obj2 = new IModel('admission_ultrasound_other');
			$dataRow2 = $Obj2->getObj($where,'ega_by_us');
			$Obj3 = new IModel('admission_current_info');
			$dataRow3 = $Obj3->getObj($where,'current_medication,medical_surgical_hx,allergies');
			
			$Obj1 = new IModel('surgery_illness');
			$dataRow1 = $Obj1->getObj($where);	
			if(!empty($dataRow) )
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1) )
			{
				$this->setRenderData($dataRow1);
			}
			if(!empty($dataRow2) )
			{
				$this->setRenderData($dataRow2);
			}
			if(!empty($dataRow3) )
			{
				$this->setRenderData($dataRow3);
			}
		}
		$this->redirect('surgery_illness_edit');
	}
	
	
	public function surgery_illness_edit_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
				'gracida' => IReq:: get('gracida'),
				'living' => IReq:: get('living'),
				'basic_id' => IReq:: get('basic_id')
				);
		$dataarray1= array(
				'ega_by_us' => IReq:: get('ega_by_us'),
				'basic_id' => IReq:: get('basic_id')
				);
		$dataarray2= array(
				'current_medication' => IReq:: get('current_medication'),
				'medical_surgical_hx' => IReq:: get('medical_surgical_hx'),
				'allergies' => IReq:: get('allergies'),
				'basic_id' => IReq:: get('basic_id')
				);
		$dataarray3= array(
				'pregnacy_description' => IReq:: get('pregnacy_description'),
				'pre_anesthesia' => IReq:: get('pre_anesthesia'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('admission_ob_physical_info');
		$Obj1 = new IModel('admission_ultrasound_other');
		$Obj2 = new IModel('admission_current_info');
		$Obj3 = new IModel('surgery_illness');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$is_in1 = $Obj1 ->getObj($where);
		$is_in2 = $Obj2 ->getObj($where);
		$is_in3 = $Obj3 ->getObj($where);
		
		$Obj->setData($dataarray);
		$Obj1->setData($dataarray1);
		$Obj2->setData($dataarray2);
		$Obj3->setData($dataarray3);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		if(!empty($is_in1))
		{	
			$Obj1->update($where);	
		}
		else 
		{
			$Obj1->add();	
		}
		if(!empty($is_in2))
		{	
			$Obj2->update($where);	
		}
		else 
		{
			$Obj2->add();	
		}
		if(!empty($is_in3))
		{	
			$Obj3->update($where);	
		}
		else 
		{
			$Obj3->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/surgery_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	//surgery_system_review

	public function surgery_system_review()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('surgery_system_review');
			$Obj1 = new IModel('admission_ob_physical_info');
			$dataRow1 = $Obj1->getObj($where,'lmp');
			$dataRow = $Obj->getObj($where);
			if(!empty($dataRow))
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1))
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('surgery_system_review');
	}
	
	
	public function surgery_system_review_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
				'review_cardovascular' => IReq:: get('review_cardovascular'),
				'review_respiratory' => IReq:: get('review_respiratory'),
				'review_gi_hepatic' => IReq:: get('review_gi_hepatic'),
				'review_renal' => IReq:: get('review_renal'),
				'review_newuro' => IReq:: get('review_newuro'),
				'review_hemotology' => IReq:: get('review_hemotology'),
				'review_laboratory' => IReq:: get('review_laboratory'),
				'review_liver' => IReq:: get('review_liver'),
				'review_chmistries' => IReq:: get('review_chmistries'),
				'basic_id' => IReq:: get('basic_id')
				);
		$dataarray1= array(
				'lmp' => IReq:: get('lmp'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('surgery_system_review');
		$Obj1 = new IModel('admission_ob_physical_info');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$is_in1 = $Obj1 ->getObj($where);
		
		$Obj->setData($dataarray);
		$Obj1->setData($dataarray1);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		if(!empty($is_in1))
		{	
			$Obj1->update($where);	
		}
		else 
		{
			$Obj1->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/surgery_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	//surgery_hx_all
	public function surgery_hx_all()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('surgery_hx_all');
			$Obj1 = new IModel('admission_ob_assessment');
			$dataRow1 = $Obj1->getObj($where);
			$dataRow = $Obj->getObj($where);
			if(!empty($dataRow))
			{
				$this->setRenderData($dataRow);
			}
			if(!empty($dataRow1))
			{
				$this->setRenderData($dataRow1);
			}
		}
		$this->redirect('surgery_hx_all');
	}
	
	
	public function surgery_hx_all_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
				'hx_smocking' => IReq:: get('hx_smocking'),
				'hx_alcohol_use' => IReq:: get('hx_alcohol_use'),
				'hx_substance_use' => IReq:: get('hx_substance_use'),
				'hx_social_situation' => IReq:: get('hx_social_situation'),
				'airway_tnj' => IReq:: get('airway_tnj'),
				'airway_neck_full_rom' => IReq:: get('airway_neck_full_rom'),
				'airway_hm_distance' => IReq:: get('airway_hm_distance'),
				'airway_dental' => IReq:: get('airway_dental'),
				'airway_path' => IReq:: get('airway_path'),

				'physical_examination_heart' => IReq:: get('physical_examination_heart'),
				'physical_examination_lungs' => IReq:: get('physical_examination_lungs'),
				'Obtestrical_dx' => IReq:: get('Obtestrical_dx'),
				'asa_physical_statues' => IReq:: get('asa_physical_statues'),
				'fasting_status_last_solid' => IReq:: get('fasting_status_last_solid'),
				'fasting_status_last_liquid' => IReq:: get('fasting_status_last_liquid'),
				'physical_examination_bp' => IReq:: get('physical_examination_bp'),
				'physical_examination_hr' => IReq:: get('physical_examination_hr'),
				'physical_examination_rr' => IReq:: get('physical_examination_rr'),
		
				'physical_examination_sao2' => IReq:: get('physical_examination_sao2'),
				'physical_examination_t' => IReq:: get('physical_examination_t'),
				'physical_examination_ht' => IReq:: get('physical_examination_ht'),
				'physical_examination_wt' => IReq:: get('physical_examination_wt'),
				'basic_id' => IReq:: get('basic_id')
				);
				
		$dataarray1= array(
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
			
		$Obj = new IModel('surgery_hx_all');
		$Obj1 = new IModel('admission_ob_assessment');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$is_in1 = $Obj1 ->getObj($where);
		
		$Obj->setData($dataarray);
		$Obj1->setData($dataarray1);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		if(!empty($is_in1))
		{	
			$Obj1->update($where);	
		}
		else 
		{
			$Obj1->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/surgery_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	//surgery_plan_all
	public function surgery_plan_all()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('surgery_plan');
			$dataRow = $Obj->getObj($where);
			if(!empty($dataRow))
			{
				$this->setRenderData($dataRow);
			}
		}
		$this->redirect('surgery_plan_all');
	}
	
	
	public function surgery_plan_all_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		$dataarray= array(
				'anesthetic_plan' => IReq:: get('anesthetic_plan'),
				'obstetrical_plan' => IReq:: get('obstetrical_plan'),
				'obsterian' => IReq:: get('obsterian'),
				'anesthesiologist' => IReq:: get('anesthesiologist'),
				'sign_date' => IReq:: get('sign_date'),
				'sign_time' => IReq:: get('sign_time'),
				'basic_id' => IReq:: get('basic_id')
				);

		$Obj = new IModel('surgery_plan');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/surgery_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	//progress_basic
	public function progress_basic()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			
			$Obj = new IModel('admission_detail_info');
			$this->data['detail'] = $Obj->getObj($where);
			$Obj = new IModel('admission_prenatal_labs');
			$this->data['prenatal'] = $Obj->getObj($where);
			$Obj = new IModel('admission_ob_physical_info');
			$this->data['physical'] = $Obj->getObj($where);
			$Obj = new IModel('admission_current_info');
			$this->data['current'] = $Obj->getObj($where);
			$Obj = new IModel('obstetrical_progress_basic');
			$this->data['progress'] = $Obj->getObj($where);
			
			if(!empty($this->data))
			{
				$this->setRenderData($this->data);
			}
		}
		$this->redirect('progress_basic');
	}
	
	public function progress_basic_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		//更新time
		$dataarray= array(
				'time' => IReq:: get('time'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('admission_detail_info');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		//更新prenatal_labs
		$dataarray= array(
				'blood_type' => IReq:: get('blood_type'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('admission_prenatal_labs');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		//更新admission_ob_physical_info
		$dataarray= array(
				'edc' => IReq:: get('edc'),
				'gracida' => IReq:: get('gracida'),
				'term' => IReq:: get('term'),
				'preter' => IReq:: get('preter'),
				'living' => IReq:: get('living'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('admission_ob_physical_info');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		//更新admission_current_info
		$dataarray= array(
				'allergies' => IReq:: get('allergies'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('admission_current_info');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		//更新obstetrical_progress_basic
		$dataarray= array(
				'gestation' => IReq:: get('gestation'),
				'bom' => IReq:: get('bom'),
				'abortions' => IReq:: get('abortions'),
				'basic_id' => IReq:: get('basic_id')
				);
		$Obj = new IModel('obstetrical_progress_basic');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	//progress_time
	public function progress_time()
	{
		$id = IReq::get('id');
		$this->id = $id;
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('obstetrical_progress_time');
			$dataRow = $Obj->query($where);
			if(!empty($dataRow))
			{
				$this->setRenderData($dataRow);
			}
		}
		$this->redirect('progress_time');
	}
	
	public function progress_time_act()
	{
		$id = IReq::get('id');
		$basic_id = IReq::get('basic_id');
		
		$time1=IReq:: get('time1');
		$time2=IReq:: get('time2');
		$time3=IReq:: get('time3');
		$time4=IReq:: get('time4');
		$time5=IReq:: get('time5');
		$time6=IReq:: get('time6');
		$time7=IReq:: get('time7');
		$time8=IReq:: get('time8');
		//更新time1
		if(!empty($time1))
		{
			$dataarray=array(
				'time' => $time1,
				'time_id' => '11',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '12',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time1,
				'time_id' => '11',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time2
		if(!empty($time2))
		{
			$dataarray=array(
				'time' => $time2,
				'time_id' => '21',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '22',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time2,
				'time_id' => '21',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time3
		if(!empty($time3))
		{
			$dataarray=array(
				'time' => $time3,
				'time_id' => '31',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '32',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time3,
				'time_id' => '31',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time4
		if(!empty($time4))
		{
			$dataarray=array(
				'time' => $time4,
				'time_id' => '41',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '42',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time4,
				'time_id' => '41',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time5
		if(!empty($time5))
		{
			$dataarray=array(
				'time' => $time5,
				'time_id' => '51',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '52',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time5,
				'time_id' => '51',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time6
		if(!empty($time6))
		{
			$dataarray=array(
				'time' => $time6,
				'time_id' => '61',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '62',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time6,
				'time_id' => '61',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time7
		if(!empty($time7))
		{
			$dataarray=array(
				'time' => $time7,
				'time_id' => '71',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '72',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time7,
				'time_id' => '71',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		//更新time8
		if(!empty($time8))
		{
			$dataarray=array(
				'time' => $time8,
				'time_id' => '81',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
				
				$dataarray=array(
					'time_id' => '82',
					'basic_id' => IReq:: get('basic_id')	
				);
				$Obj = new IModel('obstetrical_progress_time');
				$Obj->setData($dataarray);
				$Obj->add();	
			}
		}
		else 
		{
			$dataarray=array(
				'time' => $time8,
				'time_id' => '81',
				'basic_id' => IReq:: get('basic_id')	
			);
			$Obj = new IModel('obstetrical_progress_time');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
		}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}

	//progress_patient
	public function progress_patient()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$this->redirect('progress_patient');
	}
	
	
	public function progress_patient_act()
	{
		$basic_id = IReq::get('basic_id');
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'temp' => IReq:: get('temp11'),
				'pulse' => IReq:: get('pulse11'),
				'rr' => IReq:: get('rr11'),
				'bp' => IReq:: get('bp11'),
				'pain' => IReq:: get('pain11'),
				'loc' => IReq:: get('loc11'),
				'psy' => IReq:: get('psy11'),
				'wt' => IReq:: get('wt11'),
				'act' => IReq:: get('act11'),
				'nv' => IReq:: get('nv11'),
				'cnsc' => IReq:: get('cnsc11'),
				'ref' => IReq:: get('ref11'),
				'hom' => IReq:: get('hom11'),
				'edema' => IReq:: get('edema11'),
				'breath' => IReq:: get('breath11'),
				'fundus' => IReq:: get('fundus11'),
				'lochia' => IReq:: get('lochia11'),
				'episiotomy' => IReq:: get('episiotomy11'),
				'bladder' => IReq:: get('bladder11'),
				'h_r_p' => IReq:: get('h_r_p11'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'temp' => IReq:: get('temp12'),
				'pulse' => IReq:: get('pulse12'),
				'rr' => IReq:: get('rr12'),
				'bp' => IReq:: get('bp12'),
				'pain' => IReq:: get('pain12'),
				'loc' => IReq:: get('loc12'),
				'psy' => IReq:: get('psy12'),
				'wt' => IReq:: get('wt12'),
				'act' => IReq:: get('act12'),
				'nv' => IReq:: get('nv12'),
				'cnsc' => IReq:: get('cnsc12'),
				'ref' => IReq:: get('ref12'),
				'hom' => IReq:: get('hom12'),
				'edema' => IReq:: get('edema12'),
				'breath' => IReq:: get('breath12'),
				'fundus' => IReq:: get('fundus12'),
				'lochia' => IReq:: get('lochia12'),
				'episiotomy' => IReq:: get('episiotomy12'),
				'bladder' => IReq:: get('bladder12'),
				'h_r_p' => IReq:: get('h_r_p12'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'temp' => IReq:: get('temp21'),
				'pulse' => IReq:: get('pulse21'),
				'rr' => IReq:: get('rr21'),
				'bp' => IReq:: get('bp21'),
				'pain' => IReq:: get('pain21'),
				'loc' => IReq:: get('loc21'),
				'psy' => IReq:: get('psy21'),
				'wt' => IReq:: get('wt21'),
				'act' => IReq:: get('act21'),
				'nv' => IReq:: get('nv21'),
				'cnsc' => IReq:: get('cnsc21'),
				'ref' => IReq:: get('ref21'),
				'hom' => IReq:: get('hom21'),
				'edema' => IReq:: get('edema21'),
				'breath' => IReq:: get('breath21'),
				'fundus' => IReq:: get('fundus21'),
				'lochia' => IReq:: get('lochia21'),
				'episiotomy' => IReq:: get('episiotomy21'),
				'bladder' => IReq:: get('bladder21'),
				'h_r_p' => IReq:: get('h_r_p21'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'temp' => IReq:: get('temp22'),
				'pulse' => IReq:: get('pulse22'),
				'rr' => IReq:: get('rr22'),
				'bp' => IReq:: get('bp22'),
				'pain' => IReq:: get('pain22'),
				'loc' => IReq:: get('loc22'),
				'psy' => IReq:: get('psy22'),
				'wt' => IReq:: get('wt22'),
				'act' => IReq:: get('act22'),
				'nv' => IReq:: get('nv22'),
				'cnsc' => IReq:: get('cnsc22'),
				'ref' => IReq:: get('ref22'),
				'hom' => IReq:: get('hom22'),
				'edema' => IReq:: get('edema22'),
				'breath' => IReq:: get('breath22'),
				'fundus' => IReq:: get('fundus22'),
				'lochia' => IReq:: get('lochia22'),
				'episiotomy' => IReq:: get('episiotomy22'),
				'bladder' => IReq:: get('bladder22'),
				'h_r_p' => IReq:: get('h_r_p22'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'temp' => IReq:: get('temp31'),
				'pulse' => IReq:: get('pulse31'),
				'rr' => IReq:: get('rr31'),
				'bp' => IReq:: get('bp31'),
				'pain' => IReq:: get('pain31'),
				'loc' => IReq:: get('loc31'),
				'psy' => IReq:: get('psy31'),
				'wt' => IReq:: get('wt31'),
				'act' => IReq:: get('act31'),
				'nv' => IReq:: get('nv31'),
				'cnsc' => IReq:: get('cnsc31'),
				'ref' => IReq:: get('ref31'),
				'hom' => IReq:: get('hom31'),
				'edema' => IReq:: get('edema31'),
				'breath' => IReq:: get('breath31'),
				'fundus' => IReq:: get('fundus31'),
				'lochia' => IReq:: get('lochia31'),
				'episiotomy' => IReq:: get('episiotomy31'),
				'bladder' => IReq:: get('bladder31'),
				'h_r_p' => IReq:: get('h_r_p31'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'temp' => IReq:: get('temp32'),
				'pulse' => IReq:: get('pulse32'),
				'rr' => IReq:: get('rr32'),
				'bp' => IReq:: get('bp32'),
				'pain' => IReq:: get('pain32'),
				'loc' => IReq:: get('loc32'),
				'psy' => IReq:: get('psy32'),
				'wt' => IReq:: get('wt32'),
				'act' => IReq:: get('act32'),
				'nv' => IReq:: get('nv32'),
				'cnsc' => IReq:: get('cnsc32'),
				'ref' => IReq:: get('ref32'),
				'hom' => IReq:: get('hom32'),
				'edema' => IReq:: get('edema32'),
				'breath' => IReq:: get('breath32'),
				'fundus' => IReq:: get('fundus32'),
				'lochia' => IReq:: get('lochia32'),
				'episiotomy' => IReq:: get('episiotomy32'),
				'bladder' => IReq:: get('bladder32'),
				'h_r_p' => IReq:: get('h_r_p32'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'temp' => IReq:: get('temp41'),
				'pulse' => IReq:: get('pulse41'),
				'rr' => IReq:: get('rr41'),
				'bp' => IReq:: get('bp41'),
				'pain' => IReq:: get('pain41'),
				'loc' => IReq:: get('loc41'),
				'psy' => IReq:: get('psy41'),
				'wt' => IReq:: get('wt41'),
				'act' => IReq:: get('act41'),
				'nv' => IReq:: get('nv41'),
				'cnsc' => IReq:: get('cnsc41'),
				'ref' => IReq:: get('ref41'),
				'hom' => IReq:: get('hom41'),
				'edema' => IReq:: get('edema41'),
				'breath' => IReq:: get('breath41'),
				'fundus' => IReq:: get('fundus41'),
				'lochia' => IReq:: get('lochia41'),
				'episiotomy' => IReq:: get('episiotomy41'),
				'bladder' => IReq:: get('bladder41'),
				'h_r_p' => IReq:: get('h_r_p41'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'temp' => IReq:: get('temp42'),
				'pulse' => IReq:: get('pulse42'),
				'rr' => IReq:: get('rr42'),
				'bp' => IReq:: get('bp42'),
				'pain' => IReq:: get('pain42'),
				'loc' => IReq:: get('loc42'),
				'psy' => IReq:: get('psy42'),
				'wt' => IReq:: get('wt42'),
				'act' => IReq:: get('act42'),
				'nv' => IReq:: get('nv42'),
				'cnsc' => IReq:: get('cnsc42'),
				'ref' => IReq:: get('ref42'),
				'hom' => IReq:: get('hom42'),
				'edema' => IReq:: get('edema42'),
				'breath' => IReq:: get('breath42'),
				'fundus' => IReq:: get('fundus42'),
				'lochia' => IReq:: get('lochia42'),
				'episiotomy' => IReq:: get('episiotomy42'),
				'bladder' => IReq:: get('bladder42'),
				'h_r_p' => IReq:: get('h_r_p42'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'temp' => IReq:: get('temp51'),
				'pulse' => IReq:: get('pulse51'),
				'rr' => IReq:: get('rr51'),
				'bp' => IReq:: get('bp51'),
				'pain' => IReq:: get('pain51'),
				'loc' => IReq:: get('loc51'),
				'psy' => IReq:: get('psy51'),
				'wt' => IReq:: get('wt51'),
				'act' => IReq:: get('act51'),
				'nv' => IReq:: get('nv51'),
				'cnsc' => IReq:: get('cnsc51'),
				'ref' => IReq:: get('ref51'),
				'hom' => IReq:: get('hom51'),
				'edema' => IReq:: get('edema51'),
				'breath' => IReq:: get('breath51'),
				'fundus' => IReq:: get('fundus51'),
				'lochia' => IReq:: get('lochia51'),
				'episiotomy' => IReq:: get('episiotomy51'),
				'bladder' => IReq:: get('bladder51'),
				'h_r_p' => IReq:: get('h_r_p51'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'temp' => IReq:: get('temp52'),
				'pulse' => IReq:: get('pulse52'),
				'rr' => IReq:: get('rr52'),
				'bp' => IReq:: get('bp52'),
				'pain' => IReq:: get('pain52'),
				'loc' => IReq:: get('loc52'),
				'psy' => IReq:: get('psy52'),
				'wt' => IReq:: get('wt52'),
				'act' => IReq:: get('act52'),
				'nv' => IReq:: get('nv52'),
				'cnsc' => IReq:: get('cnsc52'),
				'ref' => IReq:: get('ref52'),
				'hom' => IReq:: get('hom52'),
				'edema' => IReq:: get('edema52'),
				'breath' => IReq:: get('breath52'),
				'fundus' => IReq:: get('fundus52'),
				'lochia' => IReq:: get('lochia52'),
				'episiotomy' => IReq:: get('episiotomy52'),
				'bladder' => IReq:: get('bladder52'),
				'h_r_p' => IReq:: get('h_r_p52'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'temp' => IReq:: get('temp61'),
				'pulse' => IReq:: get('pulse61'),
				'rr' => IReq:: get('rr61'),
				'bp' => IReq:: get('bp61'),
				'pain' => IReq:: get('pain61'),
				'loc' => IReq:: get('loc61'),
				'psy' => IReq:: get('psy61'),
				'wt' => IReq:: get('wt61'),
				'act' => IReq:: get('act61'),
				'nv' => IReq:: get('nv61'),
				'cnsc' => IReq:: get('cnsc61'),
				'ref' => IReq:: get('ref61'),
				'hom' => IReq:: get('hom61'),
				'edema' => IReq:: get('edema61'),
				'breath' => IReq:: get('breath61'),
				'fundus' => IReq:: get('fundus61'),
				'lochia' => IReq:: get('lochia61'),
				'episiotomy' => IReq:: get('episiotomy61'),
				'bladder' => IReq:: get('bladder61'),
				'h_r_p' => IReq:: get('h_r_p61'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'temp' => IReq:: get('temp62'),
				'pulse' => IReq:: get('pulse62'),
				'rr' => IReq:: get('rr62'),
				'bp' => IReq:: get('bp62'),
				'pain' => IReq:: get('pain62'),
				'loc' => IReq:: get('loc62'),
				'psy' => IReq:: get('psy62'),
				'wt' => IReq:: get('wt62'),
				'act' => IReq:: get('act62'),
				'nv' => IReq:: get('nv62'),
				'cnsc' => IReq:: get('cnsc62'),
				'ref' => IReq:: get('ref62'),
				'hom' => IReq:: get('hom62'),
				'edema' => IReq:: get('edema62'),
				'breath' => IReq:: get('breath62'),
				'fundus' => IReq:: get('fundus62'),
				'lochia' => IReq:: get('lochia62'),
				'episiotomy' => IReq:: get('episiotomy62'),
				'bladder' => IReq:: get('bladder62'),
				'h_r_p' => IReq:: get('h_r_p62'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'temp' => IReq:: get('temp71'),
				'pulse' => IReq:: get('pulse71'),
				'rr' => IReq:: get('rr71'),
				'bp' => IReq:: get('bp71'),
				'pain' => IReq:: get('pain71'),
				'loc' => IReq:: get('loc71'),
				'psy' => IReq:: get('psy71'),
				'wt' => IReq:: get('wt71'),
				'act' => IReq:: get('act71'),
				'nv' => IReq:: get('nv71'),
				'cnsc' => IReq:: get('cnsc71'),
				'ref' => IReq:: get('ref71'),
				'hom' => IReq:: get('hom71'),
				'edema' => IReq:: get('edema71'),
				'breath' => IReq:: get('breath71'),
				'fundus' => IReq:: get('fundus71'),
				'lochia' => IReq:: get('lochia71'),
				'episiotomy' => IReq:: get('episiotomy71'),
				'bladder' => IReq:: get('bladder71'),
				'h_r_p' => IReq:: get('h_r_p71'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'temp' => IReq:: get('temp72'),
				'pulse' => IReq:: get('pulse72'),
				'rr' => IReq:: get('rr72'),
				'bp' => IReq:: get('bp72'),
				'pain' => IReq:: get('pain72'),
				'loc' => IReq:: get('loc72'),
				'psy' => IReq:: get('psy72'),
				'wt' => IReq:: get('wt72'),
				'act' => IReq:: get('act72'),
				'nv' => IReq:: get('nv72'),
				'cnsc' => IReq:: get('cnsc72'),
				'ref' => IReq:: get('ref72'),
				'hom' => IReq:: get('hom72'),
				'edema' => IReq:: get('edema72'),
				'breath' => IReq:: get('breath72'),
				'fundus' => IReq:: get('fundus72'),
				'lochia' => IReq:: get('lochia72'),
				'episiotomy' => IReq:: get('episiotomy72'),
				'bladder' => IReq:: get('bladder72'),
				'h_r_p' => IReq:: get('h_r_p72'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'temp' => IReq:: get('temp81'),
				'pulse' => IReq:: get('pulse81'),
				'rr' => IReq:: get('rr81'),
				'bp' => IReq:: get('bp81'),
				'pain' => IReq:: get('pain81'),
				'loc' => IReq:: get('loc81'),
				'psy' => IReq:: get('psy81'),
				'wt' => IReq:: get('wt81'),
				'act' => IReq:: get('act81'),
				'nv' => IReq:: get('nv81'),
				'cnsc' => IReq:: get('cnsc81'),
				'ref' => IReq:: get('ref81'),
				'hom' => IReq:: get('hom81'),
				'edema' => IReq:: get('edema81'),
				'breath' => IReq:: get('breath81'),
				'fundus' => IReq:: get('fundus81'),
				'lochia' => IReq:: get('lochia81'),
				'episiotomy' => IReq:: get('episiotomy81'),
				'bladder' => IReq:: get('bladder81'),
				'h_r_p' => IReq:: get('h_r_p81'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'temp' => IReq:: get('temp82'),
				'pulse' => IReq:: get('pulse82'),
				'rr' => IReq:: get('rr82'),
				'bp' => IReq:: get('bp82'),
				'pain' => IReq:: get('pain82'),
				'loc' => IReq:: get('loc82'),
				'psy' => IReq:: get('psy82'),
				'wt' => IReq:: get('wt82'),
				'act' => IReq:: get('act82'),
				'nv' => IReq:: get('nv82'),
				'cnsc' => IReq:: get('cnsc82'),
				'ref' => IReq:: get('ref82'),
				'hom' => IReq:: get('hom82'),
				'edema' => IReq:: get('edema82'),
				'breath' => IReq:: get('breath82'),
				'fundus' => IReq:: get('fundus82'),
				'lochia' => IReq:: get('lochia82'),
				'episiotomy' => IReq:: get('episiotomy82'),
				'bladder' => IReq:: get('bladder82'),
				'h_r_p' => IReq:: get('h_r_p82'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_patient');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$i=IReq:: get('i');
		if($i==0)
		{
			$dataarray=array(
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_time');
			$Obj->setData($dataarray);
			$Obj->add();	
		}
		$dataarray=array(
			'temp' => IReq:: get('temp01'),
			'pulse' => IReq:: get('pulse01'),
			'rr' => IReq:: get('rr01'),
			'bp' => IReq:: get('bp01'),
			'pain' => IReq:: get('pain01'),
			'loc' => IReq:: get('loc01'),
			'psy' => IReq:: get('psy01'),
			'wt' => IReq:: get('wt01'),
			'act' => IReq:: get('act01'),
			'nv' => IReq:: get('nv01'),
			'cnsc' => IReq:: get('cnsc01'),
			'ref' => IReq:: get('ref01'),
			'hom' => IReq:: get('hom01'),
			'edema' => IReq:: get('edema01'),
			'breath' => IReq:: get('breath01'),
			'fundus' => IReq:: get('fundus01'),
			'lochia' => IReq:: get('lochia01'),
			'episiotomy' => IReq:: get('episiotomy01'),
			'bladder' => IReq:: get('bladder01'),
			'h_r_p' => IReq:: get('h_r_p01'),
			'basic_id' => IReq:: get('basic_id'),
			'time_id' => '-1'
		);
		$Obj = new IModel('obstetrical_progress_patient');
		$where ='basic_id ='.$basic_id.' AND time_id = -1';
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}

	//progress_fetal
	public function progress_fetal()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$this->redirect('progress_fetal');
	}
	
	
	public function progress_fetal_act()
	{
		$basic_id = IReq::get('basic_id');
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'variability' => IReq:: get('variability11'),
				'fhr' => IReq:: get('fhr11'),
				'frequency' => IReq:: get('frequency11'),
				'duration' => IReq:: get('duration11'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'variability' => IReq:: get('variability12'),
				'fhr' => IReq:: get('fhr12'),
				'frequency' => IReq:: get('frequency12'),
				'duration' => IReq:: get('duration12'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'variability' => IReq:: get('variability21'),
				'fhr' => IReq:: get('fhr21'),
				'frequency' => IReq:: get('frequency21'),
				'duration' => IReq:: get('duration21'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'variability' => IReq:: get('variability22'),
				'fhr' => IReq:: get('fhr22'),
				'frequency' => IReq:: get('frequency22'),
				'duration' => IReq:: get('duration22'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'variability' => IReq:: get('variability31'),
				'fhr' => IReq:: get('fhr31'),
				'frequency' => IReq:: get('frequency31'),
				'duration' => IReq:: get('duration31'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'variability' => IReq:: get('variability32'),
				'fhr' => IReq:: get('fhr32'),
				'frequency' => IReq:: get('frequency32'),
				'duration' => IReq:: get('duration32'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'variability' => IReq:: get('variability41'),
				'fhr' => IReq:: get('fhr41'),
				'frequency' => IReq:: get('frequency41'),
				'duration' => IReq:: get('duration41'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'variability' => IReq:: get('variability42'),
				'fhr' => IReq:: get('fhr42'),
				'frequency' => IReq:: get('frequency42'),
				'duration' => IReq:: get('duration42'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'variability' => IReq:: get('variability51'),
				'fhr' => IReq:: get('fhr51'),
				'frequency' => IReq:: get('frequency51'),
				'duration' => IReq:: get('duration51'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'variability' => IReq:: get('variability52'),
				'fhr' => IReq:: get('fhr52'),
				'frequency' => IReq:: get('frequency52'),
				'duration' => IReq:: get('duration52'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'variability' => IReq:: get('variability61'),
				'fhr' => IReq:: get('fhr61'),
				'frequency' => IReq:: get('frequency61'),
				'duration' => IReq:: get('duration61'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'variability' => IReq:: get('variability62'),
				'fhr' => IReq:: get('fhr62'),
				'frequency' => IReq:: get('frequency62'),
				'duration' => IReq:: get('duration62'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'variability' => IReq:: get('variability71'),
				'fhr' => IReq:: get('fhr71'),
				'frequency' => IReq:: get('frequency71'),
				'duration' => IReq:: get('duration71'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'variability' => IReq:: get('variability72'),
				'fhr' => IReq:: get('fhr72'),
				'frequency' => IReq:: get('frequency72'),
				'duration' => IReq:: get('duration72'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'variability' => IReq:: get('variability81'),
				'fhr' => IReq:: get('fhr81'),
				'frequency' => IReq:: get('frequency81'),
				'duration' => IReq:: get('duration81'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'variability' => IReq:: get('variability82'),
				'fhr' => IReq:: get('fhr82'),
				'frequency' => IReq:: get('frequency82'),
				'duration' => IReq:: get('duration82'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_fetal');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$i=IReq:: get('i');
		if($i==0)
		{
			$dataarray=array(
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_time');
			$Obj->setData($dataarray);
			$Obj->add();	
		}
		$dataarray=array(
			'variability' => IReq:: get('variability01'),
			'fhr' => IReq:: get('fhr01'),
			'frequency' => IReq:: get('frequency01'),
			'duration' => IReq:: get('duration01'),
			'basic_id' => IReq:: get('basic_id'),
			'time_id' => '-1'
		);
		$Obj = new IModel('obstetrical_progress_fetal');
		$where ='basic_id ='.$basic_id.' AND time_id = -1';
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}

	//progress_contractions
	public function progress_contractions()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$this->redirect('progress_contractions');
	}
	
	
	public function progress_contractions_act()
	{
		$basic_id = IReq::get('basic_id');
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'quality' => IReq:: get('quality11'),
				'tone' => IReq:: get('tone11'),
				'position' => IReq:: get('position11'),
				'cervical' => IReq:: get('cervical11'),
				'vaginal' => IReq:: get('vaginal11'),
				'oxytocic' => IReq:: get('oxytocic11'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'quality' => IReq:: get('quality12'),
				'tone' => IReq:: get('tone12'),
				'position' => IReq:: get('position12'),
				'cervical' => IReq:: get('cervical12'),
				'vaginal' => IReq:: get('vaginal12'),
				'oxytocic' => IReq:: get('oxytocic12'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'quality' => IReq:: get('quality21'),
				'tone' => IReq:: get('tone21'),
				'position' => IReq:: get('position21'),
				'cervical' => IReq:: get('cervical21'),
				'vaginal' => IReq:: get('vaginal21'),
				'oxytocic' => IReq:: get('oxytocic21'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'quality' => IReq:: get('quality22'),
				'tone' => IReq:: get('tone22'),
				'position' => IReq:: get('position22'),
				'cervical' => IReq:: get('cervical22'),
				'vaginal' => IReq:: get('vaginal22'),
				'oxytocic' => IReq:: get('oxytocic22'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'quality' => IReq:: get('quality31'),
				'tone' => IReq:: get('tone31'),
				'position' => IReq:: get('position31'),
				'cervical' => IReq:: get('cervical31'),
				'vaginal' => IReq:: get('vaginal31'),
				'oxytocic' => IReq:: get('oxytocic31'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'quality' => IReq:: get('quality32'),
				'tone' => IReq:: get('tone32'),
				'position' => IReq:: get('position32'),
				'cervical' => IReq:: get('cervical32'),
				'vaginal' => IReq:: get('vaginal32'),
				'oxytocic' => IReq:: get('oxytocic32'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'quality' => IReq:: get('quality41'),
				'tone' => IReq:: get('tone41'),
				'position' => IReq:: get('position41'),
				'cervical' => IReq:: get('cervical41'),
				'vaginal' => IReq:: get('vaginal41'),
				'oxytocic' => IReq:: get('oxytocic41'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'quality' => IReq:: get('quality42'),
				'tone' => IReq:: get('tone42'),
				'position' => IReq:: get('position42'),
				'cervical' => IReq:: get('cervical42'),
				'vaginal' => IReq:: get('vaginal42'),
				'oxytocic' => IReq:: get('oxytocic42'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'quality' => IReq:: get('quality51'),
				'tone' => IReq:: get('tone51'),
				'position' => IReq:: get('position51'),
				'cervical' => IReq:: get('cervical51'),
				'vaginal' => IReq:: get('vaginal51'),
				'oxytocic' => IReq:: get('oxytocic51'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'quality' => IReq:: get('quality52'),
				'tone' => IReq:: get('tone52'),
				'position' => IReq:: get('position52'),
				'cervical' => IReq:: get('cervical52'),
				'vaginal' => IReq:: get('vaginal52'),
				'oxytocic' => IReq:: get('oxytocic52'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'quality' => IReq:: get('quality61'),
				'tone' => IReq:: get('tone61'),
				'position' => IReq:: get('position61'),
				'cervical' => IReq:: get('cervical61'),
				'vaginal' => IReq:: get('vaginal61'),
				'oxytocic' => IReq:: get('oxytocic61'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'quality' => IReq:: get('quality62'),
				'tone' => IReq:: get('tone62'),
				'position' => IReq:: get('position62'),
				'cervical' => IReq:: get('cervical62'),
				'vaginal' => IReq:: get('vaginal62'),
				'oxytocic' => IReq:: get('oxytocic62'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'quality' => IReq:: get('quality71'),
				'tone' => IReq:: get('tone71'),
				'position' => IReq:: get('position71'),
				'cervical' => IReq:: get('cervical71'),
				'vaginal' => IReq:: get('vaginal71'),
				'oxytocic' => IReq:: get('oxytocic71'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'quality' => IReq:: get('quality72'),
				'tone' => IReq:: get('tone72'),
				'position' => IReq:: get('position72'),
				'cervical' => IReq:: get('cervical72'),
				'vaginal' => IReq:: get('vaginal72'),
				'oxytocic' => IReq:: get('oxytocic72'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'quality' => IReq:: get('quality81'),
				'tone' => IReq:: get('tone81'),
				'position' => IReq:: get('position81'),
				'cervical' => IReq:: get('cervical81'),
				'vaginal' => IReq:: get('vaginal81'),
				'oxytocic' => IReq:: get('oxytocic81'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'quality' => IReq:: get('quality82'),
				'tone' => IReq:: get('tone82'),
				'position' => IReq:: get('position82'),
				'cervical' => IReq:: get('cervical82'),
				'vaginal' => IReq:: get('vaginal82'),
				'oxytocic' => IReq:: get('oxytocic82'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$i=IReq:: get('i');
		if($i==0)
		{
			$dataarray=array(
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_time');
			$Obj->setData($dataarray);
			$Obj->add();	
		}
		$dataarray=array(
				'quality' => IReq:: get('quality01'),
				'tone' => IReq:: get('tone01'),
				'position' => IReq:: get('position01'),
				'cervical' => IReq:: get('cervical01'),
				'vaginal' => IReq:: get('vaginal01'),
				'oxytocic' => IReq:: get('oxytocic01'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_contractions');
			$where ='basic_id ='.$basic_id.' AND time_id = -1';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//progress_meds
	public function progress_meds()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$where = 'basic_id ='.$id;
		$Obj = new IModel('obstetrical_progress_medsname');
		$dataRow = $Obj->getObj($where);
		if(!empty($dataRow))
		{
			$this->setRenderData($dataRow);
		}
		$this->redirect('progress_meds');
	}
	
	
	public function progress_meds_act()
	{
		$basic_id = IReq::get('basic_id');
		//更新药名
		$dataarray=array(
				'meds1' => IReq:: get('meds1'),
				'meds2' => IReq:: get('meds2'),
				'meds3' => IReq:: get('meds3'),
				'meds4' => IReq:: get('meds4'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_progress_medsname');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'meds1' => IReq:: get('meds111'),
				'meds2' => IReq:: get('meds211'),
				'meds3' => IReq:: get('meds311'),
				'meds4' => IReq:: get('meds411'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'meds1' => IReq:: get('meds112'),
				'meds2' => IReq:: get('meds212'),
				'meds3' => IReq:: get('meds312'),
				'meds4' => IReq:: get('meds412'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'meds1' => IReq:: get('meds121'),
				'meds2' => IReq:: get('meds221'),
				'meds3' => IReq:: get('meds321'),
				'meds4' => IReq:: get('meds421'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'meds1' => IReq:: get('meds122'),
				'meds2' => IReq:: get('meds222'),
				'meds3' => IReq:: get('meds322'),
				'meds4' => IReq:: get('meds422'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'meds1' => IReq:: get('meds131'),
				'meds2' => IReq:: get('meds231'),
				'meds3' => IReq:: get('meds331'),
				'meds4' => IReq:: get('meds431'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'meds1' => IReq:: get('meds132'),
				'meds2' => IReq:: get('meds232'),
				'meds3' => IReq:: get('meds332'),
				'meds4' => IReq:: get('meds432'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'meds1' => IReq:: get('meds141'),
				'meds2' => IReq:: get('meds241'),
				'meds3' => IReq:: get('meds341'),
				'meds4' => IReq:: get('meds441'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'meds1' => IReq:: get('meds142'),
				'meds2' => IReq:: get('meds242'),
				'meds3' => IReq:: get('meds342'),
				'meds4' => IReq:: get('meds442'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'meds1' => IReq:: get('meds151'),
				'meds2' => IReq:: get('meds251'),
				'meds3' => IReq:: get('meds351'),
				'meds4' => IReq:: get('meds451'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'meds1' => IReq:: get('meds152'),
				'meds2' => IReq:: get('meds252'),
				'meds3' => IReq:: get('meds352'),
				'meds4' => IReq:: get('meds452'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'meds1' => IReq:: get('meds161'),
				'meds2' => IReq:: get('meds261'),
				'meds3' => IReq:: get('meds361'),
				'meds4' => IReq:: get('meds461'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'meds1' => IReq:: get('meds162'),
				'meds2' => IReq:: get('meds262'),
				'meds3' => IReq:: get('meds362'),
				'meds4' => IReq:: get('meds462'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'meds1' => IReq:: get('meds171'),
				'meds2' => IReq:: get('meds271'),
				'meds3' => IReq:: get('meds371'),
				'meds4' => IReq:: get('meds471'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'meds1' => IReq:: get('meds172'),
				'meds2' => IReq:: get('meds272'),
				'meds3' => IReq:: get('meds372'),
				'meds4' => IReq:: get('meds472'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'meds1' => IReq:: get('meds181'),
				'meds2' => IReq:: get('meds281'),
				'meds3' => IReq:: get('meds381'),
				'meds4' => IReq:: get('meds481'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'meds1' => IReq:: get('meds182'),
				'meds2' => IReq:: get('meds282'),
				'meds3' => IReq:: get('meds382'),
				'meds4' => IReq:: get('meds482'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$i=IReq:: get('i');
		if($i==0)
		{
			$dataarray=array(
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_time');
			$Obj->setData($dataarray);
			$Obj->add();	
		}
		$dataarray=array(
				'meds1' => IReq:: get('meds101'),
				'meds2' => IReq:: get('meds201'),
				'meds3' => IReq:: get('meds301'),
				'meds4' => IReq:: get('meds401'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_meds');
			$where ='basic_id ='.$basic_id.' AND time_id = -1';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//progress_po
	public function progress_po()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$this->redirect('progress_po');
	}
	
	
	public function progress_po_act()
	{
		$basic_id = IReq::get('basic_id');
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'liquids' => IReq:: get('liquids11'),
				'da' => IReq:: get('da11'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'liquids' => IReq:: get('liquids12'),
				'da' => IReq:: get('da12'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'liquids' => IReq:: get('liquids21'),
				'da' => IReq:: get('da21'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'liquids' => IReq:: get('liquids22'),
				'da' => IReq:: get('da22'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'liquids' => IReq:: get('liquids31'),
				'da' => IReq:: get('da31'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'liquids' => IReq:: get('liquids32'),
				'da' => IReq:: get('da32'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'liquids' => IReq:: get('liquids41'),
				'da' => IReq:: get('da41'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'liquids' => IReq:: get('liquids42'),
				'da' => IReq:: get('da42'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'liquids' => IReq:: get('liquids51'),
				'da' => IReq:: get('da51'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'liquids' => IReq:: get('liquids52'),
				'da' => IReq:: get('da52'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'liquids' => IReq:: get('liquids61'),
				'da' => IReq:: get('da61'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'liquids' => IReq:: get('liquids62'),
				'da' => IReq:: get('da62'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'liquids' => IReq:: get('liquids71'),
				'da' => IReq:: get('da71'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'liquids' => IReq:: get('liquids72'),
				'da' => IReq:: get('da72'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'liquids' => IReq:: get('liquids81'),
				'da' => IReq:: get('da81'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'liquids' => IReq:: get('liquids82'),
				'da' => IReq:: get('da82'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$i=IReq:: get('i');
		if($i==0)
		{
			$dataarray=array(
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_time');
			$Obj->setData($dataarray);
			$Obj->add();	
		}
		$dataarray=array(
				'liquids' => IReq:: get('liquids01'),
				'da' => IReq:: get('da01'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '-1'
			);
			$Obj = new IModel('obstetrical_progress_po');
			$where ='basic_id ='.$basic_id.' AND time_id = -1';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//progress_iv
	public function progress_iv()
	{
		$id = IReq::get('id');
		$this->id = $id;
		$where = 'basic_id ='.$id;
		$Obj = new IModel('obstetrical_progress_ivname');
		$this->data['name']= $Obj->getObj($where);
		$Obj = new IModel('obstetrical_progress_ivnotes');
		$this->data['notes']= $Obj->getObj($where);
		if(!empty($this->data))
		{
			$this->setRenderData($this->data);
		}
		$this->redirect('progress_iv');
	}
	
	
	public function progress_iv_act()
	{
		$basic_id = IReq::get('basic_id');
		//更新静脉
		$dataarray=array(
				'iv1' => IReq:: get('iv1'),
				'iv2' => IReq:: get('iv2'),
				'iv3' => IReq:: get('iv3'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_progress_ivname');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'iv1' => IReq:: get('iv111'),
				'iv2' => IReq:: get('iv211'),
				'iv3' => IReq:: get('iv311'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'iv1' => IReq:: get('iv112'),
				'iv2' => IReq:: get('iv212'),
				'iv3' => IReq:: get('iv312'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'iv1' => IReq:: get('iv121'),
				'iv2' => IReq:: get('iv221'),
				'iv3' => IReq:: get('iv321'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'iv1' => IReq:: get('iv122'),
				'iv2' => IReq:: get('iv222'),
				'iv3' => IReq:: get('iv322'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'iv1' => IReq:: get('iv131'),
				'iv2' => IReq:: get('iv231'),
				'iv3' => IReq:: get('iv331'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'iv1' => IReq:: get('iv132'),
				'iv2' => IReq:: get('iv232'),
				'iv3' => IReq:: get('iv332'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'iv1' => IReq:: get('iv141'),
				'iv2' => IReq:: get('iv241'),
				'iv3' => IReq:: get('iv341'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'iv1' => IReq:: get('iv142'),
				'iv2' => IReq:: get('iv242'),
				'iv3' => IReq:: get('iv342'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'iv1' => IReq:: get('iv151'),
				'iv2' => IReq:: get('iv251'),
				'iv3' => IReq:: get('iv351'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'iv1' => IReq:: get('iv152'),
				'iv2' => IReq:: get('iv252'),
				'iv3' => IReq:: get('iv352'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'iv1' => IReq:: get('iv161'),
				'iv2' => IReq:: get('iv261'),
				'iv3' => IReq:: get('iv361'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'iv1' => IReq:: get('iv162'),
				'iv2' => IReq:: get('iv262'),
				'iv3' => IReq:: get('iv362'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'iv1' => IReq:: get('iv171'),
				'iv2' => IReq:: get('iv271'),
				'iv3' => IReq:: get('iv371'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'iv1' => IReq:: get('iv172'),
				'iv2' => IReq:: get('iv272'),
				'iv3' => IReq:: get('iv372'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'iv1' => IReq:: get('iv181'),
				'iv2' => IReq:: get('iv281'),
				'iv3' => IReq:: get('iv381'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'iv1' => IReq:: get('iv182'),
				'iv2' => IReq:: get('iv282'),
				'iv3' => IReq:: get('iv382'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_iv');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$dataarray=array(
				'notes1' => IReq:: get('notes1'),
				'notes2' => IReq:: get('notes2'),
				'notes3' => IReq:: get('notes3'),
				'notes' => IReq:: get('notes'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_progress_ivnotes');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//progress_op
	public function progress_op()
	{
		$id = IReq::get('id');
		$this->id = $id;
		
		$where = 'basic_id ='.$id;
		
		$Obj = new IModel('obstetrical_progress_opname');
		$this->data['name']= $Obj->getObj($where);
		$Obj = new IModel('obstetrical_progress_opnotes');
		$this->data['notes']= $Obj->getObj($where);
		
		if(!empty($this->data))
		{
			$this->setRenderData($this->data);
		}
		$this->redirect('progress_op');
	}
	
	
	public function progress_op_act()
	{
		$basic_id = IReq::get('basic_id');
		//更新出量名
		$dataarray=array(
				'name1' => IReq:: get('name1'),
				'name2' => IReq:: get('name2'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_progress_opname');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		
		//更新time1
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 11';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time11
			$dataarray=array(
				'uop' => IReq:: get('uop11'),
				'ebl' => IReq:: get('ebl11'),
				'last_bm' => IReq:: get('last_bm11'),
				'other1' => IReq:: get('other111'),
				'other2' => IReq:: get('other211'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '11'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 11';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time12
			$dataarray=array(
				'uop' => IReq:: get('uop12'),
				'ebl' => IReq:: get('ebl12'),
				'last_bm' => IReq:: get('last_bm12'),
				'other1' => IReq:: get('other112'),
				'other2' => IReq:: get('other212'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '12'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 12';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time2
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 21';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time21
			$dataarray=array(
				'uop' => IReq:: get('uop21'),
				'ebl' => IReq:: get('ebl21'),
				'last_bm' => IReq:: get('last_bm21'),
				'other1' => IReq:: get('other121'),
				'other2' => IReq:: get('other221'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '21'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 21';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time22
			$dataarray=array(
				'uop' => IReq:: get('uop22'),
				'ebl' => IReq:: get('ebl22'),
				'last_bm' => IReq:: get('last_bm22'),
				'other1' => IReq:: get('other122'),
				'other2' => IReq:: get('other222'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '22'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 22';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time3
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 31';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time31
			$dataarray=array(
				'uop' => IReq:: get('uop31'),
				'ebl' => IReq:: get('ebl31'),
				'last_bm' => IReq:: get('last_bm31'),
				'other1' => IReq:: get('other131'),
				'other2' => IReq:: get('other231'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '31'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 31';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time32
			$dataarray=array(
				'uop' => IReq:: get('uop32'),
				'ebl' => IReq:: get('ebl32'),
				'last_bm' => IReq:: get('last_bm32'),
				'other1' => IReq:: get('other132'),
				'other2' => IReq:: get('other232'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '32'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 32';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time4
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 41';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time41
			$dataarray=array(
				'uop' => IReq:: get('uop41'),
				'ebl' => IReq:: get('ebl41'),
				'last_bm' => IReq:: get('last_bm41'),
				'other1' => IReq:: get('other141'),
				'other2' => IReq:: get('other241'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '41'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 41';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time42
			$dataarray=array(
				'uop' => IReq:: get('uop42'),
				'ebl' => IReq:: get('ebl42'),
				'last_bm' => IReq:: get('last_bm42'),
				'other1' => IReq:: get('other142'),
				'other2' => IReq:: get('other242'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '42'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 42';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time5
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 51';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time51
			$dataarray=array(
				'uop' => IReq:: get('uop51'),
				'ebl' => IReq:: get('ebl51'),
				'last_bm' => IReq:: get('last_bm51'),
				'other1' => IReq:: get('other151'),
				'other2' => IReq:: get('other251'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '51'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 51';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time52
			$dataarray=array(
				'uop' => IReq:: get('uop52'),
				'ebl' => IReq:: get('ebl52'),
				'last_bm' => IReq:: get('last_bm52'),
				'other1' => IReq:: get('other152'),
				'other2' => IReq:: get('other252'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '52'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 52';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time6
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 61';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time61
			$dataarray=array(
				'uop' => IReq:: get('uop61'),
				'ebl' => IReq:: get('ebl61'),
				'last_bm' => IReq:: get('last_bm61'),
				'other1' => IReq:: get('other161'),
				'other2' => IReq:: get('other261'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '61'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 61';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time62
			$dataarray=array(
				'uop' => IReq:: get('uop62'),
				'ebl' => IReq:: get('ebl62'),
				'last_bm' => IReq:: get('last_bm62'),
				'other1' => IReq:: get('other162'),
				'other2' => IReq:: get('other262'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '62'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 62';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time7
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 71';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time71
			$dataarray=array(
				'uop' => IReq:: get('uop71'),
				'ebl' => IReq:: get('ebl71'),
				'last_bm' => IReq:: get('last_bm71'),
				'other1' => IReq:: get('other171'),
				'other2' => IReq:: get('other271'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '71'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 71';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time72
			$dataarray=array(
				'uop' => IReq:: get('uop72'),
				'ebl' => IReq:: get('ebl72'),
				'last_bm' => IReq:: get('last_bm72'),
				'other1' => IReq:: get('other172'),
				'other2' => IReq:: get('other272'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '72'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 72';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新time8
		$Obj = new IModel('obstetrical_progress_time');
		$where ='basic_id ='.$basic_id.' AND time_id = 81';
		$is_in = $Obj->getobj($where);
		if(!empty($is_in))
		{
			//更新time81
			$dataarray=array(
				'uop' => IReq:: get('uop81'),
				'ebl' => IReq:: get('ebl81'),
				'last_bm' => IReq:: get('last_bm81'),
				'other1' => IReq:: get('other181'),
				'other2' => IReq:: get('other281'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '81'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 81';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
			//更新time82
			$dataarray=array(
				'uop' => IReq:: get('uop82'),
				'ebl' => IReq:: get('ebl82'),
				'last_bm' => IReq:: get('last_bm82'),
				'other1' => IReq:: get('other182'),
				'other2' => IReq:: get('other282'),
				'basic_id' => IReq:: get('basic_id'),
				'time_id' => '82'
			);
			$Obj = new IModel('obstetrical_progress_op');
			$where ='basic_id ='.$basic_id.' AND time_id = 82';
			$is_in = $Obj ->getObj($where);
			$Obj->setData($dataarray);
			if(!empty($is_in))
			{	
				$Obj->update($where);	
			}
			else 
			{
				$Obj->add();	
			}
		}
		
		//更新详细记录
		$dataarray=array(
				'notes1' => IReq:: get('notes1'),
				'notes2' => IReq:: get('notes2'),
				'notes3' => IReq:: get('notes3'),
				'notes4' => IReq:: get('notes4'),
				'notes5' => IReq:: get('notes5'),
				'notes6' => IReq:: get('notes6'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_progress_opnotes');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/progress_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//postpartum_basic
	public function postpartum_basic()
	{
		$id = IReq::get('id');
		$this->id = $id;
		
		$where = 'basic_id ='.$id;
		$Obj = new IModel('obstetrical_postpartum_basic');
		$data= $Obj->getObj($where);
		if(!empty($data))
		{
			$this->setRenderData($data);
		}
		$this->redirect('postpartum_basic');
	}
	
	
	public function postpartum_basic_act()
	{
		$basic_id = IReq::get('basic_id');
		$dataarray=array(
				'date' => IReq:: get('date'),
				'svb' => IReq:: get('svb'),
				'pm' => IReq:: get('pm'),
				'at' => IReq:: get('at'),
				'toe' => IReq:: get('toe'),
				'ox' => IReq:: get('ox'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_postpartum_basic');
		$where ='basic_id ='.$basic_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/postpartum_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	//postpartum_record
	public function postpartum_record()
	{
		$id = IReq::get('id');	//id中整数部分为$id,小数部分为$time_id
		$this->id = floor($id);
		$this->time_id = ($id - $this->id) * 100;
		$where = 'basic_id ='.$this->id.' AND time_id ='.$this->time_id;
		$Obj = new IModel('obstetrical_postpartum_record');
		$data= $Obj->getObj($where);
		if(!empty($data))
		{
			$this->setRenderData($data);
		}
		$this->redirect('postpartum_record');
	}
	
	
	public function postpartum_record_act()
	{
		$basic_id = IReq::get('basic_id');
		$time_id = IReq::get('time_id');
		//更新时间
		$dataarray=array(
				'time' => IReq:: get('time'),
				'time_id' => IReq:: get('time_id'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_postpartum_time');
		$where ='basic_id ='.$basic_id.' AND time_id ='.$time_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		//更新record
		$dataarray=array(
				'bp' => IReq:: get('bp'),
				'prr' => IReq:: get('prr'),
				'temp' => IReq:: get('temp'),
				'spo' => IReq:: get('spo'),
				'ox' => IReq:: get('ox'),
				'ss' => IReq:: get('ss'),
				'motor' => IReq:: get('motor'),
				'iv' => IReq:: get('iv'),
				'fun' => IReq:: get('fun'),
				'loc' => IReq:: get('loc'),
				'per' => IReq:: get('per'),
				'inc' => IReq:: get('inc'),
				'dre' => IReq:: get('dre'),
				'med' => IReq:: get('med'),
				'ini' => IReq:: get('ini'),
				'time_id' => IReq:: get('time_id'),
				'basic_id' => IReq:: get('basic_id')
		);
		$Obj = new IModel('obstetrical_postpartum_record');
		$where ='basic_id ='.$basic_id.' AND time_id ='.$time_id;
		$is_in = $Obj ->getObj($where);
		$Obj->setData($dataarray);
		if(!empty($is_in))
		{	
			$Obj->update($where);	
		}
		else 
		{
			$Obj->add();	
		}
		$url = IUrl::creatUrl("/obstetrical/postpartum_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
	
	
	
}

?>