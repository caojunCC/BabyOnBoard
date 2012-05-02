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
	<div class="position"><span>会员</span><span>></span><span>会员管理</span><span>></span><span><?php if(isset($member['user_id'])){?>编辑会员<?php }else{?>添加会员<?php }?></span></div>
</div>
<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/member/member_save/");?>" method="post" name="memberForm" onsubmit="return check();">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>用户名：</th>
					<td><?php if(isset($member['user_id'])){?>
							<?php echo $member['user_name'];?>
							<input name="user_name" value="<?php echo isset($member['user_name'])?$member['user_name']:"";?>" type="hidden" />
						<?php }else{?>
						<input class="normal" name="user_name" type="text" value="<?php echo isset($member['user_name'])?$member['user_name']:"";?>" pattern="required" alt="用户名不能为空" /><label>* 用户名称（必填）</label>
						<?php }?>
						<input name="user_id" value="<?php echo isset($member['user_id'])?$member['user_id']:"";?>" type="hidden" />
					</td>
				</tr>
				<tr>
					<th>Email：</th><td><?php if(isset($member['email'])){?><?php echo isset($member['email'])?$member['email']:"";?><input type="hidden" name="email" value="<?php echo isset($member['email'])?$member['email']:"";?>"/><?php }else{?><input type="text" class="normal" name="email" pattern="email" alt="邮箱错误"/><label>* 邮箱不能为空</label><?php }?></td>
				</tr>
				<tr>
					<th>密码：</th><td><input class="normal" name="password" type="password" /><label><?php if(isset($member['user_id'])){?>不修改密码，请保持为空<?php }else{?>* 登录密码（必填）<?php }?></label></td>
				</tr>
				<tr>
					<th>确认密码：</th><td><input class="normal" name="repassword" type="password" /><label>确认密码</label></td>
				</tr>
				<tr>
					<th>会员组：</th>
					<td><select class="normal" name="user_group">
						<?php foreach($group as $key => $value){?>
							<option value="<?php echo isset($value['id'])?$value['id']:"";?>" <?php if(isset($member['user_group'])&&$value['id']==$member['user_group']){?>selected<?php }?>><?php echo isset($value['group_name'])?$value['group_name']:"";?></option>
						<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<th>姓名：</th><td><input class="normal" name="truename" type="text" value="<?php echo isset($member['truename'])?$member['truename']:"";?>" /><label>真实姓名</label></td>
				</tr>
				<tr>
					<th>姓别：</th>
					<td><input class="" name="sex" type="radio" value="1" checked /> 男
						<input class="" name="sex" type="radio" value="2" <?php if(isset($member['sex'])&&$member['sex']==2){?>checked<?php }?> /> 女
					</td>
				</tr>
				<tr>
					<th>电话：</th><td><input class="normal" name="telephone" type="text" value="<?php echo isset($member['telephone'])?$member['telephone']:"";?>" empty pattern="phone" alt="格式不正确 格式：（地区号-）用户号（-分机号）如010-66668888-123" /><label>格式：（地区号-）用户号（-分机号）如010-66668888-123</label></td>
				</tr>
				<tr>
					<th>手机：</th><td><input class="normal" name="mobile" type="text" value="<?php echo isset($member['mobile'])?$member['mobile']:"";?>" empty pattern="mobi" alt="格式不正确" /><label>手机号码</label></td>
				</tr>
				<tr>
					<th>地区：</th><td><select name="province" id="province" onchange="select_city(this.value,2);">
					<option value="">请选择</option>
				<?php $query = new IQuery("areas");$query->where = "parent_id = 0";$items = $query->find(); foreach($items as $key => $item){?><option value="<?php echo isset($item['area_id'])?$item['area_id']:"";?>" ><?php echo isset($item['area_name'])?$item['area_name']:"";?></option><?php }?>
				</select>
				<span id="selec2"></span><span id="selec3"></span></td>
				</tr>
				<tr>
					<th>地址：</th><td><input class="normal" name="address" type="text" value="<?php echo isset($member['address'])?$member['address']:"";?>" /><label>联系地址</label></td>
				</tr>
				<tr>
					<th>邮编：</th><td><input class="normal" name="zip" type="text" value="<?php echo isset($member['zip'])?$member['zip']:"";?>" empty pattern="zip" alt="格式不正确（6位数字）" /><label>邮政编码</label></td>
				</tr>
				<tr>
					<th>QQ：</th><td><input class="normal" name="qq" type="text" value="<?php echo isset($member['qq'])?$member['qq']:"";?>" empty pattern="qq" alt="格式不正确" /><label>QQ号码</label></td>
				</tr>
				<tr>
					<th>MSN：</th><td><input class="normal" name="msn" type="text" value="<?php echo isset($member['msn'])?$member['msn']:"";?>" /></td>
				</tr>
				<tr>
					<th>经验值：</th><td><input class="normal" name="exp" type="text" value="<?php echo isset($member['exp'])?$member['exp']:"";?>" /></td>
				</tr>
				<tr>
					<th>积分：</th><td><input class="normal" name="point" type="text" value="<?php echo isset($member['point'])?$member['point']:"";?>" /></td>
				</tr>
				<tr>
					<td></td><td><button class="submit" type="submit" onclick="return check()"><span>确 定</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script language="javascript">
function check()
{
	var province = $('#province').val();
	if(province==undefined || province=='')
	{
		alert("请选择省份!");
		return false;
	}
	var city = $("#city").val();
	var area = $("#area").val();
	if(city==undefined || city=='')
	{
		alert("请选择城市!");
		return false;
	}
	if(area==undefined || area=='')
	{
		alert('请选择地区!');
		return false;
	}
}
//城市地区
function select_city(city,style,current)
{
	var arr = city.split(',');
	$.getJSON("<?php echo IUrl::creatUrl("/block/area_child");?>",{aid:arr[0]}, function(json)
	{
		if(style==2)
		{
			var select_html = '<select name="city" id="city" onchange="select_city(this.value,3);">';
			select_html += '<option value="">请选择城市</option>';
			for( a in json)
			{
				if(current == json[a]['area_id'])
					select_html +='<option value="'+json[a]['area_id']+'" selected="selected">'+json[a]['area_name']+'</option>';
				else
					select_html +='<option value="'+json[a]['area_id']+'">'+json[a]['area_name']+'</option>';
			}
			select_html +='</select>';
			$("#selec"+style).html(select_html);
		}
		if(style==3)
		{
			if(json.length>0)
			{
				var select_html = '<select name="area" id="area" onchange="select_city(this.value,4);">';
				select_html += '<option value="">请选择地区</option>';
				for( a in json)
				{
					if(current == json[a]['area_id'])
						select_html +='<option value="'+json[a]['area_id']+'" selected="selected">'+json[a]['area_name']+'</option>';
					else
						select_html +='<option value="'+json[a]['area_id']+'">'+json[a]['area_name']+'</option>';
				}
				select_html +='</select>';
				$("#selec"+style).show();
				$("#selec"+style).html(select_html);
			}
			else
			{
				//if($("#selec"+style).text()=='')
					$("#selec"+style).hide();
			}
		}
	});
}
var formObj = new Form('memberForm');
formObj.init({
	'province':'<?php echo isset($province)?$province:"";?>'
});

select_city('<?php echo isset($province)?$province:"";?>',2,'<?php echo isset($city)?$city:"";?>');
select_city('<?php echo isset($city)?$city:"";?>',3,'<?php echo isset($area)?$area:"";?>');
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
