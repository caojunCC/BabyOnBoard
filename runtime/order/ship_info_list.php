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
	<div class="position">订单<span>></span><span>快递单管理</span><span>></span><span>发货信息管理</span></div>
	<div class="operating">
		<a href="javascript:void(0)"><button class="operating_btn" type="button" onclick="location.href='<?php echo IUrl::creatUrl("/order/ship_info_edit");?>'"><span class="addition">添加发货信息</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('id[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel();"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button>
		<a href="javascript:;"><button class="operating_btn" type="button" onclick="location.href='<?php echo IUrl::creatUrl("/order/recycle_list");?>'"><span class="recycle">回收站</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="250px" />
			<col />
			<thead>
				<tr>
					<th class="t_c">选择</th>
					<th>发货点名称</th>
					<th>地区</th>
					<th>地址</th>
					<th>邮编</th>
					<th>电话</th>
					<th>发货人</th>
					<th>默认</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
<form action="<?php echo IUrl::creatUrl("/order/ship_info_del");?>" method="post" name="ship_list">
	<table class="list_table">
		<col width="40px" />
		<col width="250px" />
		<col />
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $id = '';$name = '';?>
			<?php $query = new IQuery("merch_ship_info");$query->order = "id desc";$query->page = "$page";$query->where = "is_del = '1'";$items = $query->find();?>
			<?php foreach($items as $key => $item){?><?php $name .= $item['province'].','.$item['city'].','.$item['area'].',';$id .= $item['id'].',';?><?php }?>
			<?php $name = substr($name,0,strlen($name)-1);$id = substr($id,0,strlen($id)-1)?>
			<?php foreach($items as $key => $item){?>
			<tr>
				<td class="t_c"><input name="id[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
				<td><?php echo isset($item['ship_name'])?$item['ship_name']:"";?><input type="hidden" id="s<?php echo isset($item['id'])?$item['id']:"";?>" value=",<?php echo isset($item['province'])?$item['province']:"";?>,<?php echo isset($item['city'])?$item['city']:"";?>,<?php echo isset($item['area'])?$item['area']:"";?>,"/></td>
				<td id="selec<?php echo isset($item['id'])?$item['id']:"";?>"><?php echo isset($item['province'])?$item['province']:"";?>-<?php echo isset($item['city'])?$item['city']:"";?>-<?php echo isset($item['area'])?$item['area']:"";?></td>
				<td><?php echo isset($item['address'])?$item['address']:"";?></td>
				<td><?php echo isset($item['postcode'])?$item['postcode']:"";?></td>
				<td><?php if($item['mobile']!=""){?><?php echo isset($item['mobile'])?$item['mobile']:"";?><?php }else{?><?php echo isset($item['telphone'])?$item['telphone']:"";?><?php }?></td>
				<td><?php echo isset($item['ship_user_name'])?$item['ship_user_name']:"";?></td>
				<td><?php if($item['is_default']==1){?><a style="color:red" href="<?php echo IUrl::creatUrl("/order/ship_info_default/id/$item[id]/default/0");?>" >取消默认</a><?php }else{?><a class="blue" href="<?php echo IUrl::creatUrl("/order/ship_info_default/id/$item[id]/default/1");?>">设为默认</a><?php }?></td>
				<td>
					<a href="<?php echo IUrl::creatUrl("/order/ship_info_edit/sid/$item[id]");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="编辑" /></a>
					<a href="javascript:void(0)" onclick="delModel({link:'<?php echo IUrl::creatUrl("/order/ship_info_del/id/$item[id]");?>'})"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" /></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	</form>
</div>
<?php echo $query->getPageBar();?>

<script type="text/javascript">
function ship_defalut(id)
{
	$.get("<?php echo IUrl::creatUrl("/order/ship_info_default");?>",{sid:id}, function(data)
		{
			if(data!='')
			{
				var arr = data.split('|');
				if(arr[0]=='1')
				{
					if(arr[1]!='')
					{
						var brr= arr[1].split(',');
						for(var i=0;i<brr.length;i++){
							$('#de'+brr[i]).html('设为默认');
							$('#de'+brr[i]).removeClass('red');
						}
					}
					$('#de'+id).html('取消默认');
					$('#de'+id).addClass('red');
				}
				if(arr[0]=='2')
				{
					$('#de'+id).removeClass('red');
					$('#de'+id).html('设为默认');
				}
			}
		});
}
<?php if($name!=''){?>
		$.getJSON("<?php echo IUrl::creatUrl("/system/area_sub_child");?>",{aid:"<?php echo isset($name)?$name:"";?>"}, function(json)
		{
			var arr_name = new Array();
			var arr_id  = new Array();
			for(var i in json)
			{
				arr_name[i] = json[i]['area_name'];
				arr_id[i] = json[i]['area_id'];
			}
			var sid = '<?php echo isset($id)?$id:"";?>';
			var arr = sid.split(",");
			for(var j=0;j<arr.length;j++)
			{
				var va = $("#s"+arr[j]).val();
				var name = '';
				for(var i=0;i<arr_id.length;i++)
				{
					var id = ','+arr_id[i]+',';
					if(va.indexOf(id) >=0)
					{
						name += arr_name[i]+'-';
					}
				}
				name = name.substring(0,name.length-1);
				$("#selec"+arr[j]).html(name);
			}
		});
<?php }?>
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
