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
	<div class="headbar">
	<div class="position"><span>工具</span><span>></span><span>数据库管理</span><span>></span><span>恢复数据库</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="selectAll('name[]');"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel()"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)" onclick="confirm('确定要还原么？','res_act()')"><button class="operating_btn" type="button"><span class="import">还原</span></button></a>
		<a href="javascript:void(0)" onclick="confirm('确定要打包下载么？','res_pack()')"><button class="operating_btn" type="button"><span class="download">打包下载</span></button></a>
		<a href="javascript:void(0)" onclick="localUpload();"><button class="operating_btn" type="button"><span class="import">本地导入</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="300px" />
			<col width="120px" />
			<col width="150px" />
			<col />
			<thead>
				<tr>
					<th class="t_c">选择</th>
					<th>文件名</th>
					<th>使用空间</th>
					<th>备份时间</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<div class="content">
	<form action='<?php echo IUrl::creatUrl("/tools/backup_del");?>' method='post' name='resForm'>
		<table class="list_table">
			<col width="40px" />
			<col width="300px" />
			<col width="120px" />
			<col width="150px" />
			<col />
			<tbody>
				<?php foreach($system as $key => $item){?>
				<tr>
					<td class="t_c"><input type="checkbox" name="name[]" value="<?php echo isset($item['name'])?$item['name']:"";?>" /></td>
					<td><?php echo isset($item['name'])?$item['name']:"";?></td>
					<td><?php echo isset($item['size'])?$item['size']:"";?>KB</td>
					<td><?php echo isset($item['time'])?$item['time']:"";?></td>
					<td>
						<a href="<?php echo IUrl::creatUrl("/tools/download/file/$item[name]");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_down.gif";?>" alt="下载" title="下载" /></a>
						<a href='javascript:void(0)' onclick="delModel({link:'<?php echo IUrl::creatUrl("/tools/backup_del/name/$item[name]");?>'});"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title="删除" /></a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</form>
</div>
<script type='text/javascript'>
	//还原操作
	function res_act()
	{
		art.dialog({id:'message'}).content('<img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/loading.gif";?>" />正在还原请稍候......');
		var dataJson = getArray('name[]','checkbox');
		$.post('<?php echo IUrl::creatUrl("/tools/res_act");?>',{name:dataJson},function(c)
		{
			if(c.isError == true)
				alert(c.message);
			else
				window.location.href=c.redirect;

			art.dialog({id:'message'}).close();
		}
		,'json');
	}

	//打包下载操作
	function res_pack()
	{
		document.forms[0].action = '<?php echo IUrl::creatUrl("/tools/download_pack");?>';
		document.forms[0].submit();
	}

	//本地上传附件
	function localUpload()
	{
		var formStr =
			'<form action="<?php echo IUrl::creatUrl("/tools/localUpload");?>" method="post" enctype="multipart/form-data">'+
				'<table width="90%" class="border_table" style="margin:10px auto">'+
					'<tbody>'+
						'<tr>'+
							'<th>要导入的SQL文件：</th><td><input class="normal" name="attach" type="file" /></td>'+
						'</tr>'+
						'<tr>'+
							'<th></th><td><button class="submit" type="submit"><span>上传</span></button></td>'+
						'</tr>'+
					'</tbody>'+
				'</table>'+
			'</form>';

		art.dialog({id:'localUpload'}).content(formStr);
	}
</script>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
