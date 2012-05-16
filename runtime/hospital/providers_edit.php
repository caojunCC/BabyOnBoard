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
	<div class="position"><span>Hospital</span><span>></span><span>Providers</span><span>></span><span><?php if($id){?>Edit<?php }else{?>Add<?php }?></span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/hospital/providers_edit_act");?>"  method="post" name="admin_edit">
			<input type='hidden' name='id' value='<?php echo isset($id)?$id:"";?>'/>
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>User Name：</th>
					<td>
						<input type='text' name='admin_name' class='normal' pattern='^\w{4,20}$' value="<?php echo isset($admin_name)?$admin_name:"";?>" alt='请填写英文字母，数字或下划线，在4-20个字符之间' onblur="checkName();" />
						<label id='unique'>* 用户登录后台的用户名，请填写英文字母，数字或下划线，在4-20个字符之间</label>
					</td>
				</tr>

				<?php if($id){?>
				<tr name="reset_pwd">
					<th>Reset Password：</th>
					<td><button type='button' class='btn' onclick="reset_pwd();"><span>重 设</span></button></td>
				</tr>
				<?php }?>

				<tr name="pwd">
					<th>Password：</th>
					<td>
						<input type='password' class='normal' name='password' pattern='^\w{6,32}$' alt='请填写英文字母，数字或下划线，在6-32个字符之间' />
						<label>* 管理员登录后台的密码，请填写英文字母，数字或下划线，在6-32个字符之间</label>
					</td>
				</tr>

				<tr name="pwd">
					<th>Repeat Password：</th>
					<td>
						<input type='password' class='normal' name='repassword' pattern='^\w{6,32}$' alt='重复输入管理员登录后台的密码' bind='password' />
						<label>* 重复输入管理员登录后台的密码</label>
					</td>
				</tr>

				<tr>
					<th>Position：</th>
					<td>
						<select class='normal' id='role_id' name='role_id' pattern='required' alt='请选择一个职位' >
							<option value=''>Please Choose</option>
							<?php if($this->role_hospital_id==0){?>
							<option value='0'>超级管理员</option>
							<?php }?>
							<?php $query = new IQuery("admin_role");$items = $query->find(); foreach($items as $key => $item){?>
							<option value='<?php echo isset($item['id'])?$item['id']:"";?>'><?php echo isset($item['name'])?$item['name']:"";?></option>
							<?php }?>
						</select>
						<label>*为人员分配一个职位</label>
					</td>
				</tr>
				<tr>
					<th>Hospital：</th>
					<td>
						<select class='normal' id='hospital_id' name='hospital_id' pattern='required' alt='请选择一个医院' >
							<option value=''>Please Choose</option>
							<?php if($this->role_hospital_id ==0){?>
							<option value='0'>All Hospital</option>
							<?php }?>
							<?php foreach($this->role_hospital_data as $key => $item){?>
								<option value='<?php echo isset($item['id'])?$item['id']:"";?>' ><?php echo isset($item['hospital_name_en'])?$item['hospital_name_en']:"";?></option>
							<?php }?>
						</select>
						<label>*为人员分配一个医院</label>		
					</td>
				</tr>
				<tr><td></td><td><button class="submit" type="submit"><span>保 存</span></button></td></tr>
			</table>
		</form>
	</div>
</div>

<script type='text/javascript'>

	//ajax检查admin_name唯一性
	function checkName()
	{
		var nameVal = $('[name="admin_name"]').val(); //获取登录名
		var idVal   = $('[name="id"]').val();         //获取id

		jQuery.post(
			'<?php echo IUrl::creatUrl("/system/check_admin");?>',{admin_name:nameVal,admin_id:idVal},function(content)
			{
				var content = $.trim(content);
				if(content == -1)
				{
					$('[name="admin_name"]').removeClass('valid-text');
					$('#unique').removeClass('valid-msg');

					$('[name="admin_name"]').addClass('invalid-text');
					$('#unique').addClass('invalid-msg');

					$('#unique').html(nameVal+'用户名已经存在，请重新更换一个');
				}
			}
		);
	}

	//展示密码重设
	function reset_pwd()
	{
		$('[name="reset_pwd"]').hide();
		$('[name="pwd"]').each(
			function (i)
			{
				$('[name="pwd"]:eq('+i+') *').show();
			}
		);
	}

	//修改信息时自动隐藏
	<?php if($id){?>
		$('[name="pwd"] *').hide();
	<?php }?>
	
	window.onload= function a()
	{
		$('#hospital_id').val(<?php echo isset($hospital_id)?$hospital_id:"";?>);
		$('#role_id').val(<?php echo isset($role_id)?$role_id:"";?>);
	}
</script>

	</div>
	<div id="separator"></div>
</div>

</body>
</html>
