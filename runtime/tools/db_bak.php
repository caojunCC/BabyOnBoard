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
	<div class="headbar">
	<div class="position"><span>工具</span><span>></span><span>数据库管理</span><span>></span><span>备份数据库</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="selectAll('name[]');"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="confirm('确定要备份么？','backup_act()');"><button class="operating_btn" type="button"><span class="backup">备份</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="50px" />
			<col width="200px" />
			<col width="110px" />
			<col width="105px" />
			<col width="150px" />
			<col />
			<thead>
				<tr>
					<th class="t_c">选择</th>
					<th>数据库表</th>
					<th>记录条数</th>
					<th>占用空间</th>
					<th>编码</th>
					<th>说明</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<div class="content">
	<form>
		<table class="list_table">
			<col width="50px" />
			<col width="200px" />
			<col width="110px" />
			<col width="105px" />
			<col width="150px" />
			<col />
			<tbody>
				<?php foreach($tableInfo as $key => $item){?>
				<tr>
					<td class="t_c"><input type="checkbox" name="name[]" value="<?php echo isset($item['Name'])?$item['Name']:"";?>" /></td>
					<td><?php echo isset($item['Name'])?$item['Name']:"";?></td>
					<td><?php echo isset($item['Rows'])?$item['Rows']:"";?></td>
					<td><?php echo $item['Data_length']>=1024 ? ($item['Data_length']>>10).' KB':$item['Data_length'].' B';?></td>
					<td><?php echo isset($item['Collation'])?$item['Collation']:"";?></td>
					<td><?php echo isset($item['Comment'])?$item['Comment']:"";?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
	//备份数据库表
	function backup_act()
	{
		art.dialog({id:'message'}).content('<p class="t_c"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/loading.gif";?>" /><br />正在备份请稍候......</p>');
		var jsonData = getArray('name[]','checkbox');
		$.post('<?php echo IUrl::creatUrl("/tools/db_act_bak");?>',{name:jsonData},function(c){
			if(c.isError == true)
			{
				alert(c.message);
			}
			else
			{
				window.location.href=c.redirect;
			}
			art.dialog({id:'message'}).close();},'json');
	}
</script>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
