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
<div class="headbar">
	<div class="position"><span>Obstetrical</span><span>></span><span>Basic Info</span><span>></span><span>list</span></div>
</div>
<script language="JavaScript" type="text/javascript">
//surgery_illness_edit
function surgery_illness_edit()
{
	art.dialog.load('<?php echo IUrl::creatUrl("/modify/surgery_illness_edit/id/$id");?>', {
		id:'add_spec',
		lock: true,
	    title: 'Edit Data'

	}, true);
}
</script>



<div class="content1">
	<table>
		<tr>
			<td>Name:<?php echo isset($name)?$name:"";?>&nbsp;&nbsp;&nbsp;</td>
			<td>Hospital:<?php echo isset($hospital)?$hospital:"";?>&nbsp;&nbsp;&nbsp;</td>
			<td>Date:<?php echo isset($date)?$date:"";?>&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>
<div class="xf-main">
<table style="border-collapse:collapse" onclick="surgery_illness_edit();">
		<tr><td colspan="2"><p>Hx of Present Pregnancy and Illness</p><br>
							<p>G孕_______P产______Gestational Week(days)孕期________</p>
							<p>HTN高血压；Edemas水肿：+，++，+++：Headache头痛：Blur Vision视物模糊；</p>
							<p>Hyperglycemia高血糖：Abdominal Pain腹痛：Vaginal Bleeding阴道出血</p>
			</td>
			<td rowspan="3" ><p>Current Nedications现用药物</p></td></tr>
		</tr>
		<tr><td>Previous Anesthesia&Surgeries麻醉/手术史</td>
			<td rowspan="2">Allergies/Intolerances药物过敏/副反应史</td>
		</tr>
		<tr><td>Family Hx of Anesthesia/Medical/Surgical Cx麻醉/内科/外科并发症</td>
		
</table>
<table style="border-collapse:collapse">
	<tr>
		<td>SYSTEN REVIEW系统回顾/Normal正常or COMMENTS详细描述（Space on the back）</td><td>LABOIATORY实验室检查</td>
	</tr>
	<tr>
		<td>Normal正常CARDIOVASCULAR心血管：HTN高血压，CAD/MI冠心，Valvular Dz瓣膜病，CHF心衰，Arrhythmia心律失常，PVD周围心管病，CVA/ITA中</td>	
		<td>EKG心电图，Echo（心超）CXR胸片，ABG血气分析</td>	
	</tr>
	<tr>
		<td>Normal正常RESPIRATORY呼吸道：Asthma哮喘，COPD慢阻肺，Snoring/OSA睡眠呼暂停，Recent URI/Pneumonia新近上呼吸道感染/肺炎</td>	
		<td rowspan="2" >Liver Function Test肝功能</td>
	</tr>
	<tr><td>Normal正常GI/HEPATIC消化道：Liver Dz肝病/Heptitis肝炎，Hiatal Hernia食道裂孔疝，GERD胃食管反流</td></tr>
	<tr>
		<td>Normal正常RENAL/ENDOCRINE肾脏/内分泌：DM糖尿病，Steroid糖皮质醇，Thyroid Dz甲状腺病，Renal Failure肾衰</td>
		<td rowspan="2">CHEMISTRIES生化</td>
	</tr>
	<tr><td>Normal正常NEURO/MUSCULOSKELETAL神经/肌肉骨骼：Seizures癫痫，Paralysis瘫痪，Arthritis关节炎：Neck颈，Scoliosis（脊椎畸形），LBP(腰痛)</td></tr>
	<tr><td>Normal正常HEMOTOLOGY血液病：Bleeding Dz出血病，Anemia贫血，Transfusion输血</td><td>LMP末次月经</td></tr>
</table>
<table style="border-collapse:collapse">
	<tr>
		<td>Smoking Hx吸烟史</td>
		<td>Alcohol Use饮酒史</td>
		<td>Substance Use吸毒史</td>
		<td>Social Situation社会情况：</td>
	</tr>
	<tr><td rowspan="4">
		<p>AIRWAY气道</p>
		 <p>TMT Opening 下颌开启______</p>
		 <p>Neck Movement颈活动度</p>
		 <p><input type="checkbox" value="">Full ROM<input type="checkbox" value="">_________</P>
		 <P>H-M Distance舌颌距离_______</p>
		 <p>Mallampati Class________</p>
		 <p>Dental牙齿：<br>
		 Chipped缺损，Missing缺失，<br>Loose松动，Capped假牙，<br>Bonded矫正牙，Bridge桥，<br>Carious蛀牙</p>
		 <p>AirwayPath病理气道：</p>
	</td>
	</tr>
	<td colspan="3" >PHYSICAL EXAMINATION体检（Space on the back）</td>
	<tr><td colspan="2">HEART 心脏</td><td>LUNGS 肺</td></tr>
	<tr><td  colspan="2">OBSTETRICAL EXAN(产科检查)：</td>
		<td>BP  mmHg<br>HR  B/m <br>RR  T/m <br> SaO2  % <br> T  oC <br> Ht身高 <br>Wt体重</td>
	</tr>
		<tr>
			<td colspan="4">OBTESTRICAL DX(产科诊断)：           <br>
					 ASA Physical Status麻醉科指征：I II III E<br>
					 FASTING STATUS禁食：Last Solid固体@____________  <br>
					 Last Liquid液体@__________
			</td>
		</tr>		
</table>	
	
		<table style="border-collapse:collapse">
			       <tr>
				       <td>ANESTHETIC PLAN麻醉计划<br>
					   CSE腰硬联合，Epidural硬膜外，Spinal腰麻，GAET全麻插管，Others其他；</td>
					   <td>OBSTETRICAL PLAN产科计划<br>
					   Vaginal(阴道)   C-section（破宫产）   Others其他：</td>
					   <td>Obstetrian产科医生：<br>
					   Anesthesiologist麻醉医生：</td>
					   <td>Date日期：<br>
					   Time时间：</td>
					</tr>
	     </table>
	
</div>
</div>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
