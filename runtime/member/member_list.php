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
	<div class="position"><span>会员</span><span>></span><span>会员管理</span><span>></span><span>会员列表</span></div>
	<div class="operating">
		<div class="search f_r">
		<form name="serachuser" action="<?php echo IUrl::creatUrl("/");?>" method="get">
		<input type='hidden' name='controller' value='member' />
		<input type='hidden' name='action' value='member_list' />
			<select class="normal" name="search">
				<option value="u.username" <?php if($search=='u.username'){?>selected<?php }?>>用户名</option>
				<option value="m.true_name" <?php if($search=='m.true_name'){?>selected<?php }?>>姓名</option>
				<option value="m.telephone" <?php if($search=='m.telephone'){?>selected<?php }?>>电话</option>
				<option value="m.mobile" <?php if($search=='m.mobile'){?>selected<?php }?>>手机</option>
				<option value="u.email" <?php if($search=='u.email'){?>selected<?php }?>>Email</option>
			</select><input class="small" name="keywords" type="text" value="<?php echo isset($keywords)?$keywords:"";?>" />
			<button class="btn" type="submit"><span class="sch">搜 索</span></button>
		</form>
		</div>
		<a href="javascript:;"><button class="operating_btn" type="button" onclick="window.location='<?php echo IUrl::creatUrl("/member/member_edit/");?>'"><span class="addition">添加会员</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('check[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel({form:'member_list',msg:'确定要删除所选中的会员吗？<br />删除的会员可以从回收站找回。'})"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)" onclick="remove()"><button class="operating_btn" type="button"><span class="grade">批量编辑</span></button></a>
		<a href="javascript:;"><button class="operating_btn" type="button" onclick="window.location='<?php echo IUrl::creatUrl("/member/recycling/");?>'"><span class="recycle">回收站</span></button></a>
		<a href="javascript:void(0)" onclick="filter()"><button class="operating_btn" type="button"><span class="remove">筛选</span></button></a>
		<a href="javascript:void(0)" onclick="balance_add()"><button class="operating_btn" type="button"><span class="recharge">预付款管理</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="30px" />
			<col width="90px" />
			<col width="60px" />
			<col width="80px" />
			<col width="40px" />
			<col width="130px"/>
			<col width="60px" />
			<col width="60px" />
			<col width="65px" />
			<col width="80px" />
			<col width="60px" />
			<thead>
				<tr role="head">
					<th class="t_c">选择</th>
					<th>用户名</th>
					<th>会员等级</th>
					<th>姓名</th>
					<th>性别</th>
					<th>Email</th>
					<th>余额</th>
					<th>积分</th>
					<th>注册日期</th>
					<th>手机</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<form action="<?php echo IUrl::creatUrl("/member/member_reclaim");?>" method="post" name="member_list" onsubmit="return checkboxCheck('check[]','尚未选中任何记录！')">
<div class="content">
	<input type="hidden" name="move_group" value="" />
	<input type="hidden" name="move_point" value="" />
	<table id="list_table" class="list_table">
			<col width="30px" />
			<col width="90px" />
			<col width="60px" />
			<col width="80px" />
			<col width="40px" />
			<col width="130px"/>
			<col width="60px" />
			<col width="60px" />
			<col width="65px" />
			<col width="80px" />
			<col width="60px" />
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $query = new IQuery("member as m");$query->join = "left join user as u on m.user_id = u.id left join user_group as gp on m.group_id = gp.id";$query->fields = "m.*,u.username,DATE_FORMAT(m.time, '%Y-%m-%d') as time,u.email,gp.group_name";$query->where = "m.status = 1 and $where";$query->order = "m.user_id desc";$query->page = "$page";$query->pagesize = "20";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td class="t_c"><input name="check[]" type="checkbox" value="<?php echo isset($item['user_id'])?$item['user_id']:"";?>" /></td>
				<td title="<?php echo isset($item['username'])?$item['username']:"";?>"><?php echo isset($item['username'])?$item['username']:"";?></td>
				<td title="<?php echo isset($group[$item['group_id']])?$group[$item['group_id']]:"";?>"><?php echo isset($group[$item['group_id']])?$group[$item['group_id']]:"";?></td>
				<td title="<?php echo isset($item['true_name'])?$item['true_name']:"";?>"><?php echo isset($item['true_name'])?$item['true_name']:"";?></td>
				<td><?php if($item['sex']=='1'){?>男<?php }else{?>女<?php }?></td>
				<td title="<?php echo isset($item['email'])?$item['email']:"";?>"><?php echo isset($item['email'])?$item['email']:"";?></td>
				<td title="<?php echo isset($item['balance'])?$item['balance']:"";?>"><?php echo isset($item['balance'])?$item['balance']:"";?></td>
				<td title="<?php echo isset($item['point'])?$item['point']:"";?>"><?php echo isset($item['point'])?$item['point']:"";?></td>
				<td title="<?php echo isset($item['time'])?$item['time']:"";?>"><?php echo isset($item['time'])?$item['time']:"";?></td>
				<td title="<?php echo isset($item['mobile'])?$item['mobile']:"";?>"><?php echo isset($item['mobile'])?$item['mobile']:"";?></td>
				 <td><!--<a href="<?php echo IUrl::creatUrl("/member/member_edit/uid/$item[user_id]");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="修改" /></a> -->
					<a href="javascript:void(0)" onclick="delModel({link:'<?php echo IUrl::creatUrl("/member/member_reclaim/check/$item[user_id]");?>'})"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" /></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<?php echo $query->getPageBar();?>
</form>
<script language="javascript">

function del_all_option()
{
	$("div[name='filter']").children().not("div[name='menu']").each(function(i){
		$(this).remove();
	});
	$("select[name='requirement'] option").each(function(i){
		$(this).removeAttr('disabled');
	});
}
function del_option(obj)
{
	var name = $(obj).parent().parent().attr('name');
	$("select[name='requirement'] option[value='"+name+"']").removeAttr('disabled');
	$(obj).parent().parent().remove();
}
function addoption()
{
	var obj = $("select[name='requirement'] option:selected");
	if ($("tr[name='"+obj.val()+"']").length<1)
	{
		$("tfoot[name='filter']").append(tpl_option[obj.val()]);
	}
	obj.attr('disabled',true);
	$("select[name='requirement'] option:selected").removeAttr('selected');
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
