<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/board/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/board/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/board/runtime/systemjs/autovalidate/validate.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/bob2_anime.gif";?>" width="70" height="70" /></a>
		</div>
		<div id="menu">
			<ul name="menu">
			</ul>
		</div>
		<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
	</div>
	<?php $admin_id = $this->admin['admin_id']?>
	<div id="info_bar"><label class="navindex"><a href="<?php echo IUrl::creatUrl("/system/navigation");?>">快速导航管理</a></label><span class="nav_sec">
	<?php $query = new IQuery("quick_naviga");$query->where = "adminid = $admin_id and is_del = 0";$items = $query->find(); foreach($items as $key => $item){?>
	<a href="<?php echo isset($item['url'])?$item['url']:"";?>" class="selected"><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></a>
	<?php }?>
	</span></div>
	<div id="admin_left">
		<ul class="submenu">
		</ul>
		<div id="copyright">
			
		</div>
	</div>
	<?php $menu = new Menu();?>
	<script type='text/javascript'>
		var data = <?php echo $menu->submenu();?>;
		var current = '<?php echo $menu->current;?>';
		var url='<?php echo IUrl::creatUrl("/");?>';
		initMenu(data,current,url);
	</script>
	<div id="admin_right">
	<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/Calendar4.js";?>"></script> 
<script language="JavaScript" type="text/javascript">
//admission_detail_edit
function admission_detail_edit()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/admission_detail_edit/id/$id");?>', {
		id:'add_spec',
		lock: true,
	    title: 'Edit Data'

	}, true);
}

//admission_complaint
function admission_complaint()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/admission_complaint_edit/id/$id");?>', {
		id:'add_complaint',
		lock: true,
	    title: 'Edit Complaint Data',
	    width: '1000px'
	}, true);
}

//admission_ob_assessment
function admission_ob_assessment()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/admission_ob_assessment/id/$id");?>', {
		id:'add_complaint',
		lock: true,
	    title: 'Edit Assessment Data',
	    width: '1000px'
	}, true);
}
//admission_prenatal_labs
function admission_prenatal_labs()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/admission_prenatal_labs/id/$id");?>', {
		id:'add_complaint',
		lock: true,
	    title: 'Edit Assessment Data',
	    width: '1000px'
	}, true);
}
//admission_procedures
function admission_procedures()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/admission_procedures/id/$id");?>', {
		id:'add_complaint',
		lock: true,
	    title: 'Edit Assessment Data',
	    width: '1000px'
	}, true);
}
</script>
<div class="headbar">
	<div class="position"><span>Obstetrical</span><span>></span><span>Admission Record</span><span>></span><span>edit</span></div>
