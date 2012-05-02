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
	<script type='text/javascript' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/event.js";?>' charset="UTF-8"></script>
<div class="headbar">
	<div class="position"><span>营销</span><span>></span><span>销售统计</span><span>></span><span>注册用户统计</span></div>
	<form action='<?php echo IUrl::creatUrl("/market/amount");?>' method='post'>
	<div class="operating">
		<div class="search f_l">
        <script charset="UTF-8" src="/iwebshop/runtime/systemjs/my97date/wdatepicker.js"></script>

        从 <input type="text" name='start' class="Wdate" id="date_start" pattern='date' onFocus="WdatePicker()" onblur="FireEvent(this,'onchange')"/>到 <input type="text" name='end' pattern='date' class="Wdate" id="date_end" onFocus="WdatePicker()" onblur="FireEvent(this,'onchange')"/><button class="btn"><span >查 询</span></button>
		</div>
	</div>
    </form>
</div>
<div>
<div class="content_box">
	<h3>人均消费统计：</h3>	
	<div class='cont'>
	<ul>
	<li>人均消费统计，更清楚了解每月用户对销售产品消费情况，更清楚的了解销售产品处在什么趋势，为你下一步的营销计划做出更好的判定！</li>
	</ul>
	</div>
</div>
<div class='content_box'><div id="myChart"></div></div>
<?php if($this->numbers!==null){?>
<?php $fc=new FlashChart(IUrl::creatUrl("").'chart/',"100%",320);$info=array("title"=>'人均消费统计','numbers'=>$this->numbers,'dates'=>$this->dates,'max'=>$this->max,'steps'=>$this->steps);$fc->setChart("chart/templatechart/amount.txt",$info);?>
<?php }else{?>
<script type='text/javascript'>
$('#myChart').css('color','red').text('没有你要查询的数据!');
</script>
<?php }?>
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
