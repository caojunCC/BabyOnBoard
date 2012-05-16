<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/iwebshop/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/iwebshop/runtime/systemjs/autovalidate/validate.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/logo.gif";?>" width="303" height="43" /></a>
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

</script>
<div class="headbar">
	<div class="position"><span>Obstetrical</span><span>></span><span>Basic Info</span><span>></span><span>list</span></div>
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
						<td>TIME时间:&nbsp;<?php echo isset($time)?$time:"";?></td>
						<td>ARRIVED FROM来自：<br>
							<?php if($form_where == 1){?>√<?php }else{?>□<?php }?>ED急诊&nbsp;
							<?php if($form_where == 2){?>√<?php }else{?>□<?php }?>Home家&nbsp;
							<input type="checkbox" id="" value="Clinic门诊">Clinic门诊
							<input type="checkbox" id="" value="Floor病房">Floor病房
							<input type="checkbox" id="" value="Transfer from外院">Transfer from外院
							<input type="text" id="" value="">
						</td>
						<td>ACOMPANIED BY陪同：</td>
					</tr>
					<tr><td>UNIT部门</td>
						<td>ADDMITTING NURSE接待护士</td>
						<td>VIA通过：
							<input type="checkbox" value="Wheelchair轮椅">Wheelchair轮椅
							<input type="checkbox" value="">Cart推车
							<input type="checkbox" value="">Ambulatory步行
							<input type="checkbox" value="">Ambulance救护车
							<input type="checkbox" value="">Other其他
						</td>
					</tr>
		</table>
		<table style="border-collapse:collapse"  onclick='admission_complaint();'>
			<tr>
				<td rowspan="2">
						<p>ADNISSION COMPLAINT入院主诉：</p><br>
							<p><input type="checkbox" value="">R/O Labor排除临产</p>
							<p><input type="checkbox" value="">R/O PTL排除早产</p>
							<p><input type="checkbox" value="">R/O SROM排除破水</p>
							<p><input type="checkbox" value="">R/O PIH排除妊高症</p>
							<p><input type="checkbox" value="">Decrease Fetal Movement 胎动减少</p>
							<p><input type="checkbox" value="">Headache头痛</p>
							<p><input type="checkbox" value="">Nausea/Vomiting恶心/呕吐</p>
							<p><input type="checkbox" value="">Status Post Fall/MVA摔倒/车祸</p>
							<p><input type="checkbox" value="">Scheduled Procedure预约操作</p>
							<p><input type="checkbox" value="">Other其他</p>
				</td>
				<td>AGE年龄</td>
				<td>GRACIDA次孕</td>
				<td>TERM足月</td>
				<td>PRETERM早产</td>
				<td>Antibdy抗体</td>
				<td>LIVING存活</td>
			</tr>
			<tr>
				<td>LMO末次月经</td>
				<td>EDC预产期</td>
				<td>EGA胎龄</td>
				<td>HT身高</td>
				<td>WT体重</td>
				<td>Wt Gain增重</td>
			</tr>
		</table>
		<table style="border-collapse:collapse"  onclick='admission_ob_assessment();'>
			<tr>
				<td rowspan="4">
					<p>OB ASSESSMENT:(Subiective)产前评估（主观指标）</p>
					<p>Uterus:<input type="checkbox" value="">Soft软<input type="checkbox" value="">NonTender不硬<input type="checkbox" value="">Tender硬<input type="checkbox" value="">Ridge极硬</p>
					<p>(子宫)contraction宫缩q_______Date/Time时间_____</p>
					<p>FetalNovement:<input type="checkbox" value="">Present有<input type="checkbox" value="">Absent无<input type="checkbox" value="">Decreased减少</p>
					<p>(胎动)Last move:Date/Time末次时间____</p>
					<p>Membranes:<input type="checkbox" value="">DeniesRupture没破<input type="checkbox" value="">Rupture破<input type="checkbox" value="">Unsure不清</p>
					<p>(羊膜)Rupture Date/Time破膜时间：____Color颜色____</p>
					<p>R/O PTL排除早产：</p>
					<p>Recent Intercourse Time末次性交时间________</p>
					<p>S/P Fall/MVA point of Impact摔倒、车祸涉及部位______</p>
				</td>
				<td>
					<p>ULTRASOUND超声：</p>
					<p><input type="checkbox" value="">Done有<input type="checkbox" value="">Not Done无<input type="checkbox" value="">Available能做<input type="checkbox" value="">Not Available不能做</p>
					<p>Initial Date首次日期：________________</p>
					<p>EDC by US预产期___________EGA by US胎龄(周)</p>
					<p>FINAL EDC最后确定的预产期_____________</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PREVIOUS BLOOD TRANSFUSION输血史</p>
					<p><input type="checkbox" value="">No 无<input type="checkbox" value="">Yes 有<input type="checkbox" value="">Reaction反应_________</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Previous C/S剖宫产史：<input type="checkbox" value="">Yes 有<input type="checkbox" value="">No 无</p>
					<p>Attempted VTOL剖宫产后阴道分娩：<input type="checkbox" value="">Yes 有<input type="checkbox" value="">No 无</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>LAST INTAKE 末次饮食</p>
					<p>Solid固体：Date/Time:日期时间__________</p>
					<p>Fluid液体：Date/Time:日期时间__________</p>
				</td>
			</tr>
	
		</table>
		<table style="border-collapse:collapse"  onclick='admission_prenatal_labs();' >
			<tr>
				<td rowspan="5">
					<p>PRENAL LABS:产前实验室</p>
					<p><input type="checkbox" value="">Done有<input type="checkbox" value="">Not Done无</p>
					<p><input type="checkbox" value="">Available能做<input type="checkbox" value="">Not Available不能做</p>
					<p>Blood Type血型  __________________</p>
					<p>Antibody 抗体 _________________</p>
					<p>Rubella风疹 __________________</p>
					<p>HBsAg乙肝表面抗原 ___________________</p>
					<p>VDRL梅毒  ________Date日期____________</p>
					<p>GBBS(ASO) _______________</p>
					<p>HIV艾滋病毒 _____________</p>
					<p>PPD结核菌素试验 _____________</p>
					<p>CXR胸片  ____________________</p>
				</td>
				<td>
					<p>CURRENT MEDICATIONS 目前服用药物：</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>CURRENT RISK FACTORS/OB COMPLICATIONS 目前危险因素、产科并发症：</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PRIOR PREGNANCY RISK FACTORS怀孕前危险因素：</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>MEDICAL/SURGICAL Hx 内/外科病史：</p>	
				</td>
			</tr>
			<tr>
				<td>
					<p>ALLERGIES 过敏/副反应史:_________________</p>
					<p>Reaction表现：________________</p>
					<p><input type="checkbox" value="">NKDA无药物过敏<input type="checkbox" value="">Allergy Bracelet Applied带上药物过敏警示手镯</p>	
				</td>
			</tr>
		
		</table>
		<table style="border-collapse:collapse">
			<tr>
				<td rowspan="2">
					<p>PROCEDURES:(Objective)操作(客观指标)</p>
					<p>IV Start静脉：Location部位________Size针号________</p>
					<p>Fluid 液体type/Rate种类/滴速______Glucose血糖_______</p>
					<p>SSE:Examiner检查人________Date/Time时间_______</p>
					<p><input type="checkbox" value="">Intact完整<input type="checkbox" value="">ROM Color破膜羊水颜色________</p>
					<p>Ferning羊齿状结晶：<input type="checkbox" value="">Absent阴性<input type="checkbox" value="">Present阳性</p>
					<p>Nitrazine石蕊试纸：<input type="checkbox" value="">Absent阴性<input type="checkbox" value="">Present阳性(碱性)</p>
					<p>Pooling羊水池：<input type="checkbox" value="">Absent阴性<input type="checkbox" value="">Present阳性</p>
					<p><input type="checkbox" value="">Labs Sent送血检________<input type="checkbox" value="">Urine sent送尿检______</p>
					<p><input type="checkbox" value="">Cultures sent送培养_______<input type="checkbox" value="">Other其他_______</p>
					<p>URINALYSIS尿常规：S-Gravity比重_______Color颜色_______</p>
					<p>Apprnce外观______Leuko白细胞_____Heme尿红素_____</p>
					<p>Glucose糖______Ketones酮______Proein蛋白_______</p>		
				</td>
				<td>
					<p>RESEARCH SUDIES参加研究：</p>
					<p><input type="checkbox" value="">No 无<input type="checkbox" value="">Yes 有_________</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>AMBULATION活动</p>
					<p>EFM off无胎心监护______Walking for 行走_______Hrs小时</p>
					<p>DISPOSITION 出产房 Date/Time时间_______</p>
					<p><input type="checkbox" value="">Admitted to 住院病区________</p>
					<p>via通过：<input type="checkbox" value="">Ambulatory行走<input type="checkbox" value="">Wheelchair轮椅<input type="checkbox" value="">Cart推车</p>
					<p>Report given to交班给：_________</p>
					<p><input type="checkbox" value="">ID Band Applied病人手镯<input type="checkbox" value="">Clinical Nutrition Consult营养师会诊</p>
					<p><input type="checkbox" value="">Home W/Instruction带出院指导回家</p>
					<p><input type="checkbox" value="">Verbalize Understanding能理解口头交代</p>
					<p><input type="checkbox" value="">Discharge AMA自动离院</p>
					<p><input type="checkbox" value="">Social Work/Wellness Center Consult社区服务中心</p>
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
