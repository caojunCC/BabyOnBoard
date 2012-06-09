<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
<form id="admission_detail_edit_act_1" action="<?php echo IUrl::creatUrl("/modify/admission_procedures_act");?>"  method="post">
	<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
	<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
	<table style="border-collapse:collapse">
			<tr>
				<td rowspan="2">
					<p>PROCEDURES:(Objective)操作(客观指标)</p>
					<p>IV Start静脉：Location部位 <input type="text" class='small' name="iv_start_location" value="<?php echo isset($iv_start_location)?$iv_start_location:"";?>">
					Size针号<input type="text" class='small' name="iv_start_size" value="<?php echo isset($iv_start_size)?$iv_start_size:"";?>"></p>
					<p>Fluid 液体type/Rate种类/滴速<input type="text" class='small' name="fluid_type_rate" value="<?php echo isset($fluid_type_rate)?$fluid_type_rate:"";?>">
					Glucose血糖<input type="text" class='small' name="fluid_glucose" value="<?php echo isset($fluid_glucose)?$fluid_glucose:"";?>"></p>
					<p>SSE:Examiner检查人<input type="text" class='small' name="sse_examiner" value="<?php echo isset($sse_examiner)?$sse_examiner:"";?>">
					Date/Time时间<input type="text" class='small' name="sse_date_time" value="<?php echo isset($sse_date_time)?$sse_date_time:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>
					<input type="checkbox" name='sse_intact' <?php if($sse_intact==1){?>checked<?php }?> value='1'>Intact完整
					ROM Color破膜羊水颜色 <input type="text" class='small' name="sse_rom_color" value="<?php echo isset($sse_rom_color)?$sse_rom_color:"";?>"></p>
					
					<p>Ferning羊齿状结晶：
					 <input type="radio" name="sse_ferning" <?php if($sse_ferning==1){?>checked=true<?php }?> value="1">Absent阴性
					 <input type="radio" name="sse_ferning" <?php if($sse_ferning==2){?>checked=true<?php }?> value="2">Present阳性
					</p>
					
					<p>Nitrazine石蕊试纸：
					 <input type="radio" name="sse_nitrazine" <?php if($sse_nitrazine==1){?>checked=true<?php }?> value="1">Absent阴性
					 <input type="radio" name="sse_nitrazine" <?php if($sse_nitrazine==2){?>checked=true<?php }?> value="2">Present阳性(碱性)
					</p>
					
					<p>Pooling羊水池：
					 <input type="radio" name="sse_pooling" <?php if($sse_pooling==1){?>checked=true<?php }?> value="1">Absent阴性
					 <input type="radio" name="sse_pooling" <?php if($sse_pooling==2){?>checked=true<?php }?> value="2">Present阳性
					</p>
					<p>
					 <input type="checkbox" name='sse_is_labs_sent' <?php if($sse_is_labs_sent==1){?>checked<?php }?> value='1'>Labs Sent送血检 <input type="text" class='small' name="sse_labs_sent" value="<?php echo isset($sse_labs_sent)?$sse_labs_sent:"";?>">
					  <input type="checkbox" name='sse_is_urine_sent' <?php if($sse_is_urine_sent==1){?>checked<?php }?> value='1'>Urine sent送尿检 <input type="text" class='small' name="sse_urine_sent" value="<?php echo isset($sse_urine_sent)?$sse_urine_sent:"";?>">
					</p>
					<p>
					 <input type="checkbox" name='sse_is_cultures_sent' <?php if($sse_is_cultures_sent==1){?>checked<?php }?> value='1'>Cultures sent送培养 <input type="text" class='small' name="sse_cultures_sent" value="<?php echo isset($sse_cultures_sent)?$sse_cultures_sent:"";?>">
					 <input type="checkbox" name='sse_is_other' <?php if($sse_is_other==1){?>checked<?php }?> value='1'>Other其他 <input type="text" class='small' name="sse_other" value="<?php echo isset($sse_other)?$sse_other:"";?>">
					</p>
					<p>URINALYSIS尿常规：</p>
					<p>
					S-Gravity比重 <input type="text" class='small' name="urinalysis_sgravity" value="<?php echo isset($urinalysis_sgravity)?$urinalysis_sgravity:"";?>">
					Color颜色 <input type="text" class='small' name="urinalysis_color" value="<?php echo isset($urinalysis_color)?$urinalysis_color:"";?>">
					</p>
					<p>Apprnce外观 <input type="text" class='small' name="urinalysis_apprnce" value="<?php echo isset($urinalysis_apprnce)?$urinalysis_apprnce:"";?>">
					Leuko白细胞 <input type="text" class='small' name="urinalysis_leuo" value="<?php echo isset($urinalysis_leuo)?$urinalysis_leuo:"";?>">
					</p>
					<p>
					Heme尿红素 <input type="text" class='small' name="urinalysis_heme" value="<?php echo isset($urinalysis_heme)?$urinalysis_heme:"";?>">
					Glucose糖 <input type="text" class='small' name="urinalysis_glucose" value="<?php echo isset($urinalysis_glucose)?$urinalysis_glucose:"";?>">
					</p>
					<p>
					Ketones酮 <input type="text" class='small' name="urinalysis_ketones" value="<?php echo isset($urinalysis_ketones)?$urinalysis_ketones:"";?>">
					Proein蛋白 <input type="text" class='small' name="urinalysis_protein" value="<?php echo isset($urinalysis_protein)?$urinalysis_protein:"";?>">
					</p>		
				</td>
				<td>
					<p>RESEARCH SUDIES参加研究：</p>
					<p>
					 <input type="radio" name="is_research_sudies" <?php if($is_research_sudies==1){?>checked=true<?php }?> value="1">No 无
					 <input type="radio" name="is_research_sudies" <?php if($is_research_sudies==2){?>checked=true<?php }?> value="2">Yes 有 <input type="text" class='small' name="research_sudies" value="<?php echo isset($research_sudies)?$research_sudies:"";?>"></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>AMBULATION活动</p>
					<p>EFM off无胎心监护 <input type="text" class='small' name="ambulation_em_off" value="<?php echo isset($ambulation_em_off)?$ambulation_em_off:"";?>">
					Walking for 行走 <input type="text" class='small' name="ambulation_walking_for" value="<?php echo isset($ambulation_walking_for)?$ambulation_walking_for:"";?>">Hrs小时
					</p>
					<p>
					DISPOSITION 
					出产房 Date/Time时间<input type="text" class='small' name="disposition_date" value="<?php echo isset($disposition_date)?$disposition_date:"";?>"   onclick="MyCalendar.SetDate(this)" >
					</p>
					<p>
					<input type="checkbox" value="">
					Admitted to 住院病区 <input type="text" class='small' name="disposition_admitted" value="<?php echo isset($disposition_admitted)?$disposition_admitted:"";?>"></p>
					<p>via通过：
					 <input type="radio" name="disposition_via" <?php if($disposition_via==1){?>checked=true<?php }?> value="1">Ambulatory行走
					 <input type="radio" name="disposition_via" <?php if($disposition_via==2){?>checked=true<?php }?> value="2">Wheelchair轮椅
					 <input type="radio" name="disposition_via" <?php if($disposition_via==3){?>checked=true<?php }?> value="3">Cart推车</p>
					<p>Report given to交班给： <input type="text" class='small' name="disposition_report_given" value="<?php echo isset($disposition_report_given)?$disposition_report_given:"";?>"></p>
					<p><input type="checkbox" name='ida' <?php if($ida==1){?>checked<?php }?> value='1'>ID Band Applied病人手镯
					<input type="checkbox" name='clinical_nutrition_consult' <?php if($clinical_nutrition_consult==1){?>checked<?php }?> value='1'>Clinical Nutrition Consult营养师会诊</p>
					<p><input type="checkbox" name='home_with_instruction' <?php if($home_with_instruction==1){?>checked<?php }?> value='1'>Home W/Instruction带出院指导回家</p>
					<p><input type="checkbox" name='verbalizes_understand' <?php if($verbalizes_understand==1){?>checked<?php }?> value='1'>Verbalize Understanding能理解口头交代</p>
					<p><input type="checkbox" name='discharge_ama' <?php if($discharge_ama==1){?>checked<?php }?> value='1'>Discharge AMA自动离院</p>
					<p><input type="checkbox" name='social_work_center_consult' <?php if($social_work_center_consult==1){?>checked<?php }?> value='1'>Social Work/Wellness Center Consult社区服务中心</p>
				</td>
			</tr>
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>
</div>
