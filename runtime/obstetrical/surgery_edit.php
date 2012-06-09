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
//surgery_illness_edit
function surgery_illness_edit()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/surgery_illness_edit/id/$id");?>', {
		id:'add_Illness',
		lock: true,
	    title: 'Illness',
	    width: '1000px'
	}, true);
}
function surgery_system_review()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/surgery_system_review/id/$id");?>', {
		id:'add_Illness',
		lock: true,
	    title: 'Illness',
	    width: '1000px'
	}, true);
}
//surgery_hx_all()
function surgery_hx_all()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/surgery_hx_all/id/$id");?>', {
		id:'add_Illness',
		lock: true,
	    title: 'Illness',
	    width: '1000px'
	}, true);
}
//surgery_plan()
function surgery_plan_all()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/surgery_plan_all/id/$id");?>', {
		id:'add_Illness',
		lock: true,
	    title: 'Illness',
	    width: '1000px'
	}, true);
}
</script>

<div class="headbar">
	<div class="position"><span>Obstetrical</span><span>></span><span>Surgery Record</span><span>></span><span>edit</span></div>
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
		<table style="border-collapse:collapse" onclick='surgery_illness_edit();'>
			<tr><td colspan="2"><p>Hx of Present Pregnancy and Illness</p><br>
								<p>G孕 <a style='color:red'><?php echo isset($gracida)?$gracida:"";?></a>产 <a style='color:red'><?php echo isset($living)?$living:"";?></a>Gestational Week(days)孕期 <a style='color:red'><?php echo isset($ega_by_us)?$ega_by_us:"";?></a></p>
								<p>HTN高血压；Edemas水肿：+，++，+++：Headache头痛：Blur Vision视物模糊；</p>
								<p>Hyperglycemia高血糖：Abdominal Pain腹痛：Vaginal Bleeding阴道出血
								 <a style='color:red'><?php echo isset($pregnacy_description)?$pregnacy_description:"";?></a></p>
				</td>
				<td rowspan="3" ><p>Current Nedications现用药物
				 <a style='color:red'><?php echo isset($current_medication)?$current_medication:"";?></a></p></td></tr>
			</tr>
			<tr><td>Previous Anesthesia&Surgeries麻醉/手术史 
			<a style='color:red'><?php echo isset($pre_anesthesia)?$pre_anesthesia:"";?></a></td>
				<td rowspan="2">Allergies/Intolerances药物过敏/副反应史
				<a style='color:red'><?php echo isset($allergies)?$allergies:"";?></a></td>
			</tr>
			<tr><td>Family Hx of Anesthesia/Medical/Surgical Cx麻醉/内科/外科并发症
			<a style='color:red'><?php echo isset($medical_surgical_hx)?$medical_surgical_hx:"";?></a></td>
			
	</table>
	<table style="border-collapse:collapse" onclick='surgery_system_review();'>
		<tr>
			<td>SYSTEN REVIEW系统回顾/Normal正常or COMMENTS详细描述（Space on the back）
			</td><td>LABOIATORY实验室检查</td>
		</tr>
		<tr>
			<td>Normal正常CARDIOVASCULAR心血管：HTN高血压，CAD/MI冠心，Valvular Dz瓣膜病，CHF心衰，Arrhythmia心律失常，PVD周围心管病，CVA/ITA中
			<a style='color:red'><?php echo isset($review_cardovascular)?$review_cardovascular:"";?></a></td>	
			<td>EKG心电图，Echo（心超）CXR胸片，ABG血气分析
			<a style='color:red'><?php echo isset($review_laboratory)?$review_laboratory:"";?></a></td>	
		</tr>
		<tr>
			<td>Normal正常RESPIRATORY呼吸道：Asthma哮喘，COPD慢阻肺，Snoring/OSA睡眠呼暂停，Recent URI/Pneumonia新近上呼吸道感染/肺炎
			<a style='color:red'><?php echo isset($review_respiratory)?$review_respiratory:"";?></a></td>	
			<td rowspan="2" >Liver Function Test肝功能
			<a style='color:red'><?php echo isset($review_liver)?$review_liver:"";?></a></td>
		</tr>
		<tr><td>Normal正常GI/HEPATIC消化道：Liver Dz肝病/Heptitis肝炎，Hiatal Hernia食道裂孔疝，GERD胃食管反流
		<a style='color:red'><?php echo isset($review_gi_hepatic)?$review_gi_hepatic:"";?></a></td></tr>
		<tr>
			<td>Normal正常RENAL/ENDOCRINE肾脏/内分泌：DM糖尿病，Steroid糖皮质醇，Thyroid Dz甲状腺病，Renal Failure肾衰
			<a style='color:red'><?php echo isset($review_renal)?$review_renal:"";?></a></td>
			<td rowspan="2">CHEMISTRIES生化
			<a style='color:red'><?php echo isset($review_chmistries)?$review_chmistries:"";?></a></td>
		</tr>
		<tr><td>Normal正常NEURO/MUSCULOSKELETAL神经/肌肉骨骼：Seizures癫痫，Paralysis瘫痪，Arthritis关节炎：Neck颈，Scoliosis（脊椎畸形），LBP(腰痛)
		<a style='color:red'><?php echo isset($review_newuro)?$review_newuro:"";?></a></td></tr>
		<tr><td>Normal正常HEMOTOLOGY血液病：Bleeding Dz出血病，Anemia贫血，Transfusion输血<a style='color:red'><?php echo isset($review_hemotology)?$review_hemotology:"";?></a></td><td>LMP末次月经
		<a style='color:red'><?php echo isset($lmp)?$lmp:"";?></a></td></tr>
	</table>
	<table style="border-collapse:collapse" onclick="surgery_hx_all();">
		<tr>
			<td>Smoking Hx吸烟史
			<a style='color:red'><?php echo isset($hx_smocking)?$hx_smocking:"";?></a></td>
			<td>Alcohol Use饮酒史
			<a style='color:red'><?php echo isset($hx_alcohol_use)?$hx_alcohol_use:"";?></a></td>
			<td>Substance Use吸毒史
			<a style='color:red'><?php echo isset($hx_substance_use)?$hx_substance_use:"";?></a></td>
			<td>Social Situation社会情况：
			<a style='color:red'><?php echo isset($hx_social_situation)?$hx_social_situation:"";?></a></td>
		</tr>
		<tr><td rowspan="4">
			<p>AIRWAY气道</p>
			 <p>TMT Opening 下颌开启
			<a style='color:red'><?php echo isset($airway_tnj)?$airway_tnj:"";?></a></p>
			 <p>Neck Movement颈活动度</p>
			 <p><a style='color:red'><?php echo isset($airway_neck_full_rom)?$airway_neck_full_rom:"";?></a></P>
			 <P>H-M Distance舌颌距离
				<a style='color:red'><?php echo isset($airway_hm_distance)?$airway_hm_distance:"";?></a></p>
			 <p>Mallampati Class
				<a style='color:red'><?php echo isset($airway_dental)?$airway_dental:"";?></a></p>
			 <p>Dental牙齿：<br>
			 Chipped缺损，Missing缺失，<br>Loose松动，Capped假牙，<br>Bonded矫正牙，Bridge桥，<br>Carious蛀牙
			 </p>
			 <p>AirwayPath病理气道：
			 <a style='color:red'><?php echo isset($airway_path)?$airway_path:"";?></a></p>
		</td>
		</tr>
		<td colspan="3" >PHYSICAL EXAMINATION体检（Space on the back）</td>
		<tr><td colspan="2">HEART 心脏
		<a style='color:red'><?php echo isset($physical_examination_heart)?$physical_examination_heart:"";?></a></td><td>LUNGS 肺
		<a style='color:red'><?php echo isset($physical_examination_lungs)?$physical_examination_lungs:"";?></a></td></tr>
		<tr><td  colspan="2">OBSTETRICAL EXAN(产科检查)：
		
		<!--  -->
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
					<p>R/O PTL排除早产：</p>
					<p>Recent Intercourse Time末次性交时间:<a style='color:red'><?php echo isset($recent_intercourse)?$recent_intercourse:"";?></a></p>
					<p>S/P Fall/MVA point of Impact摔倒、车祸涉及部位：<a style='color:red'><?php echo isset($s_p)?$s_p:"";?></a></p>
				</td>
		
		
		<!--  -->
		</td>
			<td>BP  
			<a style='color:red'><?php echo isset($physical_examination_bp)?$physical_examination_bp:"";?></a>mmHg<br>HR  
			<a style='color:red'><?php echo isset($physical_examination_hr)?$physical_examination_hr:"";?></a>B/m <br>RR  
			<a style='color:red'><?php echo isset($physical_examination_rr)?$physical_examination_rr:"";?></a>T/m <br> SaO2 
			<a style='color:red'><?php echo isset($physical_examination_sao2)?$physical_examination_sao2:"";?></a> % <br> T  
			<a style='color:red'><?php echo isset($physical_examination_t)?$physical_examination_t:"";?></a>oC <br> Ht身高
			<a style='color:red'><?php echo isset($physical_examination_ht)?$physical_examination_ht:"";?></a> <br>Wt体重
			<a style='color:red'><?php echo isset($physical_examination_wt)?$physical_examination_wt:"";?></a></td>
		</tr>
			<tr>
				<td colspan="4">OBTESTRICAL DX(产科诊断)：
				<a style='color:red'><?php echo isset($Obtestrical_dx)?$Obtestrical_dx:"";?></a><br>
						 ASA Physical Status麻醉科指征：
						 <?php if($asa_physical_statues == 1){?><a style='color:red'>√</a><?php }?>I 
						 <?php if($asa_physical_statues == 2){?><a style='color:red'>√</a><?php }?>II 
						 <?php if($asa_physical_statues == 3){?><a style='color:red'>√</a><?php }?>III 
						 <?php if($asa_physical_statues == 4){?><a style='color:red'>√</a><?php }?>E<br>
						 FASTING STATUS禁食：Last Solid固体@
						 <a style='color:red'><?php echo isset($fasting_status_last_solid)?$fasting_status_last_solid:"";?></a><br>
						 Last Liquid液体@
						<a style='color:red'><?php echo isset($fasting_status_last_liquid)?$fasting_status_last_liquid:"";?></a>
				</td>
			</tr>		
	</table>	
		
			<table style="border-collapse:collapse" onclick='surgery_plan_all();'>
				       <tr>
					       <td>ANESTHETIC PLAN麻醉计划
					       <br>
						   CSE腰硬联合，Epidural硬膜外，Spinal腰麻，GAET全麻插管，Others其他；
						   <a style='color:red'><?php echo isset($anesthetic_plan)?$anesthetic_plan:"";?></a></td>
						   <td>OBSTETRICAL PLAN产科计划<br>
						   Vaginal(阴道)   C-section（破宫产）   Others其他：
						   <a style='color:red'><?php echo isset($obstetrical_plan)?$obstetrical_plan:"";?></a></td>
						   <td>Obstetrian产科医生：<a style='color:red'><?php echo isset($obsterian)?$obsterian:"";?></a><br>
						   Anesthesiologist麻醉医生：<a style='color:red'><?php echo isset($anesthesiologist)?$anesthesiologist:"";?></a></td>
						   <td>Date日期：<a style='color:red'><?php echo isset($sign_date)?$sign_date:"";?></a><br>
						   Time时间：<a style='color:red'><?php echo isset($sign_time)?$sign_time:"";?></a></td>
						</tr>
		     </table>
		
	</div>
</div>

	</div>
	<div id="separator"></div>
</div>

</body>
</html>
