<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/iwebshop/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/iwebshop/runtime/systemjs/autovalidate/validate.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/logo.gif";?>" width="303" height="43" /></a>
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
	<div class="position"><span>Mastercode</span><span>></span><span>Amniotic types</span><span>></span><span><?php if(isset($id)){?>Edit amniotic types<?php }else{?>Add new amniotic types<?php }?></span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/mastercode/amniotic_types_edit_act");?>" method="post">
			<table class="form_table" cellpadding="0" cellspacing="0">
				<col width="150px" />
				<col />
				<tr>
					<th>Description：</th>
					<td>
					<p>
						<input class="normal" name="description_en" type="text" value="<?php echo isset($description_en)?$description_en:"";?>" pattern="required" alt="Description can not be empty" />*English
					</p>
						<input name="id" value="<?php echo isset($id)?$id:"";?>" type="hidden" />
				
					<p style='margin-top:10px;'>
						<input class="normal" name="description_ch" type="text" value="<?php echo isset($description_ch)?$description_ch:"";?>" pattern="required" alt="描述不能为空" />*Chinese
					</p>
					</td>
				</tr>
				
				<tr>
					<th>Mnemonics ：</th>
					<td>
					<p>
						<input class="normal" name="mnemonics_en" type="text" value="<?php echo isset($mnemonics_en)?$mnemonics_en:"";?>" pattern="required" alt="Mnemonics can not be empty" />*English
					</p>
					<p style='margin-top:10px;'>
						<input class="normal" name="mnemonics_ch" type="text" value="<?php echo isset($mnemonics_ch)?$mnemonics_ch:"";?>" pattern="required" alt="简称不能为空" />*Chinese
					</p>
					</td>
				</tr>
				
				<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/jquery-1.4.4.min.js";?>"></script>
				<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/farbtastic.js";?>"></script>
				<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/farbtastic.css";?>" type="text/css" />
				
				<tr>
					<th>FG Color：</th>
					<td >
						<input class="colorField" type="text" id="front_color" name="front_color" value="<?php if(isset($front_color)){?><?php echo isset($front_color)?$front_color:"";?><?php }else{?>#000000<?php }?>" />
					</td>
				</tr>	
				<tr>
					<th></th>
					<td>
						<div id="colorpicker"></div>
						<script type="text/javascript">
						   $(document).ready(function() {
						     $('#colorpicker').farbtastic('#front_color');
						   });
						</script>
 					</td>
				</tr>	
				
				<tr>
					<th>BG Color：</th>
					<td >
						<input class="colorField" type="text" id="background_color" name="background_color" value="<?php if(isset($background_color)){?><?php echo isset($background_color)?$background_color:"";?><?php }else{?>#ffffff<?php }?>" />
					</td>
				</tr>	
				<tr>
					<th></th>
					<td >
						<div id="colorpicker2"></div>
						<script type="text/javascript">
						   $(document).ready(function() {
						     $('#colorpicker2').farbtastic('#background_color');
						   });
						</script>
 					</td>
				</tr>
				
				<tr>
				<th>Bold:</th>
				<td>
				<input type="checkbox" name="is_bold" value="1" <?php if($is_bold=='1'){?> checked <?php }?>>
				</td>
				</tr>
				
				<tr>
					<th>Order：</th>
					<td>
					<p>
						<input class="normal" name="order" type="text" value="<?php echo isset($order)?$order:"";?>" pattern="required" alt="Order can not be empty" />
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
