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
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/editor/kindeditor-min.js"></script>
<div class="headbar">
	<div class="position"><span>会员</span><span>></span><span>邮件短信设置</span><span>></span><span>邮件订阅</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="filter();"><button class="operating_btn" type="button"><span class="remove">发送邮件</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('id[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel({form:'notify_list',msg:'确定要删除选中的记录吗？'})"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)" onclick="location.reload()"><button class="operating_btn" type="button"><span class="refresh">刷新</span></button></a>
		<a href="javascript:void(0)" onclick="exportCSV();return false;"><button class="operating_btn" type="button"><span title="不选择则导出所有" class="download">导出为CSV</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col />
			<thead>
				<tr role="head">
					<th class="t_c">选择</th>
					<th sort="true">email</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<form action="<?php echo IUrl::creatUrl("/message/registry_del");?>" method="post" name="notify_list" onsubmit="return checkboxCheck('id[]','尚未选中任何记录！')">
<div class="content" style="position:relative;">
	<table id="list_table" class="list_table">
		<col width="40px" />
		<col />
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $query = new IQuery("email_registry");$query->order = "id desc";$query->page = "$page";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td class="t_c"><input class="check_ids" name="id[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
				<td><?php echo isset($item['email'])?$item['email']:"";?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<?php echo $query->getPageBar();?>
</form>
<script language="javascript">
function sendMail()
{
	var ids = getArray('id[]','checkbox')
	if(ids.length>0)
	{
		art.dialog({id:'message'}).content('<p class="t_c"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/loading.gif";?>" /><br />正在发送邮件，请稍候......</p>');
		$.getJSON('<?php echo IUrl::creatUrl("/message/notify_send/");?>',{notifyid:ids},function(c){
			art.dialog({id:'message'}).close();
			if(c.isError == false)
			{
				art.dialog({
					content: '总共发送邮件：'+c.count+'条<br />成功发送：'+c.succeed+'条<br />发送失败：'+c.failed+'条',
					icon: 'alert',
					lock: true,
					yesFn: function(){
						location.reload();
						return true;
					}
				});
			}
			else
			{
				alert(c.message);
			}
		});
	}
	else
	{
		alert("您尚未选中任何记录！");
	}
}

function exportCSV()
{
	var ids=$(".check_ids:checked");
	var data=[];
	for(var i=0;i<ids.length;i++)
	{
		data.push(ids[i].value);
	}
	ids = data.join(',');
	window.location = "<?php echo IUrl::creatUrl("/message/registry_export/ids/@ids@");?>".replace("@ids@",ids);
}

var js_group = {};
var tpl_group = '<table><tr><td>会员等级：</td><td><select id="removeto"><?php foreach($group as $key => $value){?><option value=<?php echo isset($key)?$key:"";?>><?php echo isset($value)?$value:"";?></option><?php }?></select></td></tr>'+
				'	<tr><td>积分</td><td><input type="text" name="point" value="" /></td></tr>'+
				'</table>';

var content_filter = {};

var tpl_filter =	'<div class="pop_win clearfix" style="width:640px;padding:5px"><form name="form_filter" action="<?php echo IUrl::creatUrl("/message/registry_message_send");?>" method="post"><table class="form_table"><col width="80px" /><col width="300px" /><col /><tbody><tr><td class="t_r">标题：</td><td colspan="2"><input class="middle" type="text" name="title" id="form_title" value="<?php echo $this->tpl["title"];?>" /></td></tr><tr><td valign="top" class="t_r">内容：</td><td colspan="2"><input type="hidden" name="ids" id="form_ids" /><textarea id="content" name="content" style="height:320px;"></textarea></td></tr></tbody>'+
					'</table></form></div>';
function filter()
{
	art.dialog({
		id: 'filter',
		border: false,
		lock:true,
		width:650,
		lock: true,
		title: '发信',
		content: tpl_filter,
		initFn:function(){KE.create('content')},
		closeFn:function(){KE.remove('content')},
		yesFn:function()
		{
			KE.sync("content");
			art.dialog({'id':'tmpTan',content:"正在发送，请稍候......" , yesFn:false,noFn:false,title:false,lock:true});
			var title = $("#form_title").val();
			var content = $("#content").val();
			var ids = getArray('id[]','checkbox');
			ids = ids.join(',');
			$.post("<?php echo IUrl::creatUrl("/message/registry_message_send/");?>" , {'title':title , 'content':content , 'ids':ids} , function(c){
				alert("发送完毕！");
				art.dialog({'id':"tmpTan"}).close();
			});
		},
		noFn:true
	});
}
KE.init({
	id : 'content',
	width:500,
	imageUploadJson:'<?php echo IUrl::creatUrl("/block/upload_img_from_editor");?>',
	afterCreate:function(){KE.html('content','<?php echo str_replace(array("\n","\r") , "" , addslashes($this->tpl['content']) ) ;?>');},
	items : ['fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
			'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', 'image', 'link']

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
