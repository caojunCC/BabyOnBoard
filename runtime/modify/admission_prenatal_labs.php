<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
<form id="admission_detail_edit_act_1" action="<?php echo IUrl::creatUrl("/modify/admission_prenatal_labs_act");?>"  method="post">
	<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
	<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
			<table style="border-collapse:collapse">
			<tr>
				<td rowspan="5">
					<p>PRENAL LABS:产前实验室</p>
					<p>
					<input type="radio" name="status" <?php if($status==1){?>checked=true<?php }?> value="1">Done有
					<input type="radio" name="status" <?php if($status==2){?>checked=true<?php }?> value="2">Not Done无
					</p>
					<p>
					<input type="radio" name="status" <?php if($status==3){?>checked=true<?php }?> value="3">Available能做
					<input type="radio" name="status" <?php if($status==4){?>checked=true<?php }?> value="4">Not Available不能做</p>
					<p>Blood Type血型 <input type="text" class='small' name="blood_type" value="<?php echo isset($blood_type)?$blood_type:"";?>"></p>
					<p>Antibody 抗体 <input type="text" class='small' name="antibody" value="<?php echo isset($antibody)?$antibody:"";?>"></p>
					<p>Rubella风疹  <input type="text" class='small' name="rubella" value="<?php echo isset($rubella)?$rubella:"";?>"></p>
					<p>HBsAg乙肝表面抗原  <input type="text" class='small' name="hbsag" value="<?php echo isset($hbsag)?$hbsag:"";?>"></p>
					<p>VDRL梅毒  <input type="text" class='small' name="vdrl" value="<?php echo isset($vdrl)?$vdrl:"";?>">
					Date日期<input type="text" class='small' name="vdrl_date" value="<?php echo isset($vdrl_date)?$vdrl_date:"";?>"   onclick="MyCalendar.SetDate(this)" >
					</p>
					<p>GBBS(ASO) <input type="text" class='small' name="gbbs" value="<?php echo isset($gbbs)?$gbbs:"";?>"></p>
					<p>HIV艾滋病毒 <input type="text" class='small' name="hiv" value="<?php echo isset($hiv)?$hiv:"";?>"></p>
					<p>PPD结核菌素试验 <input type="text" class='small' name="ppd" value="<?php echo isset($ppd)?$ppd:"";?>"></p>
					<p>CXR胸片  <input type="text" class='small' name="cxr" value="<?php echo isset($cxr)?$cxr:"";?>"></p>
				</td>
				<td>
					<p>CURRENT MEDICATIONS 目前服用药物：
					 <input type="text" class='small' name="current_medication" value="<?php echo isset($current_medication)?$current_medication:"";?>"></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>CURRENT RISK FACTORS/OB COMPLICATIONS 目前危险因素、产科并发症：
					 <input type="text" class='small' name="current_risk" value="<?php echo isset($current_risk)?$current_risk:"";?>"></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PRIOR PREGNANCY RISK FACTORS怀孕前危险因素：
					 <input type="text" class='small' name="pre_risk" value="<?php echo isset($pre_risk)?$pre_risk:"";?>"></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>MEDICAL/SURGICAL Hx 内/外科病史：
					 <input type="text" class='small' name="medical_surgical_hx" value="<?php echo isset($medical_surgical_hx)?$medical_surgical_hx:"";?>"></p>	
				</td>
			</tr>
			<tr>
				<td>
					<p>ALLERGIES 过敏/副反应史: <input type="text" class='small' name="allergies" value="<?php echo isset($allergies)?$allergies:"";?>"></p>
					<p>Reaction表现： <input type="text" class='small' name="reaction" value="<?php echo isset($reaction)?$reaction:"";?>"></p>
					<p>
					<input type="checkbox" name='nkda' <?php if($nkda==1){?>checked<?php }?> value='1'>NKDA无药物过敏
					<input type="checkbox" name='allergy' <?php if($allergy==1){?>checked<?php }?> value='1' >Allergy Bracelet Applied带上药物过敏警示手镯</p>	
				</td>
			</tr>
		
		</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>