<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
<form id="surgery_illness_edit_1" action="<?php echo IUrl::creatUrl("/modify/surgery_system_review_act");?>"  method="post">
	<table style="border-collapse:collapse" >
		<tr>
			<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
			<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
			<td>SYSTEN REVIEW系统回顾/Normal正常or COMMENTS详细描述（Space on the back）
			</td>
			<td>LABOIATORY实验室检查
			</td>
		</tr>
		<tr>
			<td>Normal正常CARDIOVASCULAR心血管：HTN高血压，CAD/MI冠心，Valvular Dz瓣膜病，CHF心衰，Arrhythmia心律失常，PVD周围心管病，CVA/ITA中
			<input type="text" class='normal' name=review_cardovascular value="<?php echo isset($review_cardovascular)?$review_cardovascular:"";?>"></td>	
			<td>EKG心电图，Echo（心超）CXR胸片，ABG血气分析
			<input type="text" class='normal' name="review_laboratory" value="<?php echo isset($review_laboratory)?$review_laboratory:"";?>">
			</td>	
		</tr>
		<tr>
			<td>Normal正常RESPIRATORY呼吸道：Asthma哮喘，COPD慢阻肺，Snoring/OSA睡眠呼暂停，Recent URI/Pneumonia新近上呼吸道感染/肺炎
			<input type="text" class='normal' name="review_respiratory" value="<?php echo isset($review_respiratory)?$review_respiratory:"";?>"></td>	
			<td rowspan="2" >Liver Function Test肝功能
			<input type="text" class='normal' name="review_liver" value="<?php echo isset($review_liver)?$review_liver:"";?>"></td>
		</tr>
		<tr>
		<td>Normal正常GI/HEPATIC消化道：Liver Dz肝病/Heptitis肝炎，Hiatal Hernia食道裂孔疝，GERD胃食管反流
		<input type="text" class='normal' name="review_gi_hepatic" value="<?php echo isset($review_gi_hepatic)?$review_gi_hepatic:"";?>"></td></tr>
		<tr>
			<td>Normal正常RENAL/ENDOCRINE肾脏/内分泌：DM糖尿病，Steroid糖皮质醇，Thyroid Dz甲状腺病，Renal Failure肾衰
			<input type="text" class='normal' name="review_renal" value="<?php echo isset($review_renal)?$review_renal:"";?>"></td>
			<td rowspan="2">CHEMISTRIES生化
			<input type="text" class='normal' name="review_chmistries" value="<?php echo isset($review_chmistries)?$review_chmistries:"";?>"></td>
		</tr>
		<tr><td>Normal正常NEURO/MUSCULOSKELETAL神经/肌肉骨骼：Seizures癫痫，Paralysis瘫痪，Arthritis关节炎：Neck颈，Scoliosis（脊椎畸形），LBP(腰痛)
		<input type="text" class='normal' name="review_newuro" value="<?php echo isset($review_newuro)?$review_newuro:"";?>"></td></tr>
		<tr><td>Normal正常HEMOTOLOGY血液病：Bleeding Dz出血病，Anemia贫血，Transfusion输血
		<input type="text" class='normal' name="review_hemotology" value="<?php echo isset($review_hemotology)?$review_hemotology:"";?>">
		</td>
		<td>
		LMP末次月经
		<input type="text" class='normal' name="lmp" value="<?php echo isset($lmp)?$lmp:"";?>"></td></tr>
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>