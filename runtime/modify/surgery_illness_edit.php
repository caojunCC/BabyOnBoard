<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />

<div class="xf-main1">
<form id="surgery_illness_edit_1" action="<?php echo IUrl::creatUrl("/modify/surgery_illness_edit_act");?>"  method="post">
	<table style="border-collapse:collapse" >
		<tr>
		<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
		<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
		<td colspan="2">
		<p>
		Hx of Present Pregnancy and Illness
		</p><br>
							<p>G孕 <input type="text" class='small' name="gracida" value="<?php echo isset($gracida)?$gracida:"";?>"> 
							P产<input type="text" class='small' name="living" value="<?php echo isset($living)?$living:"";?>">Gestational Week(days)孕期<input type="text" class='small' name="ega_by_us" value="<?php echo isset($ega_by_us)?$ega_by_us:"";?>"></p>
							<p>HTN高血压；Edemas水肿：+，++，+++：Headache头痛：Blur Vision视物模糊；</p>
							<p>Hyperglycemia高血糖：Abdominal Pain腹痛：Vaginal Bleeding阴道出血:</p>
							<p><input type="text" class='normal' name="pregnacy_description" value="<?php echo isset($pregnacy_description)?$pregnacy_description:"";?>"></p>
			</td>
			<td rowspan="3" ><p>Current Nedications现用药物
			<input type="text" class='normal' name="current_medication" value="<?php echo isset($current_medication)?$current_medication:"";?>"></p></td></tr>
		</tr>
		<tr><td>Previous Anesthesia&Surgeries麻醉/手术史
		<input type="text" class='normal' name="pre_anesthesia" value="<?php echo isset($pre_anesthesia)?$pre_anesthesia:"";?>"></td>
			<td rowspan="2">Allergies/Intolerances药物过敏/副反应史
		<input type="text" class='normal' name="allergies" value="<?php echo isset($allergies)?$allergies:"";?>">
			</td>
		</tr>
		<tr><td>Family Hx of Anesthesia/Medical/Surgical Cx麻醉/内科/外科并发症
		<input type="text" class='normal' name="medical_surgical_hx" value="<?php echo isset($medical_surgical_hx)?$medical_surgical_hx:"";?>">
		</td>		
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>