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
	<script charset="UTF-8" src="/iwebshop/runtime/systemjs/my97date/wdatepicker.js"></script>
<div class="headbar">
	<div class="position"><span>会员</span><span>></span><span>咨询管理</span><span>></span><span>讨论信息列表</span></div>
	<div class="operating">
		<div class="search f_r">
			<form name="serachuser" action="<?php echo IUrl::creatUrl("/");?>" method="get">
			<input type='hidden' name='controller' value='comment' />
			<input type='hidden' name='action' value='discussion_list' />
			<select class="normal" name="search">
				<option value="u.username" <?php if((isset($search) && $search=='u.username')){?>selected<?php }?>>讨论人</option>
				<option value="goods.name" <?php if((isset($search) && $search=='goods.name')){?>selected<?php }?>>讨论商品</option>
			</select>
			<input class="small" name="keywords" type="text" value="<?php echo isset($keywords)?$keywords:"";?>" /><button class="btn" type="submit"><span class="sch">搜 索</span></button>
			</form>
		</div>
		<a href="javascript:void(0)" onclick="selectAll('check[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel({form:'discussion_list',msg:'确定要删除选中的记录吗？'})"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
	</div>
	<form name="filter_form" method="get" action="<?php echo IUrl::creatUrl("/");?>">
	<input type='hidden' name='controller' value='comment' />
	<input type='hidden' name='action' value='discussion_list' />
	<div class="searchbar">
		讨论人：<input class="small" type="text" name="username" value="<?php echo isset($username)?$username:"";?>" />
		讨论商品：<input class="small" type="text" name="goodsname" value="<?php echo isset($goodsname)?$goodsname:"";?>" />
		开始时间：<input class="small" type="text" name="beginTime" onfocus="WdatePicker()" value="<?php echo isset($beginTime)?$beginTime:"";?>" />
		截止时间：<input class="small" type="text" name="endTime" onfocus="WdatePicker()" value="<?php echo isset($endTime)?$endTime:"";?>" />
		<button class="btn" type="submit"><span class="sel">筛 选</span></button>
	</div>
	</form>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="150px" />
			<col />
			<col width="160px" />
			<col width="110px" />
			<thead>
				<tr role="head">
					<th class="t_c">选择</th>
					<th sort="true">讨论人</th>
					<th sort="true">讨论商品</th>
					<th sort="true" datatype="date">讨论时间</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<form action="<?php echo IUrl::creatUrl("/comment/discussion_del");?>" method="post" name="discussion_list" onsubmit="return checkboxCheck('check[]','尚未选中任何记录！')">
<div class="content">
	<input type="hidden" name="move_group" value="" />
	<table id="list_table" class="list_table">
		<col width="40px" />
		<col width="150px" />
		<col />
		<col width="160" />
		<col width="100px" />
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $query = new IQuery("discussion as d");$query->join = "left join goods as goods on d.goods_id = goods.id left join user as u on d.user_id = u.id";$query->fields = "d.id,d.time,u.id as userid,u.username,goods.id as goods_id,goods.name as goods_name";$query->page = "$page";$query->where = "$where";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td class="t_c"><input name="check[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
				<td><a href="<?php echo IUrl::creatUrl("/member/member_edit/uid/$item[userid]");?>"><?php echo isset($item['username'])?$item['username']:"";?></a></td>
				<td><a href="<?php echo IUrl::creatUrl("/site/products/id/$item[goods_id]");?>" target="_blank"><?php echo isset($item['goods_name'])?$item['goods_name']:"";?></a></td>
				<td><?php echo isset($item['time'])?$item['time']:"";?></td>
				<td>
					<a href="<?php echo IUrl::creatUrl("/comment/discussion_edit/did/$item[id]");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_check.gif";?>" alt="修改" /></a>
					<a href="javascript:void(0)" onclick="delModel({link:'<?php echo IUrl::creatUrl("/comment/discussion_del/check/$item[id]");?>'})"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" /></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<?php echo $query->getPageBar();?>
</form>

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