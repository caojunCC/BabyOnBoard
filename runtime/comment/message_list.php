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
	<div class="position"><span>会员</span><span>></span><span>信息处理</span><span>></span><span>站内消息</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="selectAll('check[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel({form:'message_list',msg:'确定要删除选中的记录吗？'})"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)" onclick="filter();"><button class="operating_btn" type="button"><span class="send">发信</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="250px" />
			<col />
			<col width="150px" />
			<col width="50px" />
			<thead>
				<tr role="head">
					<th>选择</th>
					<th>标题</th>
					<th>内容</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<form action="<?php echo IUrl::creatUrl("/comment/message_del");?>" method="post" name="message_list" onsubmit="return checkboxCheck('check[]','尚未选中任何记录！')">
<div class="content">
	<input type="hidden" name="move_group" value="" />
	<table id="list_table" class="list_table">
		<col width="40px" />
		<col width="250px" />
		<col />
		<col width="150px" />
		<col width="50px" />
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $query = new IQuery("message");$query->page = "$page";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td><input name="check[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
				<td><?php echo isset($item['title'])?$item['title']:"";?></td>
				<td><?php echo isset($item['content'])?$item['content']:"";?></td>
				<td><?php echo isset($item['time'])?$item['time']:"";?></td>
				<td>
					<a href="javascript:void(0)" onclick="delModel({link:'<?php echo IUrl::creatUrl("/comment/message_del/check/$item[id]");?>'})"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" /></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<?php echo $query->getPageBar();?>
</form>



<script language="javascript">
<!--
var js_group = {};
var tpl_group = '<table><tr><td>会员等级：</td><td><select id="removeto"><?php foreach($group as $key => $value){?><option value=<?php echo isset($key)?$key:"";?>><?php echo isset($value)?$value:"";?></option><?php }?></select></td></tr>'+
				'	<tr><td>积分</td><td><input type="text" name="point" value="" /></td></tr>'+
				'</table>';
var content_filter = {};
var tpl_filter =	'<div class="pop_win clearfix" style="width:600px;padding:5px"><form name="form_filter" action="<?php echo IUrl::creatUrl("/comment/message_send/");?>" method="post"><table class="form_table"><col width="80px" /><col width="300px" /><col /><tbody><tr><td class="t_r">标题：</td><td colspan="2"><input class="middle" type="text" name="title" /></td></tr><tr><td valign="top" class="t_r">内容：</td><td colspan="2"><textarea name="content" style="height:120px;"></textarea></td></tr></tbody>'+
					'<tfoot name="filter">'+
					'		<tr name="menu"><td class="t_r">收件人：</td>'+
					'		<td><select class="auto" name="requirement" onchange="addoption()">'+
					'				<option value="c">不筛选则代表所有用户</option>'+
					'				<option value="group">会员等级</option>'+
					'				<option value="username">用户名</option>'+
					'				<option value="truename">姓名</option>'+
					'				<option value="address">地区</option>'+
					'				<option value="mobile">手机</option>'+
					'				<option value="telephone">固定电话</option>'+
					'				<option value="email">Email</option>'+
					'				<option value="zip">邮编</option>'+
					'				<option value="sex">性别</option>'+
					'				<option value="point">经验值</option>'+
					'				<option value="regtime">注册日期</option>'+
					'			</select></td>'+
					'		<td><a class="blue" href="javascript:void(0)" onclick="del_all_option()" >删除所有筛选条件</a></td>'+
					'</tr></tfoot></table></form></div>';
var tpl_option = new Array();
tpl_option['group'] =	'	<tr name="group">'+
						'		<td class="t_r">会员等级</td>'+
						'		<td><select class="auto"  name="group_key"><option value="eq">等于</option><option value="neq">不等于</option></select><select class="auto"  name="group_value"><?php foreach($group as $key => $value){?><option value=<?php echo isset($key)?$key:"";?>><?php echo isset($value)?$value:"";?></option><?php }?></select></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['username'] ='	<tr name="username">'+
						'		<td class="t_r">用户名</td>'+
						'		<td><select class="auto"  name="username_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="username_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['truename'] ='	<tr name="truename">'+
						'		<td class="t_r">姓名</td>'+
						'		<td><select class="auto"  name="truename_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="truename_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['address'] = '	<tr name="address">'+
						'		<td class="t_r">地区</td>'+
						'		<td><select class="auto"  name=""><option value="eq">等于</option><option value="contain">包含</option></select><select class="auto"  name="province" id="province" onchange="select_city(this.value,2)" style="float:left;"><?php $query = new IQuery("areas");$query->where = "parent_id = 0";$items = $query->find(); foreach($items as $key => $item){?><option value=<?php echo isset($item["area_id"])?$item["area_id"]:"";?>><?php echo isset($item["area_name"])?$item["area_name"]:"";?></option><?php }?></select><span id="selec2" style="float:left;"></span><span id="selec3" style="float:left;"></span></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['mobile'] =	'	<tr name="mobile">'+
						'		<td class="t_r">手机</td>'+
						'		<td><select class="auto"  name="mobile_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="mobile_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['telephone'] ='	<tr name="telephone">'+
						'		<td class="t_r">固定电话</td>'+
						'		<td><select class="auto"  name="telephone_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="telephone_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['email']	=	'	<tr name="email">'+
						'		<td class="t_r">Email</td>'+
						'		<td><select class="auto"  name="email_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="email_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['zip']	=	'	<tr name="zip">'+
						'		<td class="t_r">邮编</div>'+
						'		<td><select class="auto"  name="zip_key"><option value="eq">等于</option><option value="contain">包含</option></select><input class="small" type="text" name="zip_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['sex']	=	'	<tr name="sex">'+
						'		<td class="t_r">性别</td>'+
						'		<td><select class="auto"  name="sex"><option value="-1">请选择</option><option value="1">男</option><option value="2">女</option><option value="9">保密</option></select></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['point']	=	'	<tr name="point">'+
						'		<td class="t_r">经验值</td>'+
						'		<td><select class="auto" name="point_key"><option value="gt">大于</option><option value="lt">小于</option><option value="eq">等于</option></select><input class="small" type="text" name="point_value" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';
