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
	<div class="headbar">
    <div class="position"><span>Mastercode</span><span>></span><span>hospital</span><span>></span><span>hospital_list</span></div>
    <div class="operating">
        <a href="javascript:void(0)" onclick="event_link('<?php echo IUrl::creatUrl("/mastercode/hospital_edit");?>')"><button class="operating_btn" type="button"><span class="addition">Add New Hospital</span></button></a>
        <a href="javascript:void(0)" onclick="selectAll('id[]');"><button class="operating_btn" type="button"><span class="sel_all">Choose all</span></button></a>
        <a href="javascript:void(0)" onclick="delModel();"><button class="operating_btn" type="button"><span class="delete">Delete all</span></button></a>
    </div>
    <div class="field">
        <table class="list_table">
            <col width="50px" />
            <col width="30%" />
            <col width="30%" />
            <col width="10%" />
            <col width="10%" />
    	    <col width="10%" />
            <col />
            <thead>
                <tr>
                    <th class="t_c">Choose</th>
                    <th>Hospital Name</th>
                    <th>Adress</th>
                    <th>Provice</th>
                    <th>Zipcode</th>
                    <th>编辑&nbsp;&nbsp;&nbsp;删除</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="content">
    <form action="<?php echo IUrl::creatUrl("/mastercode/hospital_del");?>" method="post" name="hospital">
        <table class="list_table">
            <col width="40px" />
            <col width="30%" />
            <col width="30%" />
            <col width="10%" />
            <col width="10%" />
            <col width="10%" />
            <col />
            <tbody>
           <?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
             	<?php $query = new IQuery("hospital_detail");$query->page = "$page";$query->pagesize = "20";$items = $query->find(); foreach($items as $key => $item){?>
             	  <tr>
					<td class="t_c"><input type="checkbox" name="id[]" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
					<td><?php echo isset($item['hospital_name_en'])?$item['hospital_name_en']:"";?></td>
					<td><?php echo isset($item['hospital_adress_en'])?$item['hospital_adress_en']:"";?></td>
					<td><?php echo isset($item['hospital_province_en'])?$item['hospital_province_en']:"";?></td>
					<td><?php echo isset($item['hospital_zipcode'])?$item['hospital_zipcode']:"";?></td>
					<td>
                        <a href='<?php echo IUrl::creatUrl("/mastercode/hospital_edit/id/");?><?php echo isset($item['id'])?$item['id']:"";?>'><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" alt="编辑" title="编辑" /></a>
                        <a href='javascript:void(0)' onclick="delModel({link:'<?php echo IUrl::creatUrl("/mastercode/hospital_del/id/$item[id]");?>'});"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title="删除" /></a>
                    </td>
				   </tr>
				    <tr>      
					    <td></td>
						<td><?php echo isset($item['hospital_name_ch'])?$item['hospital_name_ch']:"";?></td>
						<td><?php echo isset($item['hospital_adress_ch'])?$item['hospital_adress_ch']:"";?></td>
						<td><?php echo isset($item['hospital_province_ch'])?$item['hospital_province_ch']:"";?></td>
						<td></td>
						<td></td>
                    </tr>
				<?php }?>

            </tbody>
        </table>
    </form>
</div>
<?php echo $query->getPageBar();?>

	</div>
	<div id="separator"></div>
</div>

</body>
</html>
