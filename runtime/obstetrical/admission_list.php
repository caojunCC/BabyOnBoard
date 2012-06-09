<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/board/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script charset="UTF-8" src="/board/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/board/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/board/runtime/systemjs/autovalidate/validate.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/bob2_anime.gif";?>" width="70" height="70" /></a>
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
	<script type='text/javascript'>
function render_data(selector)
{
	var temp =selector.options[selector.options.selectedIndex].value;
	//清除原有的数据
	$('#list_table>tbody').remove();
	//Ajax获取填充的数据
	var html="";
	var i=0;
	$.ajax({
		type: "POST",
		url : "<?php echo IUrl::creatUrl("/obstetrical/obstetrical_list_data");?>",
		data: "id="+temp,
		dataType: "json",
		success: function(data){
			if(data)
			{
				//循环写出表格
				for(i=0;i< data.length;i++)
				{
					html +="<tr>"+
					"<td><input type='checkbox' name='id[]' value="+data[i].id+" /></td>"+
					"<td>"+data[i].name+"</td>"+
					"<td>"+data[i].hospital+"</td>"+
					"<td>"+data[i].date+"</td>"+
					"<td>"+
					 "<a href='<?php echo IUrl::creatUrl("/obstetrical/admission_edit/id/");?>"+data[i].id+"'><img class=\"operator\" src=\"<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_check.gif";?>\" alt=\"查看\" title=\"查看\" /></a>"+
				//	 "<a href='javascript:void(0)' onclick=\"delModel({link:'<?php echo IUrl::creatUrl("/obstetrical/obstetrical_basic_del/id/");?>"+data[i].id+"',msg:'是否删除？'});\""+"><img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' /></a>"+
					"</td></tr>" ;
				}
				$('#list_table').append(html);
			}
			else
			{
				alert('数据为空');
			}
				
		}
	});
	
}

window.onload = selector_all_ajax;

function selector_all_ajax()
{
	$('#selector_all').get(0).selectedIndex = 1;
	var temp =$('#selector_all').val();
	//清除原有的数据
	$('#list_table>tbody').remove();
	//Ajax获取填充的数据
	var html="";
	var i=0;
	$.ajax({
		type: "POST",
		url : "<?php echo IUrl::creatUrl("/obstetrical/obstetrical_list_data");?>",
		data: "id="+temp,
		dataType: "json",
		success: function(data){
			if(data)
			{
				//循环写出表格
				for(i=0;i< data.length;i++)
				{
					html +="<tr>"+
					"<td><input type='checkbox' name='id[]' value="+data[i].id+" /></td>"+
					"<td>"+data[i].name+"</td>"+
					"<td>"+data[i].hospital+"</td>"+
					"<td>"+data[i].date+"</td>"+
					"<td>"+
					 "<a href='<?php echo IUrl::creatUrl("/obstetrical/admission_edit/id/");?>"+data[i].id+"'><img class=\"operator\" src=\"<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_check.gif";?>\" alt=\"查看\" title=\"查看\" /></a>"+
				//	 "<a href='javascript:void(0)' onclick=\"delModel({link:'<?php echo IUrl::creatUrl("/obstetrical/obstetrical_basic_del/id/");?>"+data[i].id+"',msg:'是否删除？'});\""+"><img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' /></a>"+
					"</td></tr>" ;
				}
				$('#list_table').append(html);
			}
			else
			{
				alert('数据为空');
			}
				
		}
	});
}
</script>

<div class="headbar">
	<div class="position"><span>Obstetrical</span><span>></span><span>Admission Record</span><span>></span><span>list</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="event_link('<?php echo IUrl::creatUrl("/obstetrical/obstetrical_basic_edit");?>')"><button class="operating_btn" type="button"><span class="addition">Add New Obstetrical</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('id[]');"><button class="operating_btn" type="button"><span class="sel_all">Choose All</span></button></a>
		<a href="javascript:void(0)" onclick="delModel();"><button class="operating_btn" type="button"><span class="delete">Delete All</span></button></a>
		<a>
		Hospital:
		<select width='50px' onchange="render_data(this);" id='selector_all'>
			<option value='-1'>*Please choose one</option>
			<?php if($this->role_hospital_id == 0){?>
				<option value='0'>All</option>		
			<?php }?>
			<?php foreach($this->role_hospital_data as $key => $item){?>
				<option value='<?php echo isset($item['id'])?$item['id']:"";?>' ><?php echo isset($item['hospital_name_en'])?$item['hospital_name_en']:"";?></option>
			<?php }?>
			
		</select>
		</a>
	</div>
	<div class="field">
		<table class="list_table" id ='list_table'>
			<col width="50px" />
			<col width="250px" />
			<col width="250px" />
			<col width="250px" />
			<col width="100px" />
			<col />
			<thead>
				<tr>
					<th>Choose</th>
					<th>Obstetrical Name</th>
					<th>Hospital</th>
					<th>Date</th>
					<th>Operate</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
	<form name='admin_list' method='post' action='<?php echo IUrl::creatUrl("/hospital/admin_del");?>'>
		<table id="list_table" class="list_table">
			<col width="50px" />
			<col width="250px" />
			<col width="250px" />
			<col width="250px" />
			<col width="100px" />
			<col />
			<tbody>
			</tbody>
		</table>
	</form>
</div>
	</div>
	<div id="separator"></div>
</div>

</body>
</html>
