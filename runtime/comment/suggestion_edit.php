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
	<?php $items=$this->suggestion;?>
<div class="headbar">
	<div class="position"><span>会员</span><span>></span><span>咨询管理</span><span>></span><span>查看建议</span></div>
	<div class="operating">
		<a onclick="location='<?php echo IUrl::creatUrl("/comment/suggestion_del/check/$items[id]");?>'" href="javascript:void(0);"><button  class="operating_btn" type="button"><span class="delete">删除</span></button></a>

		<a href="javascript:void(0)" onclick="history.go(-1)"><button class="operating_btn" type="button"><span class="return">返回</span></button></a>
	</div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/comment/suggestion_edit_act/");?>" method="post" name="comment_edit">
			<input type="hidden" name="id" value="<?php echo isset($items['id'])?$items['id']:"";?>" />
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>建议人：</th><td><?php if(isset($items['user_id'])){?><a href="<?php echo IUrl::creatUrl("/member/member_edit/uid/$items[user_id]");?>"><?php echo isset($items['username'])?$items['username']:"";?></a><?php }?>
					<input type="hidden" value="<?php echo isset($items['id'])?$items['id']:"";?>" name="check[]" /></td>
				</tr>
				<tr>
					<th>添加时间：</th><td><?php echo isset($items['time'])?$items['time']:"";?></td>
				</tr>
				<tr>
					<th>建议内容：</th><td><?php echo isset($items['content'])?$items['content']:"";?></td>
				</tr>
				<tr>
					<th valign="top">回复：</th><td><textarea name="re_content" rows="" cols=""><?php echo isset($items['re_content'])?$items['re_content']:"";?></textarea></td>
				</tr>
				<tr>
					<th></th><td><button class="submit" type="submit"><span>回 复</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

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
