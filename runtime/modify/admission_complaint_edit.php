<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />

<div class="xf-main1" >
<form id="admission_complaint_edit_act" action="<?php echo IUrl::creatUrl("/modify/admission_complaint_edit_act");?>"  method="post">
	<table style="border-collapse:collapse" >
		<tr>
			<td rowspan="2">
				<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
				<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
					<p>ADNISSION COMPLAINT入院主诉：</p><br>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(1,$this->select)){?>checked<?php }?> value="1">R/O Labor排除临产</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(2,$this->select)){?>checked<?php }?> value="2">R/O PTL排除早产</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(3,$this->select)){?>checked<?php }?> value="3">R/O SROM排除破水</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(4,$this->select)){?>checked<?php }?> value="4">R/O PIH排除妊高症</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(5,$this->select)){?>checked<?php }?> value="5">Decrease Fetal Movement 胎动减少</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(6,$this->select)){?>checked<?php }?> value="6">Headache头痛</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(7,$this->select)){?>checked<?php }?> value="7">Nausea/Vomiting恶心/呕吐</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(8,$this->select)){?>checked<?php }?> value="8">Status Post Fall/MVA摔倒/车祸</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(9,$this->select)){?>checked<?php }?> value="9">Scheduled Procedure预约操作</p>
						<p><input type="checkbox" id='pre_sympton' name='pre_sympton[]' <?php if(in_array(10,$this->select)){?>checked<?php }?> value="10">Other其他</p>
			</td>
			<td>AGE年龄  <input type="text" class='small' name="age" value="<?php echo isset($age)?$age:"";?>"> </td>
			<td>GRACIDA次孕  <input type="text" class='small' name="gracida" value="<?php echo isset($gracida)?$gracida:"";?>"></td>
			<td>TERM足月  <input type="text" class='small' name="term" value="<?php echo isset($term)?$term:"";?>"></td>
			<td>PRETERM早产  <input type="text" class='small' name="preter" value="<?php echo isset($preter)?$preter:"";?>"></td>
			<td>Antibdy抗体  <input type="text" class='small' name="antibdy" value="<?php echo isset($antibdy)?$antibdy:"";?>"></td>
			<td>LIVING存活  <input type="text" class='small' name="living" value="<?php echo isset($living)?$living:"";?>"></td>
		</tr>
		<tr>
			<td>LMO末次月经  <input type="text" class='small' name="lmp" value="<?php echo isset($lmp)?$lmp:"";?>"></td>
			<td>EDC预产期  <input type="text" class='small' name="ega" value="<?php echo isset($ega)?$ega:"";?>"></td>
			<td>EGA胎龄  <input type="text" class='small' name="edc" value="<?php echo isset($edc)?$edc:"";?>"></td>
			<td>HT身高  <input type="text" class='small' name="ht" value="<?php echo isset($ht)?$ht:"";?>"></td>
			<td>WT体重  <input type="text" class='small' name="wt" value="<?php echo isset($wt)?$wt:"";?>"></td>
			<td>Wt Gain增重  <input type="text" class='small' name="wt_gain" value="<?php echo isset($wt_gain)?$wt_gain:"";?>"></td>
		</tr>
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>