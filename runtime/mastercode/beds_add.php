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
	<div class="position"><span>Mastercode</span><span>></span><span>Beds type</span><span>></span><span><?php if(isset($id)){?>Edit new type<?php }else{?>Add New bed type<?php }?></span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/mastercode/beds_add_act");?>" method="post">
			<table class="form_table" cellpadding="0" cellspacing="0">
				<col width="150px" />
				<col />
				<tr>
				<th>Hospital ：</th>
				<td>
				<p>
					<select class="normal" name="hospital_id" onchange='update_model();'>
					<option value="0">请选择医院</option>
					<?php foreach($hospital as $key => $value){?>
					<option value="<?php echo isset($value[id])?$value[id]:"";?>" <?php if(isset($beds['hospital_id']) && $beds['hospital_id']==$value['id']){?> selected <?php }?> ><?php echo isset($value['hospital_name_en'])?$value['hospital_name_en']:"";?></option>
					<?php }?>
					</select><label>*必选项</label>
				</p>
				</td>
				</tr>
				
				<tr>
				<th>Department ：</th>
				<td>
				<p>
					<select class="normal" name="department" onchange='update_model();'>
					<option value="0">请选择科室</option>
					<?php foreach($department as $key => $value){?>
					<option value="<?php echo isset($value[id])?$value[id]:"";?>" <?php if(isset($beds['department']) && $beds['department']==$value['id']){?> selected <?php }?>><?php echo isset($value['name_en'])?$value['name_en']:"";?></option>
					<?php }?>
					</select><label>*必选项</label>
				</p>
				</td>
				</tr>
				
				<tr>
					<th>Description  ：</th>
					<td>
					<p>
						<input class="normal" name="description_en" type="text" value="<?php echo isset($beds[description_en])?$beds[description_en]:"";?>" pattern="required" alt="Name can not be empty" />*English
					</p>
						<input name="id" value="<?php echo isset($beds[id])?$beds[id]:"";?>" type="hidden" />
				
					<p style='margin-top:10px;'>
						<input class="normal" name="description_ch" type="text" value="<?php echo isset($beds[description_ch])?$beds[description_ch]:"";?>" pattern="required" alt="名称不能为空" />*Chinese
					</p>
					</td>
				</tr>
				<tr>
					<th>Order ：</th>
					<td >
					<p style='margin-top:15px;'>
						<input class="normal" name="order" type="text" value="<?php echo isset($beds[order])?$beds[order]:"";?>" pattern="required" alt="Order can not be empty" />
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
