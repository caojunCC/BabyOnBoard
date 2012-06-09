<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/xf-table.css";?>" />
<div class="xf-main1">
<form id="surgery_illness_edit_1" action="<?php echo IUrl::creatUrl("/modify/surgery_plan_all_act");?>"  method="post">
	<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
	<input type='hidden' name='basic_id' value='<?php echo isset($this->id)?$this->id:"";?>'/>
	<table style="border-collapse:collapse">
       <tr>
	       <td>ANESTHETIC PLAN麻醉计划<br>
		   CSE腰硬联合，Epidural硬膜外，Spinal腰麻，GAET全麻插管，Others其他；
		   <input type="text" class='normal' name="anesthetic_plan" value="<?php echo isset($anesthetic_plan)?$anesthetic_plan:"";?>"></td>
		   <td>OBSTETRICAL PLAN产科计划<br>
		   Vaginal(阴道)   C-section（破宫产）   Others其他：
		   <input type="text" class='normal' name="obstetrical_plan" value="<?php echo isset($obstetrical_plan)?$obstetrical_plan:"";?>"></td>
		   <td>Obstetrian产科医生：
		   <input type="text" class='small' name="obsterian" value="<?php echo isset($obsterian)?$obsterian:"";?>"><br>
		   Anesthesiologist麻醉医生：
		   <input type="text" class='small' name="anesthesiologist" value="<?php echo isset($anesthesiologist)?$anesthesiologist:"";?>"></td>
		   <td>Date日期：
		   <input type="text" class='small' name="sign_date" value="<?php echo isset($sign_date)?$sign_date:"";?>"   onclick="MyCalendar.SetDate(this)" ><br>
		   Time时间：
		   <input type="text" class='small' name="sign_time" value="<?php echo isset($sign_time)?$sign_time:"";?>"></td>
		</tr>
     </table>
     <button class="submit" type="submit"><span>确 定</span></button>
</form>