</div>
	<div class="content1"  >
	<table>
		<tr>
			<td>Name:<?php echo isset($name)?$name:"";?>&nbsp;&nbsp;&nbsp;</td>
			<td>Hospital:<?php echo isset($hospital)?$hospital:"";?>&nbsp;&nbsp;&nbsp;</td>
			<td>Date:<?php echo isset($date)?$date:"";?>&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>
	<div class="xf-main">
		<table style="border-collapse:collapse"  onclick='admission_detail_edit();'>
					<tr>
						<td>TIME时间:&nbsp;<a style='color:red'><?php echo isset($time)?$time:"";?></a></td>
						<td>ARRIVED FROM来自：<br>
							<?php if($form_where == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>ED急诊&nbsp;
							<?php if($form_where == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Home家&nbsp;
							<?php if($form_where == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Clinic门诊&nbsp;
							<?php if($form_where == 4){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Floor病房&nbsp;
							<?php if($form_where == 5){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Transfer from外院&nbsp;
						</td>
						<td>ACOMPANIED BY陪同：<a style='color:red'><?php echo isset($accompany)?$accompany:"";?></a></td>
					</tr>
					<tr><td>UNIT部门:<a style='color:red'><?php echo isset($unit)?$unit:"";?></a></td>
						<td>ADDMITTING NURSE接待护士:<a style='color:red'><?php echo isset($add_nurse)?$add_nurse:"";?></a></td>
						<td>VIA通过：
							<?php if($via == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Wheelchair轮椅
							<?php if($via == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Cart推车
							<?php if($via == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Ambulatory步行
							<?php if($via == 4){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Ambulance救护车
							<?php if($via == 5){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Other其他
						</td>
					</tr>
		</table>
		<table style="border-collapse:collapse"  onclick='admission_complaint();'>
			<tr>
				<td rowspan="2">
						<p>ADNISSION COMPLAINT入院主诉：</p><br>
							<p><?php if(in_array(1,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>R/O Labor排除临产</p>
							<p><?php if(in_array(2,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>R/O PTL排除早产</p>
							<p><?php if(in_array(3,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>R/O SROM排除破水</p>
							<p><?php if(in_array(4,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>R/O PIH排除妊高症</p>
							<p><?php if(in_array(5,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Decrease Fetal Movement 胎动减少</p>
							<p><?php if(in_array(6,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Headache头痛</p>
							<p><?php if(in_array(7,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Nausea/Vomiting恶心/呕吐</p>
							<p><?php if(in_array(8,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Status Post Fall/MVA摔倒/车祸</p>
							<p><?php if(in_array(9,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Scheduled Procedure预约操作<a style='color:red'><?php echo isset($scheduled_provedure)?$scheduled_provedure:"";?></a></p>
							<p><?php if(in_array(10,$this->all_pre_sympton )){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Other其他<a style='color:red'><?php echo isset($other)?$other:"";?></a></p>
				</td>
				<td>AGE年龄:<a style='color:red'><?php echo isset($age)?$age:"";?></a></td>
				<td>GRACIDA次孕:<a style='color:red'><?php echo isset($gracida)?$gracida:"";?></a></td>
				<td>TERM足月：<a style='color:red'><?php echo isset($term)?$term:"";?></a></td>
				<td>PRETERM早产：<a style='color:red'><?php echo isset($preter)?$preter:"";?></a></td>
				<td>Antibdy抗体：<a style='color:red'><?php echo isset($antibdy)?$antibdy:"";?></a></td>
				<td>LIVING存活：<a style='color:red'><?php echo isset($living)?$living:"";?></a></td>
			</tr>
			<tr>
				<td>LMO末次月经：<a style='color:red'><?php echo isset($lmp)?$lmp:"";?></a></td>
				<td>EDC预产期：<a style='color:red'><?php echo isset($ega)?$ega:"";?></a></td>
				<td>EGA胎龄：<a style='color:red'><?php echo isset($edc)?$edc:"";?></a></td>
				<td>HT身高：<a style='color:red'><?php echo isset($ht)?$ht:"";?></a></td>
				<td>WT体重：<a style='color:red'><?php echo isset($wt)?$wt:"";?></a></td>
				<td>Wt Gain增重：<a style='color:red'><?php echo isset($wt_gain)?$wt_gain:"";?></a></td>
			</tr>
		</table>
		<table style="border-collapse:collapse"  onclick='admission_ob_assessment();'>
			<tr>
				<td rowspan="4">
					<p>OB ASSESSMENT:(Subiective)产前评估（主观指标）</p>
					<p>Uterus:
					<?php if($uterus == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Soft软
					<?php if($uterus == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>NonTender不硬
					<?php if($uterus == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Tender硬
					<?php if($uterus == 4){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Ridge极硬
					</p>
					<p>(子宫)contraction宫缩q: <a style='color:red'><?php echo isset($contraction)?$contraction:"";?></a>&nbsp;&nbsp;Date/Time时间:<a style='color:red'><?php echo isset($contruction_date)?$contruction_date:"";?></a></p>
					<p>FetalNovement:
					<?php if($fetal_movement == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Present有
					<?php if($fetal_movement == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Absent无
					<?php if($fetal_movement == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Decreased减少
					</p>
					<p>(胎动)Last move:Date/Time末次时间:<a style='color:red'><?php echo isset($fetal_date)?$fetal_date:"";?></a></p>
					
					<!-- 
					<p>Membranes:
					<?php
						$temp_obj = new IModel('ammiot_type');
						$temp = $temp_obj->getObj('id ='.$membranes);
					?>
					<?php if(!empty($temp)){?>
					<a style='color:red'><?php echo isset($temp['description_en'])?$temp['description_en']:"";?></a>
					<?php }else{?>空
					<?php }?>
					</p>
					<p>(羊膜)Rupture Date/Time破膜时间：____Color颜色____</p>
					 -->
					<p>R/O PTL排除早产：</p>
					<p>Recent Intercourse Time末次性交时间:<a style='color:red'><?php echo isset($recent_intercourse)?$recent_intercourse:"";?></a></p>
					<p>S/P Fall/MVA point of Impact摔倒、车祸涉及部位：<a style='color:red'><?php echo isset($s_p)?$s_p:"";?></a></p>
				</td>
				<td>
					<p>ULTRASOUND超声：</p>
					<p>
					<?php if($initial == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Done有
					<?php if($initial == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Not Done无
					<?php if($initial == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Available能做
					<?php if($initial == 4){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Not Available不能做
					</p>
					<p>Initial Date首次日期：<a style='color:red'><?php echo isset($initial_date)?$initial_date:"";?></a></p>
					<p>EDC by US预产期:<a style='color:red'><?php echo isset($edc_by_us)?$edc_by_us:"";?></a>EGA by US胎龄(周):<a style='color:red'><?php echo isset($ega_by_us)?$ega_by_us:"";?></a></p>
					<p>FINAL EDC最后确定的预产期:<a style='color:red'><?php echo isset($final_edc)?$final_edc:"";?></a></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PREVIOUS BLOOD TRANSFUSION输血史</p>
					<p>
					<?php if($blood_transfusion_solid == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?> No 无
					<?php if($blood_transfusion_solid == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?> Yes 有
					<?php if($blood_transfusion_solid == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?> Reaction反应</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Previous C/S剖宫产史：
					<?php if($pre_c_s == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Yes 有
					<?php if($pre_c_s == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>No 无
					</p>
					<p>Attempted VTOL剖宫产后阴道分娩：
					<?php if($attempted == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Yes 有
					<?php if($attempted == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>No 无
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>LAST INTAKE 末次饮食</p>
					<p>Solid固体：Date/Time:日期时间:<a style='color:red'><?php echo isset($last_intake_solid)?$last_intake_solid:"";?></a></p>
					<p>Fluid液体：Date/Time:日期时间:<a style='color:red'><?php echo isset($lasr_intake_fluid)?$lasr_intake_fluid:"";?></a></p>
				</td>
			</tr>
	
		</table>
		<table style="border-collapse:collapse"  onclick='admission_prenatal_labs();' >
			<tr>
				<td rowspan="5">
					<p>PRENAL LABS:产前实验室</p>
					<p>
					<?php if($status == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Done有
					<?php if($status == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Not Done无
					</p>
					<p>
					<?php if($status == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Available能做
					<?php if($status == 4){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Not Available不能做
					</p>
					<p>Blood Type血型 :<a style='color:red'><?php echo isset($blood_type)?$blood_type:"";?></a></p>
					<p>Antibody 抗体:<a style='color:red'><?php echo isset($antibody)?$antibody:"";?></a></p>
					<p>Rubella风疹:<a style='color:red'><?php echo isset($rubella)?$rubella:"";?></a></p>
					<p>HBsAg乙肝表面抗原:<a style='color:red'><?php echo isset($hbsag)?$hbsag:"";?></a></p>
					<p>VDRL梅毒:<a style='color:red'><?php echo isset($vdrl)?$vdrl:"";?></a>Date日期:<a style='color:red'><?php echo isset($vdrl_date)?$vdrl_date:"";?></a></p>
					<p>GBBS(ASO):<a style='color:red'><?php echo isset($gbbs)?$gbbs:"";?></a></p>
					<p>HIV艾滋病毒:<a style='color:red'><?php echo isset($hiv)?$hiv:"";?></a></p>
					<p>PPD结核菌素试验:<a style='color:red'><?php echo isset($ppd)?$ppd:"";?></a></p>
					<p>CXR胸片 :<a style='color:red'><?php echo isset($cxr)?$cxr:"";?></a></p>
				</td>
				<td>
					<p>CURRENT MEDICATIONS 目前服用药物：<a style='color:red'><?php echo isset($current_medication)?$current_medication:"";?></a></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>CURRENT RISK FACTORS/OB COMPLICATIONS 目前危险因素、产科并发症：<a style='color:red'><?php echo isset($current_risk)?$current_risk:"";?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PRIOR PREGNANCY RISK FACTORS怀孕前危险因素：<a style='color:red'><?php echo isset($pre_risk)?$pre_risk:"";?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>MEDICAL/SURGICAL Hx 内/外科病史：<a style='color:red'><?php echo isset($medical_surgical_hx)?$medical_surgical_hx:"";?></p>	
				</td>
			</tr>
			<tr>
				<td>
					<p>ALLERGIES 过敏/副反应史:<a style='color:red'><?php echo isset($allergies)?$allergies:"";?></a></p>
					<p>Reaction表现：<a style='color:red'><?php echo isset($reaction)?$reaction:"";?></a></p>
					<p>
					<?php if($nkda == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>NKDA无药物过敏
					<?php if($allergy == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Allergy Bracelet Applied带上药物过敏警示手镯</p>	
				</td>
			</tr>
		
		</table>
		<table style="border-collapse:collapse" onclick='admission_procedures();'>
			<tr>
				<td rowspan="2">
					<p>PROCEDURES:(Objective)操作(客观指标)</p>
					<p>IV Start静脉：Location部位
					<a style='color:red'><?php echo isset($iv_start_location)?$iv_start_location:"";?></a>
					Size针号<a style='color:red'><?php echo isset($iv_start_size)?$iv_start_size:"";?></a>
					</p>
					<p>Fluid 液体type/Rate
					种类/滴速:<a style='color:red'><?php echo isset($fluid_type_rate)?$fluid_type_rate:"";?></a>
					Glucose血糖:<a style='color:red'><?php echo isset($fluid_glucose)?$fluid_glucose:"";?></a>
					</p>
					<p>SSE:Examiner检查人:<a style='color:red'><?php echo isset($sse_examiner)?$sse_examiner:"";?></a>
					Date/Time时间:<a style='color:red'><?php echo isset($sse_date_time)?$sse_date_time:"";?></a>
					</p>
					<p>
					<?php if($sse_intact == 1){?><a style='color:red'>√</a>Intact完整  □ ROM Color破膜羊水颜色<?php }else{?>
					□ Intact完整  <a style='color:red'>√</a> ROM Color破膜羊水颜色 <a style='color:red'><?php echo isset($sse_rom_color)?$sse_rom_color:"";?></a><?php }?>
					</p>
					<p>
					Ferning羊齿状结晶：
					<?php if($sse_ferning == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Absent阴性
					<?php if($sse_ferning == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Present阳性
					</p>
					<p>Nitrazine石蕊试纸：
					<?php if($sse_nitrazine == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Absent阴性
					<?php if($sse_nitrazine == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Present阳性(碱性)
					</p>
					<p>Pooling羊水池：
					<?php if($sse_pooling == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Absent阴性
					<?php if($sse_pooling == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Present阳性</p>
					<p>
					<?php if($sse_is_labs_sent == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Labs Sent送血检<a style='color:red'><?php echo isset($sse_labs_sent)?$sse_labs_sent:"";?></a>
					<?php if($sse_is_urine_sent == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Urine sent送尿检<a style='color:red'><?php echo isset($sse_urine_sent)?$sse_urine_sent:"";?></a></p>
					<p><?php if($sse_is_cultures_sent == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Cultures sent送培养<a style='color:red'><?php echo isset($sse_cultures_sent)?$sse_cultures_sent:"";?></a>
					<?php if($sse_is_other == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Other其他<a style='color:red'><?php echo isset($sse_other)?$sse_other:"";?></a></p>
					<p>URINALYSIS尿常规：S-Gravity比重&nbsp;<a style='color:red'><?php echo isset($urinalysis_sgravity)?$urinalysis_sgravity:"";?>&nbsp;</a>Color颜色&nbsp;<a style='color:red'><?php echo isset($urinalysis_color)?$urinalysis_color:"";?>&nbsp;</a></p>
					<p>Apprnce外观&nbsp;<a style='color:red'><?php echo isset($urinalysis_apprnce)?$urinalysis_apprnce:"";?>&nbsp;</a>Leuko白细胞&nbsp;<a style='color:red'><?php echo isset($urinalysis_leuo)?$urinalysis_leuo:"";?>&nbsp;</a>Heme尿红素&nbsp;<a style='color:red'><?php echo isset($urinalysis_heme)?$urinalysis_heme:"";?>&nbsp;</a></p>
					<p>Glucose糖&nbsp;<a style='color:red'><?php echo isset($urinalysis_glucose)?$urinalysis_glucose:"";?>&nbsp;</a>Ketones酮&nbsp;<a style='color:red'><?php echo isset($urinalysis_ketones)?$urinalysis_ketones:"";?>&nbsp;</a>Proein蛋白&nbsp;<a style='color:red'><?php echo isset($urinalysis_protein)?$urinalysis_protein:"";?>&nbsp;</a></p>		
				</td>
				<td>
					<p>RESEARCH SUDIES参加研究：</p>
					<p>
					<?php if($is_research_sudies == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>No 无
					<?php if($is_research_sudies == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Yes 有<a style='color:red'><?php echo isset($research_sudies)?$research_sudies:"";?></a></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>AMBULATION活动</p>
					<p>EFM off无胎心监护<a style='color:red'><?php echo isset($ambulation_em_off)?$ambulation_em_off:"";?></a>Walking for 行走<a style='color:red'><?php echo isset($ambulation_walking_for)?$ambulation_walking_for:"";?></a>Hrs小时</p>
					<p>DISPOSITION 出产房 Date/Time时间<a style='color:red'><?php echo isset($disposition_date)?$disposition_date:"";?></a></p>
					<p>
					Admitted to 住院病区<a style='color:red'><?php echo isset($disposition_admitted)?$disposition_admitted:"";?></a></p>
					<p>via通过：
					<?php if($disposition_via == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Ambulatory行走
					<?php if($disposition_via == 2){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Wheelchair轮椅
					<?php if($disposition_via == 3){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Cart推车
					</p>
					<p>Report given to交班给：<a style='color:red'><?php echo isset($disposition_report_given)?$disposition_report_given:"";?></a></p>
					<p><?php if($ida == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>ID Band Applied病人手镯
					<?php if($clinical_nutrition_consult == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Clinical Nutrition Consult营养师会诊
					</p>
					<p><?php if($home_with_instruction == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Home W/Instruction带出院指导回家</p>
					<p><?php if($verbalizes_understand == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Verbalize Understanding能理解口头交代</p>
					<p><?php if($discharge_ama == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Discharge AMA自动离院</p>
					<p><?php if($social_work_center_consult == 1){?><a style='color:red'>√</a><?php }else{?>□<?php }?>Social Work/Wellness Center Consult社区服务中心</p>
				</td>
			</tr>
		</table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
</div>
</div>

	</div>
	<div id="separator"></div>
</div>

</body>
</html>
