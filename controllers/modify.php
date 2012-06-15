<?php
class Modify extends IController
{
	public $layout='';
	public  $data =array();
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
		/*
		if($id)
		{
			$where = 'basic_id ='.$id;
			$Obj = new IModel('obstetrical_progress_patient');
			$dataRow = $Obj->getObj($where);
			if(!empty($dataRow))
			{
				$this->setRenderData($dataRow);
			}
		}*/
		$this->redirect('progress_patient');
	}
	
	
	public function progress_patient_act()
	{/*
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
		}*/
		$url = IUrl::creatUrl("/obstetrical/surgery_edit/id/").$basic_id;
		header('Location:'.$url);
	}
	
}

?>