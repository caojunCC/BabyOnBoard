<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
	<form id="surgery_illness_edit_1" action="<?php echo IUrl::creatUrl("/modify/surgery_hx_all_act");?>"  method="post">
		<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
		<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
		<table style="border-collapse:collapse">
		<tr>
			<td>Smoking Hx吸烟史
			<input type="text" class='small' name="hx_smocking" value="<?php echo isset($hx_smocking)?$hx_smocking:"";?>"></td>
			
			<td>Alcohol Use饮酒史
			<input type="text" class='small' name="hx_alcohol_use" value="<?php echo isset($hx_alcohol_use)?$hx_alcohol_use:"";?>"></td>
			
			<td>Substance Use吸毒史
			<input type="text" class='small' name="hx_substance_use" value="<?php echo isset($hx_substance_use)?$hx_substance_use:"";?>"></td>
			
			<td>Social Situation社会情况：
			<input type="text" class='small' name="hx_social_situation" value="<?php echo isset($hx_social_situation)?$hx_social_situation:"";?>"></td>
		</tr>
		<tr><td rowspan="4">
			<p>AIRWAY气道</p>
			 <p>TMT Opening 下颌开启
				<input type="text" class='small' name="airway_tnj" value="<?php echo isset($airway_tnj)?$airway_tnj:"";?>"></p>
			 <p>Neck Movement颈活动度</p>
			 <p>Full ROM:
			 <input type="text" class='small' name="airway_neck_full_rom" value="<?php echo isset($airway_neck_full_rom)?$airway_neck_full_rom:"";?>"></P>
			 <P>H-M Distance舌颌距离
			 <input type="text" class='small' name="airway_hm_distance" value="<?php echo isset($airway_hm_distance)?$airway_hm_distance:"";?>"></p>
			 <p>Mallampati Class
			 <input type="text" class='small' name="airway_dental" value="<?php echo isset($airway_dental)?$airway_dental:"";?>"></p>
			 <p>Dental牙齿：<br>
			 Chipped缺损，Missing缺失，<br>Loose松动，Capped假牙，<br>Bonded矫正牙，Bridge桥，<br>Carious蛀牙</p>
			 <p>AirwayPath病理气道：
			 <input type="text" class='normal' name="airway_path" value="<?php echo isset($airway_path)?$airway_path:"";?>">
			 </p>
		</td>
		</tr>
		<td colspan="3" >PHYSICAL EXAMINATION体检（Space on the back）</td>
		<tr><td colspan="2">HEART 心脏
		<input type="text" class='small' name="physical_examination_heart" value="<?php echo isset($physical_examination_heart)?$physical_examination_heart:"";?>">
		</td><td>LUNGS 肺
		<input type="text" class='small' name="physical_examination_lungs" value="<?php echo isset($physical_examination_lungs)?$physical_examination_lungs:"";?>"></td></tr>
		<tr><td  colspan="2">OBSTETRICAL EXAN(产科检查)：
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
		</td>
			<td>BP  mmHg
			<input type="text" class='small' name="physical_examination_bp" value="<?php echo isset($physical_examination_bp)?$physical_examination_bp:"";?>"><br>
			HR  B/m 
			<input type="text" class='small' name="physical_examination_hr" value="<?php echo isset($physical_examination_hr)?$physical_examination_hr:"";?>">
			<br>RR  T/m
			<input type="text" class='small' name="physical_examination_rr" value="<?php echo isset($physical_examination_rr)?$physical_examination_rr:"";?>">
			 <br> SaO2  
			 <input type="text" class='small' name="physical_examination_sao2" value="<?php echo isset($physical_examination_sao2)?$physical_examination_sao2:"";?>">% 
			 <br> T  
			 <input type="text" class='small' name="physical_examination_t" value="<?php echo isset($physical_examination_t)?$physical_examination_t:"";?>">oC 
			 <br> Ht身高 
			 <input type="text" class='small' name="physical_examination_ht" value="<?php echo isset($physical_examination_ht)?$physical_examination_ht:"";?>"><br>
			 Wt体重
			 <input type="text" class='small' name="physical_examination_wt" value="<?php echo isset($physical_examination_wt)?$physical_examination_wt:"";?>"></td>
		</tr>
			<tr>
				<td colspan="4">OBTESTRICAL DX(产科诊断)：           

					<p>S/P Fall/MVA point of Impact摔倒、车祸涉及部位<input type="text" class='small' name="s_p" value="<?php echo isset($s_p)?$s_p:"";?>"></p><br>
						 ASA Physical Status麻醉科指征：
						 <input type="radio" name="asa_physical_statues" <?php if($asa_physical_statues==1){?>checked=true<?php }?> value="1">I 
						 <input type="radio" name="asa_physical_statues" <?php if($asa_physical_statues==2){?>checked=true<?php }?> value="2">II 
						 <input type="radio" name="asa_physical_statues" <?php if($asa_physical_statues==3){?>checked=true<?php }?> value="3">III 
						 <input type="radio" name="asa_physical_statues" <?php if($asa_physical_statues==4){?>checked=true<?php }?> value="4">E<br>
						 FASTING STATUS禁食：Last Solid固体@
						<input type="text" class='small' name="fasting_status_last_solid" value="<?php echo isset($fasting_status_last_solid)?$fasting_status_last_solid:"";?>"><br>
						 Last Liquid液体@
						 <input type="text" class='small' name="fasting_status_last_liquid" value="<?php echo isset($fasting_status_last_liquid)?$fasting_status_last_liquid:"";?>">
				</td>
			</tr>		
	</table>	
	<button class="submit" type="submit"><span>确 定</span></button>
</form>
</div>