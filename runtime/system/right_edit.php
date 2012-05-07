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
	<div class="position"><span>Hospital</span><span>></span><span>Rights</span><span>></span><span><?php if(isset($this->rightRow['id'])){?>Edit<?php }else{?>Add<?php }?>Rights</span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/system/right_edit_act");?>"  method="post" name='right_edit'>
			<input type='hidden' name='id' />
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>权限名称：</th>
					<td><input type='text' class='normal' name='name' pattern='required' alt='请填写权限名称' /><label>* 请填写权限名称</label></td>
				</tr>
				<tr>
					<th>输入方式：</th>
					<td>
						<label class='attr'><input type='radio' name='input_type' checked=checked value='1' onchange="$('#input_type,#input_type>*').hide();$('#select_type,#select_type>*').show();" />智能输入</label>
						<label class='attr'><input type='radio' name='input_type' value='2' onchange="$('#input_type,#input_type>*').show();$('#select_type,#select_type>*').hide();" />手动输入</label>
					</td>
				</tr>
				<tr>
					<th>权限码：</th>
					<td>
						<span id='select_type'>
							<select class='auto' id='ctrl' name='ctrl' onchange="get_list_action(this.value);"><option value='' selected=selected>请选择</option></select> @ <select class='auto' name='action' id='action' pattern='required'></select>
						</span>

						<span id='input_type' style='display:none'>
							<input type='text' class='small' style='display:none' name='right' pattern='^\w+@\w+$' />
						</span>

						<label>* 此码是由 [ 控制器名称 ] @ [ 动作名称 ] 组成，例如 管理员列表的权限码：system@admin_list </label>
					</td>
				</tr>
				<tr><td></td><td><button class="submit" type='submit'><span>保 存</span></button></td></tr>
			</table>
		</form>
	</div>
</div>

<script type='text/javascript'>
	<?php $rightArray = explode('@',$this->rightRow['right'])?>

	//动态获取控制器文件列表
	$.getJSON('<?php echo IUrl::creatUrl("/system/list_controller");?>',function(content){
		for(pro in content)
		{
			var isSelect  = (content[pro] == '<?php echo isset($rightArray[0])?$rightArray[0]:"";?>') ? 'selected=selected' : '';
			var optionStr = '<option value="'+content[pro]+'" '+isSelect+'>'+content[pro]+'</option>';
			$('#ctrl').append(optionStr);
		}
		get_list_action($('#ctrl').val());
	});

	//动态获取动作列表
	function get_list_action(ctrlId)
	{
		$('#action').html('');
		$.getJSON('<?php echo IUrl::creatUrl("/system/list_action");?>',{ctrlId:ctrlId},function(content){
			for(pro in content)
			{
				var isSelect  = (content[pro] == '<?php echo isset($rightArray[1])?$rightArray[1]:"";?>') ? 'selected=selected' : '';
				var optionStr = '<option value="'+content[pro]+'" '+isSelect+'>'+content[pro]+'</option>';
				$('#action').append(optionStr);
			}
		});
	}

	var formObj = new Form('right_edit');
	formObj.init({
		'id':'<?php echo isset($this->rightRow['id'])?$this->rightRow['id']:"";?>',
		'name':'<?php echo isset($this->rightRow['name'])?$this->rightRow['name']:"";?>',
		'right':'<?php echo isset($this->rightRow['right'])?$this->rightRow['right']:"";?>'
	});
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
