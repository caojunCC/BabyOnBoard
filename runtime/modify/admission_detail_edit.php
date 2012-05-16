<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />

<div class="xf-main1">
<form id="admission_detail_edit_act_1" action="<?php echo IUrl::creatUrl("/modify/admission_detail_edit_act");?>"  method="post">
	<table style="border-collapse:collapse" >
		<tr>
			<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
			<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
			<td>TIME时间 <input type="text" id="time" name="time" value="<?php echo isset($time)?$time:"";?>"   onclick="MyCalendar.SetDate(this)" ></td>
			<td>ARRIVED FROM来自：<br>
				<input type="radio" id="form_where" name="form_where" <?php if($form_where ==1){?>checked=true<?php }?> value="1">ED急诊
				<input type="radio" id="form_where" name="form_where" <?php if($form_where ==2){?>checked=true<?php }?> value="2">Home家
				<input type="radio" id="form_where" name="form_where" <?php if($form_where ==3){?>checked=true<?php }?> value="3">Clinic门诊
				<input type="radio" id="form_where" name="form_where" <?php if($form_where ==4){?>checked=true<?php }?> value="4">Floor病房
				<input type="radio" id="form_where" name="form_where" <?php if($form_where ==5){?>checked=true<?php }?> value="5">Transfer from外院
			</td>
			<td>ACOMPANIED BY陪同：<input type="text" id="accompany" name="accompany" value="<?php echo isset($accompany)?$accompany:"";?>"> </td>
		</tr>
		<tr><td>UNIT部门
		<select id = 'unit' name='unit'>
			<option value='0' >Please Choose</option>
			<?php $query = new IQuery("department_type");$query->order = "`order`";$items = $query->find(); foreach($items as $key => $item){?>
				<option value= "<?php echo isset($item['id'])?$item['id']:"";?>" <?php if($item['id']==$unit){?>selected<?php }?>><?php echo isset($item['name_en'])?$item['name_en']:"";?></option>
			<?php }?>
		</select>
			<td>ADDMITTING NURSE接待护士 <input type="text" id="add_nurse" name="add_nurse" value="<?php echo isset($add_nurse)?$add_nurse:"";?>"></td>
			<td>VIA通过：
				<input type="radio" id="via" name="via" <?php if($via ==1){?>checked=true<?php }?> value="1">Wheelchair轮椅
				<input type="radio" id="via" name="via" <?php if($via ==2){?>checked=true<?php }?> value="2">Cart推车
				<input type="radio" id="via" name="via" <?php if($via ==3){?>checked=true<?php }?> value="3">Ambulatory步行
				<input type="radio" id="via" name="via" <?php if($via ==4){?>checked=true<?php }?> value="4">Ambulance救护车
				<input type="radio" id="via" name="via" <?php if($via ==5){?>checked=true<?php }?> value="5">Other其他
			</td>	
		</tr>
	</table>
	<button class="submit" type="submit"><span>确 定</span></button>
</form>

</div>