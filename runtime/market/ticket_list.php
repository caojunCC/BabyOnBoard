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
	<div class="headbar">
	<div class="position"><span>营销</span><span>></span><span>代金券管理</span><span>></span><span>代金券列表</span></div>
	<div class="operating">
		<a href="javascript:;" onclick="event_link('<?php echo IUrl::creatUrl("/market/ticket_edit");?>')"><button class="operating_btn" type="button"><span class="addition">添加代金券</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('id[]');"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="document.forms[0].action='<?php echo IUrl::creatUrl("/market/ticket_excel");?>';delModel({msg:'是否要生成excel表格'});"><button class="operating_btn" type="button"><span class="export">生成EXCEL</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="150px" />
			<col width="80px" />
			<col width="80px" />
			<col width="80px" />
			<col />
			<thead>
				<tr>
					<th>选择</th>
					<th>名称</th>
					<th>面值</th>
					<th>数量</th>
					<th>兑换积分</th>
					<th>有效期</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<div class="content">
	<form method='post' action='#'>
		<table class="list_table">
			<col width="40px" />
			<col width="150px" />
			<col width="80px" />
			<col width="80px" />
			<col width="80px" />
			<col />
			<tbody>
				<?php $propObj = new IModel('prop')?>
				<?php $query = new IQuery("ticket");$items = $query->find(); foreach($items as $key => $item){?>
				<?php $ticket_num = $this->getTicketCount($propObj,$item['id'])?>
				<tr>
					<td><input type='checkbox' name='id[]' value='<?php echo isset($item['id'])?$item['id']:"";?>' /></td>
					<td><?php echo isset($item['name'])?$item['name']:"";?></td>
					<td><?php echo isset($item['value'])?$item['value']:"";?> 元</td>
					<td><?php echo isset($ticket_num)?$ticket_num:"";?> 张</td>
					<td><?php echo ($item['point']==0) ? '不可兑换':$item['point'];?></td>
					<td><?php echo isset($item['start_time'])?$item['start_time']:"";?> ～ <?php echo isset($item['end_time'])?$item['end_time']:"";?></td>
					<td>
						<a href='<?php echo IUrl::creatUrl("/market/ticket_edit/id/$item[id]");?>'>
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="修改" title="修改" />
						</a>

						<a href='<?php echo IUrl::creatUrl("/market/ticket_more_list/ticket_id/$item[id]");?>'>
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_check.gif";?>" alt="查看详情" title="查看详情" />
						</a>

						<a href='javascript:create_dialog("<?php echo isset($item['id'])?$item['id']:"";?>");'>
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_add.gif";?>" alt="生成实体代金券" title="生成实体优惠券" />
						</a>

						<?php if($ticket_num > 0){?>
						<a href='javascript:void(0)' onclick="delModel({msg:'是否要生成excel表格？',link:'<?php echo IUrl::creatUrl("/market/ticket_excel/id/$item[id]");?>'});">
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_down.gif";?>" alt="生成EXCEL" title="生成EXCEL" />
						</a>
						<?php }?>

						<a href='javascript:void(0)' onclick="delModel({link:'<?php echo IUrl::creatUrl("/market/ticket_del/id/$item[id]");?>'});">
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title="删除" />
						</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</form>
</div>

<script type='text/javascript'>
	//创建优惠券
	function create_dialog(ticket_id)
	{
		art.dialog({
			id:'ticket',
			content:
					 '<table class="form_table" style="width:300px">'
					+'<tr><th>生成代金券数量：</th><td><input type="text" class="small" name="num" />张</td></tr>'
					+'<tr><th></th><td><button class="submit" onclick="ticket_create('+ticket_id+');"><span>确 定</span></button></td></tr>'
					+'</table>'
		});
	}

	//创建ajax
	function ticket_create(ticket_id)
	{
		var ticket_num = $('[name="num"]').val();
		ticket_num     = parseInt(ticket_num);
		ticket_id      = parseInt(ticket_id);
		if(ticket_num && ticket_id)
		{
			window.location.href="<?php echo IUrl::creatUrl("/market/ticket_create/?ticket_id");?>"+"="+ticket_id+"&num="+ticket_num;
		}
		else
		{
			alert('生成代金券数量必须填写一个合法数字');
		}
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
