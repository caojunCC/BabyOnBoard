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
		<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <a href="<?php echo IUrl::creatUrl("");?>" target='_blank'>商城首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
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
	<script charset="UTF-8" src="/iwebshop/runtime/systemjs/editor/kindeditor-min.js"></script>
<div class="headbar">
	<div class="position"><span>系统</span><span>></span><span>支付管理</span><span>></span><span>支付方式</span></div>
</div>
<ul class="tab" name="menu">
	<li class="selected"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('table_box_1')">使用支付方式</a></li>
	<li><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('table_box_2')">全部支付方式</a></li>
</ul>
<div class="content">
	<table id="table_box_1" class="border_table" cellpadding="0" cellspacing="0">
		<colgroup>
			<col width="200px">
			<col width="150px">
			<col width="350px">
			<col width="100px">
		</colgroup>
		<thead>
			<tr>
				<th>图标</th>
				<th>支付名称</th>
				<th>支付描述</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($payment_list as $key => $item){?>
				<tr>
					<td><img src="<?php echo IUrl::creatUrl("")."plugins";?><?php echo isset($item['logo'])?$item['logo']:"";?>" /></td>
					<td><?php echo isset($item['name'])?$item['name']:"";?></td>
					<td><?php echo isset($item['description'])?$item['description']:"";?></td>
					<td>
						<a href="<?php echo IUrl::creatUrl("/system/payment_edit/payid/$item[id]");?>">配置</a> |
						<a href="javascript:void()" onclick="confirm('您确定要删除？','payment_del(<?php echo isset($item['id'])?$item['id']:"";?>)')">删除</a> |
						<?php if($item['status']==1){?>
							<a href="<?php echo IUrl::creatUrl("/system/payment_enable/status/0/payid/$item[id]");?>">启用</a>
						<?php }else{?>
							<a href="<?php echo IUrl::creatUrl("/system/payment_enable/status/1/payid/$item[id]");?>">禁用</a>
						<?php }?>
					</td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	<table id="table_box_2" class="border_table" cellpadding="0" cellspacing="0" style="display: none">
		<colgroup>
			<col width="200px">
			<col width="150px">
			<col width="350px">
			<col width="100px">
		</colgroup>
		<thead>
			<tr>
				<th>图标</th>
				<th>支付名称</th>
				<th>支付描述</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php $query = new IQuery("pay_plugin");$query->where = "visibility = 1";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td><img src="<?php echo IUrl::creatUrl("")."plugins";?><?php echo isset($item['logo'])?$item['logo']:"";?>" /></td>
				<td><?php echo isset($item['name'])?$item['name']:"";?></td>
				<td><?php echo isset($item['description'])?$item['description']:"";?></td>
				<td>
					<a href="<?php echo IUrl::creatUrl("/system/payment_edit/id/$item[id]");?>">添加</a>
				</td>
			</tr>
		<?php }?>
		</tbody>
	</table>
</div>
<script language="javascript">
	//tab切换选择事件
	function select_tab(curr_tab)
	{
		$(".content > table").hide();
		$("#" + curr_tab).show();
	}
	//支付方式删除事件
	function payment_del(payid)
	{
		var tempUrl = '<?php echo IUrl::creatUrl("/system/payment_del/payid/@payid@");?>';
		var tempUrl = tempUrl.replace('@payid@',payid);
		location.href = tempUrl;
	}
</script>
	</div>
	<div id="separator"></div>
</div>
<script type='text/javascript'>
	//隔行换色
	$(".list_table tr::nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);
</script>
</body>
</html>