tpl_option['regtime'] =	'	<tr name="regtime">'+
						'		<td class="t_r">注册日期</td>'+
						'		<td>开始 <input class="small" type="text" name="regtimeBegin" onfocus="WdatePicker()" /> - 截止 <input class="small" type="text" name="regtimeEnd" onfocus="WdatePicker()" style="width:80px;" /></td>'+
						'		<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" onclick="del_option(this)" /></td>'+
						'	</tr>';

function filter()
{
	art.dialog({
		id: 'filter',
		border: false,
		lock:true,
		width:600,
		lock: true,
		title: '发信',
		content: content_filter,
		tmpl: tpl_filter,
		yesFn:function(){
			var obj = $("select[name='requirement'] option");
			var queryurl = '';
			for (var i=1;i<obj.length ;i++)
			{
				if ($(obj[i]).attr('disabled')==true)
				{
					switch ($(obj[i]).val())
					{
						case 'group':
							queryurl += 'group_key='+$("select[name='group_key']").val()+'&group_value='+$("select[name='group_value']").val()+'&';
							break;
						case 'username':
							queryurl += 'username_key='+$("select[name='username_key']").val()+'&username_value='+$(":input[name='username_value']").val()+'&';
							break;
						case 'truename':
							queryurl += 'truename_key='+$("select[name='truename_key']").val()+'&truename_value='+$(":input[name='truename_value']").val()+'&';
							break;
						case 'mobile':
							queryurl += 'mobile_key='+$("select[name='mobile_key']").val()+'&mobile_value='+$(":input[name='mobile_value']").val()+'&';
							break;
						case 'telephone':
							queryurl += 'telephone_key='+$("select[name='telephone_key']").val()+'&telephone_value='+$(":input[name='telephone_value']").val()+'&';
							break;
						case 'email':
							queryurl += 'email_key='+$("select[name='email_key']").val()+'&email_value='+$(":input[name='email_value']").val()+'&';
							break;
						case 'zip':
							queryurl += 'zip_key='+$("select[name='zip_key']").val()+'&zip_value='+$(":input[name='zip_value']").val()+'&';
							break;
						case 'sex':
							queryurl += 'sex='+$("select[name='sex']").val()+'&';
							break;
						case 'point':
							queryurl += 'point_key='+$("select[name='point_key']").val()+'&point_value='+$(":input[name='point_value']").val()+'&';
							break;
						case 'regtime':
							queryurl += 'regtimeBegin='+$(":input[name='regtimeBegin']").val()+'&regtimeEnd='+$(":input[name='regtimeEnd']").val()+'&';
					}
				}
			}
			$("form[name='form_filter']").submit();
			return true;
		},
		noFn:true
	});
}
function del_all_option()
{
	$("tfoot[name='filter']").children().not("tr[name='menu']").each(function(i){
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
function select_city(city,style)
{
	$.getJSON("<?php echo IUrl::creatUrl("/block/area_child");?>",{aid:city}, function(json)
	{
		if(style==2)
		{
			var select_html = '<select name="city" id="city" onchange="select_city(this.value,3);">';
			select_html += '<option value="">请选择城市</option>';
			for( a in json)
			{
				select_html +='<option value="'+json[a]['area_id']+'">'+json[a]['area_name']+'</option>';
			}
			select_html +='</select>';
			$("#selec3").hide();
			$("#selec"+style).html(select_html);
		}else
		{
			var select_html = '<select name="area" id="area">';
			select_html += '<option value="">请选择地区</option>';
			for( a in json)
			{
				select_html +='<option value="'+json[a]['area_id']+'">'+json[a]['area_name']+'</option>';
			}
			select_html +='</select>';
			$("#selec"+style).show();
			$("#selec"+style).html(select_html);
		}
	});
}
//-->
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
