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
	<div class="position"><span>营销</span><span>></span><span>营销活动管理</span><span>></span><span>团购</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="event_link('<?php echo IUrl::creatUrl("/market/regiment_edit");?>');"><button class="operating_btn" type="button"><span class="addition">添加团购</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('id[]');"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel();"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
	</div>
	<?php if($this->list_without_goods){?>
		<div style="background:#ccc;border-radius:10px;text-align:left;margin:5px;padding:10px;">列表中某些团购活动所关联的商品已经不存在了，我们用灰色背景把他们显著的表示了出来。建议您将这些团购活动删除掉或者及时更换产品。</div>
	<?php }?>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col />
			<col width="290px" />
			<col width="80px" />
			<col width="80px" />
			<col width="80px" />
			<thead>
				<tr>
					<th>选择</th>
					<th>标题</th>
					<th>团购时间</th>
					<th>状态</th>
					<th>销售情况</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">

	<form method='post' action='<?php echo IUrl::creatUrl("/market/regiment_del");?>'>
		<table class="list_table">
			<col width="40px" />
			<col />
			<col width="290px" />
			<col width="80px" />
			<col width="80px" />
			<col width="80px" />
			<tbody>
			<?php $regimentUser = new IModel('regiment_user_relation')?>
 			<?php $not_in_ids = array(-1);?>
			<?php if($this->list_without_goods){?>
				<?php foreach($this->list_without_goods as $key => $item){?>
				<?php $not_in_ids[]=$item['id'];?>
				<?php 
					$regUserRow=$regimentUser->getObj('is_over = 1 and regiment_id = '.$item['id'],'count(*) as sum_count');
					$item['sum_count'] = isset($regUserRow['sum_count']) ? $regUserRow['sum_count'] : 0;
				?>
				<tr style="background:#ccc;">
					<td><input type='checkbox' name='id[]' value='<?php echo isset($item['id'])?$item['id']:"";?>' /></td>
					<td><?php echo isset($item['title'])?$item['title']:"";?></td>
					<td><?php echo isset($item['start_time'])?$item['start_time']:"";?> ～ <?php echo isset($item['end_time'])?$item['end_time']:"";?></td>
					<td><?php echo ($item['is_close']==1) ? '关闭':'开启';?></td>
					<td><?php echo isset($item['sum_count'])?$item['sum_count']:"";?>/<?php echo isset($item['store_nums'])?$item['store_nums']:"";?></td>
					<td>
						<a href='<?php echo IUrl::creatUrl("/market/regiment_edit/id/$item[id]");?>'>
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="修改" title="修改" />
						</a>

						<a href='javascript:void(0)' onclick="delModel({link:'<?php echo IUrl::creatUrl("/market/regiment_del/id/$item[id]");?>'});">
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title="删除" />
						</a>
					</td>
				</tr>
				<?php }?>
			<?php }?>

				<?php $not_in_ids = implode(",",$not_in_ids);?>
				<?php $page = (int)IReq::get('page');$page<1 && ($page=1);?>
				<?php $query = new IQuery("regiment");$query->page = "$page";$query->where = "id not in ($not_in_ids)";$query->order = "id DESC";$items = $query->find(); foreach($items as $key => $item){?>
				<?php 
					$regUserRow=$regimentUser->getObj('is_over = 1 and regiment_id = '.$item['id'],'count(*) as sum_count');
					$item['sum_count'] = isset($regUserRow['sum_count']) ? $regUserRow['sum_count'] : 0;
				?>
				<tr>
					<td><input type='checkbox' name='id[]' value='<?php echo isset($item['id'])?$item['id']:"";?>' /></td>
					<td><a href='<?php echo IUrl::creatUrl("/site/groupon/id/$item[id]");?>' target='_blank'><?php echo isset($item['title'])?$item['title']:"";?></a></td>
					<td><?php echo isset($item['start_time'])?$item['start_time']:"";?> ～ <?php echo isset($item['end_time'])?$item['end_time']:"";?></td>
					<td><?php echo ($item['is_close']==1) ? '关闭':'开启';?></td>
					<td><?php echo isset($item['sum_count'])?$item['sum_count']:"";?>/<?php echo isset($item['store_nums'])?$item['store_nums']:"";?></td>
					<td>
						<a href='<?php echo IUrl::creatUrl("/market/regiment_edit/id/$item[id]");?>'>
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="修改" title="修改" />
						</a>

						<a href='javascript:void(0)' onclick="delModel({link:'<?php echo IUrl::creatUrl("/market/regiment_del/id/$item[id]");?>'});">
							<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title="删除" />
						</a>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</form>
</div>
<?php echo $query->getPageBar();?>

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
