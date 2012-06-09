<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/board/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/board/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/board/runtime/systemjs/autovalidate/validate.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/bob2_anime.gif";?>" width="70" height="70" /></a>
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
	<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/Calendar4.js";?>"></script>

<div class="headbar">
	<div class="position"><span>Mastercode</span><span>></span><span>Hospital</span><span>></span><span><?php if(isset($id)){?>Edit Hospital Detail<?php }else{?>Add New Hospital<?php }?></span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/mastercode/hospital_edit_act");?>" method="post">
			<table class="form_table" cellpadding="0" cellspacing="0">
				<col width="150px" />
				<col />
				<tr>
					<th>Hospital Name：</th>
					<td>
					<p>
						<input class="normal" name="hospital_name_en" type="text" value="<?php echo isset($hospital_name_en)?$hospital_name_en:"";?>" pattern="required" alt="Name can not be empty" />*English
					</p>
						<input name="id" value="<?php echo isset($id)?$id:"";?>" type="hidden" />
				
					<p style='margin-top:10px;'>
						<input class="normal" name="hospital_name_ch" type="text" value="<?php echo isset($hospital_name_ch)?$hospital_name_ch:"";?>" pattern="required" alt="名称不能为空" />*Chinese
					</p>
					</td>
				</tr>
				<tr>
					<th>Adress：</th>
					<td >
					<p style='margin-top:15px;'>
						<input class="normal" name="hospital_adress_en" type="text" value="<?php echo isset($hospital_adress_en)?$hospital_adress_en:"";?>" pattern="required" alt="Adress can not be empty" />*English
					</p>
					<p style='margin-top:10px;'>
						<input class="normal" name="hospital_adress_ch" type="text" value="<?php echo isset($hospital_adress_ch)?$hospital_adress_ch:"";?>" pattern="required" alt="地址不能为空" />*Chinese
						</p>
					</td>
				</tr>
				
				<tr>
					<th>Province：</th>
					<td >
					<p style='margin-top:15px;'>
						<input class="normal" name="hospital_province_en" type="text" value="<?php echo isset($hospital_province_en)?$hospital_province_en:"";?>" pattern="required" alt="Province can not be empty" />*English
					</p>
					<p style='margin-top:10px;'>
						<input class="normal" name="hospital_province_ch" type="text" value="<?php echo isset($hospital_province_ch)?$hospital_province_ch:"";?>" pattern="required" alt="省份不能为空" />*Chinese
						</p>
					</td>
				</tr>
				<tr>
					<th>Zipcode：</th>
					<td >
					<p style='margin-top:15px;'>
						<input class="small" name="hospital_zipcode" type="text" value="<?php echo isset($hospital_zipcode)?$hospital_zipcode:"";?>" pattern="required" alt="Zipcode can not be empty" />
					</p>
					</td>
				</tr>
				
				<tr>
					<th>Date of visit：</th>
					<td >
					<p style='margin-top:15px;'>
						<input class="small" name="visited_date_b" id="visited_date_b" type="text" value="<?php echo isset($visited_date_b)?$visited_date_b:"";?>" pattern="required" readonly="readonly" onclick="MyCalendar.SetDate(this)" alt="Time can not be empty" />
					</p>
					<p>
					to
					</p>
					<p>
						<input class="small" name="visited_date_e" id="visited_date_e" type="text" value="<?php echo isset($visited_date_e)?$visited_date_e:"";?>" pattern="required" readonly="readonly" onclick="MyCalendar.SetDate(this)" alt="Time can not be empty" />
					</p>
					</td>
				</tr>
				
				<tr>
					<td></td><td><button class="submit" type="submit"><span>确 定</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
