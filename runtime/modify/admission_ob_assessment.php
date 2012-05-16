<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
<form id="admission_detail_edit_act_1" action="<?php echo IUrl::creatUrl("/modify/admission_ob_assessment_act");?>"  method="post">
	<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
	<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
	<table style="border-collapse:collapse">
			<tr>
				<td rowspan="4">
					<p style='font-size:14px;'>OB ASSESSMENT:(Subiective)产前评估（主观指标）</p>
					<p>Uterus:&nbsp;
					<input type="radio" name ='uterus' <?php if($uterus==1){?>checked=true<?php }?> value="1">Soft软
					&nbsp;<input type="radio" name ='uterus' <?php if($uterus==2){?>checked=true<?php }?> value="2">NonTender不硬
					&nbsp;<input type="radio" name ='uterus' <?php if($uterus==3){?>checked=true<?php }?> value="3">Tender硬
					&nbsp;<input type="radio" name ='uterus' <?php if($uterus==4){?>checked=true<?php }?> value="4">Ridge极硬
					</p>
					
					<p>(子宫)contraction宫缩 q<input type="text" class='small' name="contraction" value="<?php echo isset($contraction)?$contraction:"";?>">Date/Time时间  <input type="text" class='small' name="contruction_date" value="<?php echo isset($contruction_date)?$contruction_date:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>FetalNovement:
					<input type="radio" name ='fetal_movement' <?php if($fetal_movement==1){?>checked=true<?php }?> value="1">Present有
					<input type="radio" name ='fetal_movement' <?php if($fetal_movement==2){?>checked=true<?php }?> value="2">Absent无
					<input type="radio" name ='fetal_movement' <?php if($fetal_movement==3){?>checked=true<?php }?> value="3">Decreased减少
					</p>
					
					<p>(胎动)Last move:Date/Time末次时间<input type="text" class='small' name="fetal_date" value="<?php echo isset($fetal_date)?$fetal_date:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					
					<p>Membranes:
					<select id = 'unit' name='unit'>
						<option value='0' >Please Choose</option>
						<?php $query = new IQuery("ammiot_type");$query->order = "`order`";$items = $query->find(); foreach($items as $key => $item){?>
							<option value= "<?php echo isset($item['id'])?$item['id']:"";?>" <?php if($item['id']==$membranes){?>selected<?php }?>><?php echo isset($item['name_en'])?$item['name_en']:"";?></option>
						<?php }?>
					</select>
					</p>
					
					<p>(羊膜)Rupture Date/Time破膜时间：<input type="text" class='small' name="membranes_date" value="<?php echo isset($membranes_date)?$membranes_date:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>R/O PTL排除早产：</p>
					<p>Recent Intercourse Time末次性交时间<input type="text" class='small' name="recent_intercourse" value="<?php echo isset($recent_intercourse)?$recent_intercourse:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>S/P Fall/MVA point of Impact摔倒、车祸涉及部位<input type="text" class='small' name="s_p" value="<?php echo isset($s_p)?$s_p:"";?>"></p>
				</td>
				<td>
					<p>ULTRASOUND超声：</p>
					<p>
					<input type="radio" name="initial" <?php if($initial==1){?>checked=true<?php }?> value="1">Done有
					<input type="radio" name="initial" <?php if($initial==2){?>checked=true<?php }?> value="2">Not Done无
					<input type="radio" name="initial" <?php if($initial==3){?>checked=true<?php }?> value="3">Available能做
					<input type="radio" name="initial" <?php if($initial==4){?>checked=true<?php }?> value="4">Not Available不能做
					</p>
					<p>Initial Date首次日期：<input type="text" class='small' name="initial_date" value="<?php echo isset($initial_date)?$initial_date:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>EDC by US预产期<input type="text" class='small' name="edc_by_us" value="<?php echo isset($edc_by_us)?$edc_by_us:"";?>"  onclick="MyCalendar.SetDate(this)" >EGA by US胎龄(周)<input type="text" class='small' name="ega_by_us" value="<?php echo isset($ega_by_us)?$ega_by_us:"";?>"></p>
					<p>FINAL EDC最后确定的预产期<input type="text" class='small' name="final_edc" value="<?php echo isset($final_edc)?$final_edc:"";?>"  onclick="MyCalendar.SetDate(this)" ></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>PREVIOUS BLOOD TRANSFUSION输血史</p>
					<p>
					<input type="radio" name ='blood_transfusion_solid' <?php if($blood_transfusion_solid==1){?>checked=true<?php }?> value="1">No 无
					<input type="radio" name ='blood_transfusion_solid' <?php if($blood_transfusion_solid==2){?>checked=true<?php }?> value="2">Yes 有
					<input type="radio" name ='blood_transfusion_solid' <?php if($blood_transfusion_solid==3){?>checked=true<?php }?> value="3">Reaction
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Previous C/S剖宫产史：
					<input type="radio" name ='pre_c_s' <?php if($pre_c_s==1){?>checked=true<?php }?> value="1">Yes 有
					<input type="radio" name ='pre_c_s' <?php if($pre_c_s==2){?>checked=true<?php }?> value="2">No 无
					</p>
					<p>Attempted VTOL剖宫产后阴道分娩：
					<input type="radio" name ='attempted' <?php if($attempted==1){?>checked=true<?php }?> value="1">Yes 有
					<input type="radio" name ='attempted' <?php if($attempted==1){?>checked=true<?php }?> value="1">No 无</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>LAST INTAKE 末次饮食</p>
					<p>Solid固体：Date/Time:日期时间<input type="text" class='small' name="last_intake_solid" value="<?php echo isset($last_intake_solid)?$last_intake_solid:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
					<p>Fluid液体：Date/Time:日期时间<input type="text" class='small' name="lasr_intake_fluid" value="<?php echo isset($lasr_intake_fluid)?$lasr_intake_fluid:"";?>"   onclick="MyCalendar.SetDate(this)" ></p>
				</td>
			</tr>
	
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>