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
	<div class="position"><span>系统</span><span>></span><span>网站管理</span><span>></span><span>UI管理</span></div>
	<div class="searchbar"><h2>主题方案</h2></div>
	<div class="field t_l"><span>当前主题：<b class="brown"><?php echo isset($this->theme)?$this->theme:"";?></b></span><span>当前皮肤：<b class="brown"><?php echo isset($this->skin)?$this->skin:"";?></b></span></div>
</div>
<div class="content">
	<?php $themeList = $this->getSitePlan('theme')?>
	<?php foreach($themeList as $key => $item){?>
		<table class='list_table th_right'>
			<col width='125px' />
			<col width='70px' />
			<col />
			<tbody>
				<tr>
					<th rowspan='7'>
						<div class="thumbnail">
							<img src="<?php echo IUrl::creatUrl("")."";?><?php echo IWeb::$app->config['viewPath'].'/'.$key.'/'.$item['thumb'];?>" width='110px' />
							<?php if(($key == $this->theme)){?>
							<div class="sel"><span>正在使用</span></div>
							<?php }?>
						</div>
					</th>
					<th>名称：</th><td><?php echo isset($item['name'])?$item['name']:"";?></td>
				</tr>
				<tr><th>目录：</th><td><?php echo isset($key)?$key:"";?></td></tr>
				<tr><th>作者：</th><td><?php echo isset($item['author'])?$item['author']:"";?></td></tr>
				<tr><th>版本：</th><td><?php echo isset($item['version'])?$item['version']:"";?></td></tr>
				<tr><th>时间：</th><td><?php echo isset($item['time'])?$item['time']:"";?></td></tr>
				<tr><th>简介：</th><td><?php echo isset($item['info'])?$item['info']:"";?></td></tr>
				<tr>
					<th>操作：</th>
					<td>
						<a href='<?php echo IUrl::creatUrl("/system/applyTheme/theme/$key");?>' class='orange'>启用</a> &nbsp
						<a href='<?php echo IUrl::creatUrl("/system/conf_skin/theme/$key");?>' class='orange'>选择皮肤</a> &nbsp
					</td>
				</tr>
			</tbody>
		</table><br />
	<?php }?>
</div>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
