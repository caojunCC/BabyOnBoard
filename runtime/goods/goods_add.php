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
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/my97date/wdatepicker.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/swfupload.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/swfupload.queue.js";?>"></script>
<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/fileprogress.js";?>"></script>
<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/handlers.js";?>"></script>
<script type="text/javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/event.js";?>"></script>
<script type="text/javascript">
	var swfu;
	window.onload = function () {
		swfu = new SWFUpload({
			// Backend Settings
			upload_url: "<?php echo IUrl::creatUrl("/goods/goods_img_upload/admin_name/$admin_name/admin_pwd/$admin_pwd");?>",
			post_params: {"PHPSESSID": "NONE"},

			file_size_limit : "2 MB",	// 2MB
			file_types : "*.jpg;*.jpge;*.png;*.gif",
			file_types_description : "JPG Images",
			file_upload_limit : "0",
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,
			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,

			// Button Settings
			button_placeholder_id : "upload",
			button_width: 50,
			button_height: 21,
			button_text : '浏览...',
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,

			// Flash Settings
			flash_url : "<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/swfupload.swf";?>",

			custom_settings : {
				upload_target : "show"
			},
			// Debug Settings
			debug: false
		});
	};
	function show_link(img)
	{
		art.dialog.open('<?php echo IUrl::creatUrl("/block/goods_photo_link/?img=");?>'+img, {
			id:'goods_photo_link',
			width:'700px',
			height:'160px',
			lock: true,
		    title: '图片链接'
		});
	}
	function del_img(id)
	{
		//删除数组元素.
		Array.prototype.remove=function(dx)
		{
		    if(isNaN(dx)||dx>this.length){return false;}
		    for(var i=0,n=0;i<this.length;i++)
		    {
		        if(this[i]!=this[dx])
		        {
		            this[n++]=this[i]
		        }
		    }
		    this.length-=1
		}
		//在数组中获取指定值的元素索引
		Array.prototype.getIndexByValue= function(value)
		{
		    var index = -1;
		    for (var i = 0; i < this.length; i++)
		    {
		        if (this[i] == value)
		        {
		            index = i;
		            break;
		        }
		    }
		    return index;
		}
		var photo_name = $('#photo_name').val();
		photo_name = photo_name.substring(0,photo_name.length-1);
		var arr = photo_name.split(',');
		var key = 0;
		for(var i=0;i<arr.length;i++){
			if(arr[i].indexOf(id)>0){
				key = i;
			}
		}
		arr.remove(key);
		if(arr.length>0)
		{
			//如果没有全部删除则不为空
			$('#photo_name').val(arr.join(',')+',')
			$("#a"+id).remove();
			var focus_photo = $('#focus_photo').val();
			if(focus_photo.indexOf(id)>0)
			{
				var photo_ar = arr.join(',');
				if(photo_ar!='')
				{
					p_arr = photo_ar.split(',');
					var head = p_arr[0].substring(0,p_arr[0].indexOf('.'));
					var footer = p_arr[0].substring(p_arr[0].indexOf('.'));
					var thumb = $('#thumb').val();
					$('#focus_photo').val(head+footer);
					$('img').each(function(){
						var src = $(this).attr("src");
						if(src.indexOf(head+thumb+footer)>0)
						{
							$(this).addClass('current');
							return;
						}
					});
				}
			}
		}else{
			//如果图片全部删除则值为空
			$('#photo_name').val("");
			$('#focus_photo').val("");
			$("#a"+id).remove();
		}
	}
	function focus_img(little,obj)
	{
		$('#focus_photo').val(little);
		$("img[name='img_name']").removeClass('current');
		obj.className = 'current';
	}
</script>
<style>
.wordBox{display:inline-block;padding:3px;background:#ddd;margin:5px;color:#000;font-size:12px;}
.wordBoxButton{background:#999;cursor:pointer;padding:2px;margin:2px;border-radius:3px;}
.wordBoxButton:hover{background:#bbb}
</style>

<div class="headbar clearfix">
	<div class="position"><span>商品</span><span>></span><span>商品管理</span><span>></span><span>商品添加</span></div>
	<ul class="tab" name="menu1">
		<li id="li_1" class="selected"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('1')">商品信息</a></li>
		<li id="li_2"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('2')">描述</a></li>
		<li id="li_3"><a href="javascript:void(0)" hidefocus="true" onclick="select_tab('3')">营销选项</a></li>
	</ul>
</div>

<div class="content_box">
	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/goods/goods_save");?>" name="ModelForm" method="post">
			<div id="table_box_1">
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>商品名称：</th>
					<td><input class="normal" id="goods_name" name="goods_name" type="text" value="" pattern="required" alt="商品名称不能为空" /><label>*</label>
						<input name="goods_id" type="hidden" value="<?php echo isset($goods_id)?$goods_id:"";?>" />
						<button class='submit' type="button" onclick="art.dialog.prompt('请输入关键词',function(data){addTagWord(data);});"><span>添加关键词</span></button>
					</td>
				</tr>
				
					<tr id="trTagWord" style="display:none;">
						<th>关键词</th>
						<td>
							<div id="tagWord"></div>
						</td>
					</tr>
				<tr>
					<th>商品货号：</th>
					<td><input class="normal" id="goods_no" name="goods_no" type="text" value=""/><label>大小写字母、数字、横线</label></td>
				</tr>
				<tr>
					<th>所属分类：</th>
					<td>
						<ul class="select">
						<?php foreach($category as $key => $value){?>
						<li><label><input type="checkbox" value="<?php echo isset($value['id'])?$value['id']:"";?>" name="goods_category[]" onclick="select_mode(this.value)"/><?php echo isset($value['name'])?$value['name']:"";?></label></li>
						<?php }?>
						</ul>
					</td>
				</tr>

<script type="text/javascript">
function select_mode(va)
{
	var box = document.getElementsByName('goods_category[]');
	var frist = '0';
	if(box.length>0)
	{
		for (var i=0;i<box.length;i++ ){
		  if(box[i].checked){
		    if(frist=='0')
		    {
			  frist = box[i].value;
		    }
		    if(box[i].value==va)
		    {
		    	frist = va;
		    }
		  }
		}
	}
	$.get("<?php echo IUrl::creatUrl("/goods/model_init");?>",{'cid':frist}, function(data)
	{
		var html = '<option value="0" selected >通用类型 </option>';
		if(data!='')
		{
			<?php $query = new IQuery("model");$items = $query->find(); foreach($items as $key => $item){?>
			if(data==<?php echo isset($item['id'])?$item['id']:"";?>)
			{
				html += '<option value="'+<?php echo isset($item['id'])?$item['id']:"";?>+'" selected>'+"<?php echo isset($item['name'])?$item['name']:"";?>"+'</option>';
			}else{
				html += '<option value="'+<?php echo isset($item['id'])?$item['id']:"";?>+'">'+"<?php echo isset($item['name'])?$item['name']:"";?>"+'</option>';
			}
			<?php }?>
			$('#goods_model').html(html);
			//设置默认属性
			select_attr(data);
		}
	});
}
function select_attr(va)
{
	$.getJSON("<?php echo IUrl::creatUrl("/goods/attribute_init");?>",{'mid':va}, function(json)
	{
		var pro_va = '';
		var attribute_id = '';
		for(a in json){
			var attri_vaa = json[a]['value'];
			var attri_arr = attri_vaa.split(',');
			var selec = '';
			if(json[a]['type']==1)
			{
				for(var i=0;i<attri_arr.length;i++)
				{
					selec += '<label class="attr"><input type="radio" name="attri'+json[a]['id']+'" value="'+attri_arr[i]+'"/>'+attri_arr[i]+'</label>';
				}
			}
			if(json[a]['type']==2)
			{
				for(var i=0;i<attri_arr.length;i++)
				{
					selec += '<label class="attr"><input type="checkbox" name="attri'+json[a]['id']+'[]" value="'+attri_arr[i]+'"/>'+attri_arr[i]+'</label>';
				}
			}
			if(json[a]['type']==3)
			{
				selec = '<select class="auto" name="attri'+json[a]['id']+'">';
				selec += '<option value="">请选择</option>';
				for(var i=0;i<attri_arr.length;i++)
				{
					selec += '<option value="'+attri_arr[i]+'">'+attri_arr[i]+'</option>';
				}
				selec += '</select>';
			}
			if(json[a]['type']==4)
			{
				selec += '<input type="text" name="attri'+json[a]['id']+'" value="'+json[a]['value']+'"/>';
			}
			pro_va += '<tr><th>'+json[a]['name']+'</th><td class="non">'+selec+'</td></tr>';
			attribute_id += json[a]['id']+',';
		}
		$('#properties').show();
		$('#propert_table').html(pro_va);
		$('#attribute_ids').val(attribute_id.substring(0,attribute_id.length-1));
	});
}
</script>
				<tr>
					<th>商品模型：</th><td><select class="auto" name="goods_model" id="goods_model" onchange="select_attr(this.value)">
					<option value="0">通用类型 </option>
					<?php $query = new IQuery("model");$items = $query->find(); foreach($items as $key => $item){?>
					<option value="<?php echo isset($item['id'])?$item['id']:"";?>"><?php echo isset($item['name'])?$item['name']:"";?></option>
					<?php }?>
					</select></td>
				</tr>
				<tr>
					<th>商品推荐类型：</th>
					<td>
					<label class="attr"><input name="goods_commend[]" type="checkbox" value="1" />最新商品</label>
					<label class="attr"><input name="goods_commend[]" type="checkbox" value="2" />特价商品</label>
					<label class="attr"><input name="goods_commend[]" type="checkbox" value="3" />热卖排行</label>
					<label class="attr"><input name="goods_commend[]" type="checkbox" value="4" />推荐商品</label>
					</td>
				</tr>
				<tr>
					<th>商品品牌：</th><td><select class="auto" name="goods_brand">
					<option value="0">请选择</option>
					<?php $query = new IQuery("brand");$items = $query->find(); foreach($items as $key => $item){?>
					<option value="<?php echo isset($item['id'])?$item['id']:"";?>"><?php echo isset($item['name'])?$item['name']:"";?></option>
					<?php }?>
					</select></td>
				</tr>
				<tr>
					<th>是否上架：</th><td>
						<label class='attr'><input type="radio" name="goods_status" value="0" checked> 是</label>
						<label class='attr'><input type="radio" name="goods_status" value="2"> 否</label>
					</td>
				</tr>
				<tr>
					<th>销售价格：</th><td><input class="small" name="sell_price" type="text" value="" pattern="float" empty alt="请输入浮点型数字"/><label></label></td>
				</tr>
				<tr>
					<th>市场价格：</th><td><input class="small" name="market_price" type="text" value="" pattern="float" empty alt="请输入浮点型数字"/><label></label></td>
				</tr>
				<tr>
					<th>库存：</th><td><input class="small" name="store_nums" id="store_nums" type="text" value="100" pattern="int" alt="请输入整数型数字"/><label></label></td>
				</tr>
				<tr>
					<th>重量：</th><td><input class="small" name="weight" type="text" value="" pattern="float" empty alt="请输入浮点型数字"/><span>克(g)</span><label></label></td>
				</tr>
				<tr>
					<th>积分：</th><td><input class="small" name="point" id="point" type="text" empty pattern="int" value="0" alt="输入的积分有误!"/><label></label></td>
				</tr>
				<tr>
					<th>排序：</th><td><input class="small" name="sort" id="sort" type="text" pattern="int" empty value="99" alt="请输入数字!"/><label></label></td>
				</tr>
				<tr>
					<th>计量单位：</th><td><input class="small" name="store_unit" type="text" value="" /></td>
				</tr>
				<tr>
					<th>经验值：</th><td><input class="small" name="exp" type="text" pattern="int" empty value="" alt="请输入数字!"/></td>
				</tr>
				<tr><input type="hidden" name="photo_name" id="photo_name" value=""/><input type="hidden" name="focus_photo" id="focus_photo" value=""/>
					<input type="hidden" name="thumb" id="thumb" value=""/>
					<th>产品相册：</th><td><input class="middle" name="" type="text" /><div class="upload_btn"><span id="upload"></span></div><label>可以上传多张图片。</label></td>
				</tr>
				<tr>
					<td></td><td id="show"></td>
				</tr>
				<tr>
					<td></td>
					<td id="show_list"></td>
				</tr>
				<tr>
					<th>规格：</th><td><button class="btn" name="goods_spec" type="button" onclick="selSpec()"><span class="add">添加规格</span></button></td>
				</tr>
				<tr id="spec_tr" style="">
					<th></th>
					<td><input type="hidden" id="spec_va" name="spec_va" value=""/><input type="hidden" id="member_ids" name="member_ids" value="<?php echo isset($this->ids)?$this->ids:"";?>"/>
					<div class="con">
						<table class="border_table">
							<thead id="head_table"></thead>
							<tbody id="spec_table"></tbody>
						</table>
						<div id="member_para"></div>
					</div>
					</td>
				</tr>
				<tr id="properties" style="display:none">
					<th>扩展属性：</th>
					<td><input type="hidden" name="attribute_ids" id = "attribute_ids" value=""/>
					<table class="border_table" id="propert_table">
					</table>
					</td>
				</tr>
			</table>

<script type='text/javascript'>
function group(m,n)
{
    var tem = new Array();
    var num = 0;
    for(var i=0;i<m.length;i++)
    {
        for(var j=0;j<n.length;j++)
        {
            tem[num++] =m[i]+'|'+n[j];
        }
    }
    return tem;
}
//添加规格
function selSpec()
{
	var id = $('#goods_model').val();
	var tempUrl = '<?php echo IUrl::creatUrl("/goods/search_spec/mid/@mid@/mark/0");?>';
	tempUrl = tempUrl.replace('@mid@',id);
	art.dialog.open(tempUrl,{
		id:'alert_goods',
		width:'700px',
		height:'395px',
	    title: '添加规格值',
	    yesFn: function(iframeWin, topWin){
	        // iframeWin: 对话框iframe内容的window对象
	        // topWin: 对话框所在位置的window对象
	        var form = iframeWin.document.getElementById('list'),
	        id = iframeWin.$('#spec_id').val(),
	        iden = iframeWin.$('#iden').val();
            if(id != undefined)
	        {
    	        id = id.substring(0,id.length-1);
    	        var arr_id = id.split(',');
				var arr = new Array();
				//获得规格的名字
				var grr = new Array();
				//拆分字符串，循环得到规格的值
				var flag = 0;
				var j=0;
				for(var i=0;i<arr_id.length;i++){
					var spec = iframeWin.$('#spec'+arr_id[i]).val();
					if(spec!='' && spec != undefined){
						arr[j] = new Array();
						spec = spec.substring(0,spec.length-1);
						var brr = spec.split('|');
						flag =1;
						arr[j] = brr;
						//获得规格的名字，存入数组
						grr[j] = '';
						if(brr.length>0)
						{
							var spec_rr = new Array();
							spec_rr = brr[0].split(',');
							grr[j] = spec_rr[3];
						}
						j++;
					}
				}
				if(flag==0){
					alert("请选择规格!");
			        return false;
				}
				//将得到的规格数组进行组合
				var item = new Array();
				switch (arr.length)
				{
					case 1:item = arr[0];break;
					case 2:item = group(arr[0],arr[1]);break;
					default:
						item = group(arr[0],arr[1]);
						for(var i=2;i<arr.length;i++){
							item=group(item,arr[i]);
						}
						break;
				}
				//生成表头文件
				var head = '<tr><td>货号</td>';
				for(var i=0;i<arr.length;i++){
					if(grr[i]!='')
					{
						head+='<td>'+grr[i]+'</td>';
					}
					else
					{
						head+='<td>规格'+(i+1)+'</td>';
					}
				}
				head+='<td>库存</td><td>市场价格</td><td>销售价格</td><td>成本价格</td><td>重量</td><td>操作</td></tr>';
				$('#head_table').html(head);
				//生成html添加到相关位置
				var html = '';
				var spec_va = '';
				for(var i=0;i<item.length;i++){
					html+='<tr id="tr'+i+'"><td><input type="text" name="goods_no'+i+'" id="goods_no'+i+'" class="middle"/></td>';
					var crr = item[i].split('|');
					for(var j=0;j<crr.length;j++){
						var drr = crr[j].split(',');
						if(drr[2]==1)
						{
							html +='<td>'+drr[1]+'<input type="hidden" name="spec'+i+drr[0]+'" value="'+drr[1]+'"/></td>';
						}
						else
						{
							html +='<td><img src="<?php echo IUrl::creatUrl("")."";?>'+drr[1]+'" class="img_border" width=\'30px\' height=\'30px\'"/><input type="hidden" name="spec'+i+drr[0]+'" value="'+drr[1]+'"/></td>';
						}
					}
					html +='<td><input type="text" name="store_nums'+i+'" id="store_nums'+i+'" pattern="int" value="0" class="tiny"/></td>';
					html +='<td><input type="text" name="market_price'+i+'" id="market_price'+i+'" pattern="float" empty class="tiny"/></td>';
					html +='<td><input type="text" name="sell_price'+i+'" id="sell_price'+i+'" pattern="float" empty class="tiny"/>&nbsp;&nbsp;<button class="btn" name="goods_spec" type="button" onclick="memPrice('+i+')"><span class="add">会员价格</span></button></td>';
					html +='<td><input type="text" name="cost_price'+i+'" id="cost_price'+i+'" pattern="float" empty class="tiny"/></td>';
					html +='<td><input type="text" name="weight'+i+'" id="weight'+i+'" pattern="float" empty class="tiny"/></td>';
					html +='<td><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" onclick="del_tr('+i+')" alt="删除" /></td>';
					html +='</tr>';
				}
				spec_va = item.join(';');
				/****将获得的规格值展示到页面******/
				$('#spec_va').val(spec_va);
				$('#spec_table').html(html);
		    }
            else
	        {
    	        if(iden==0)
    	        {
    	        	alert("请添加规格!");
    		        return false;
    	        }
            	alert("请选择规格!");
		        return false;
		    }
	        form.submit();
	    }
	});
}
//删除规格列表中的行
function del_tr(num)
{
	//删除数组元素.
	Array.prototype.remove=function(dx)
	{
	    if(isNaN(dx)||dx>this.length){return false;}
	    for(var i=0,n=0;i<this.length;i++)
	    {
	        if(this[i]!=this[dx])
	        {
	            this[n++]=this[i]
	        }
	    }
	    this.length-=1
	}
	$('#tr'+num).remove();
	var spec_va = $('#spec_va').val();
	var arr = spec_va.split(';');
	arr.remove(num);
	$('#spec_va').val(arr.join(';'));
}
//会员价格
function memPrice(num)
{
	var sell_price = $('#sell_price'+num).val();
	var patrn=/^[0-9]{1,20}$/;
	if(!patrn.exec(sell_price))
	{
		sell_price = 0;
	}
	var tempUrl = '<?php echo IUrl::creatUrl("/goods/member_price/num/@num@/sell_price/@sell_price@");?>';
	tempUrl = tempUrl.replace('@num@',num);
	tempUrl = tempUrl.replace('@sell_price@',sell_price);
	art.dialog.open(tempUrl,{
		id:'member',
		width:'500px',
		height:'200px',
	    title: '会员价格',
	    yesFn: function(iframeWin, topWin){
		 var form = iframeWin.document.getElementById('list'),
		 	 ids = iframeWin.$('#ids').val(),
		 	 num = iframeWin.$('#num').val();
	 	 if(ids.length>0)
	 	 {
		 		ids = ids.substring(0,ids.length-1);
		 		var arr = ids.split(',');
		 		for(var i=0;i<arr.length;i++)
			 	{
				 	var member = iframeWin.$('#mem'+num+arr[i]).val();
				 	if($.trim(member)!=''){
					 	var html = '<input type="hidden" name="mem'+num+arr[i]+'" value="'+member+'"/>';
					 	$('#member_para').append(html);
					}
				}

	 	 }
		form.submit();
		}
	});
}
</script>
			</div>
<?php $siteConfig = new Config("site_config");$siteConfig = $siteConfig->getInfo();?>
			<div id="table_box_2" cellpadding="0" cellspacing="0" style="display:none">
				<table class="form_table">
					<col width="150px" />
					<col />
					<tr>
						<th>描述：</th>
						<td><textarea id="content1" name="content" style="width:530px;height:250px;visibility:hidden;"></textarea></td>
					</tr>
				</table>
				<input type="hidden" name="keywords_for_search" id="keywords_for_search" />
			</div>
<script language="javascript" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/wordseg.js";?>"></script>
<script language="javascript">
var wordSegFlag=1;
$(document).ready(function(){
	//添加的时候，如果标题变动，直接删除掉重新生成
	$("#goods_name").blur(function(){ clearTagWord();wordSegByRemote();});
	regMoveTagWord();
});
function wordSegByRemote()
{
	if($("#goods_name").val()=="" )
	{
		return "";
	}
	var arr={};
	arr.title=$("#goods_name").val();
	arr.rand=Math.random();
	var url='<?php echo IUrl::creatUrl("/goods/word_seg/");?>';
	$.getJSON(url,arr,function(data){
		if(data['flag']==1)
		{
			var words = data['data'];
			for(var key in words )
			{
				addTagWord(words[key],true);
			}
		}
	},'json');

}
</script>
			<div id="table_box_3" cellpadding="0" cellspacing="0" style="display:none">
				<table class="form_table">
					<col width="150px" />
					<col />
					<tr>
						<th>SEO关键词：</th><td><input class="normal" name="seo_keywords" type="text" value="" /></td>
					</tr>
					<tr>
						<th>SEO描述：</th><td><textarea name="seo_description" cols="" rows=""></textarea></td>
					</tr>
				</table>
			</div>
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<td></td><td><button class="submit"  type="submit" onclick="return checkForm()"><span>发布商品</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script language="javascript">
	KE.show({
		id : 'content1',
		imageUploadJson:'<?php echo IUrl::creatUrl("/block/upload_img_from_editor");?>'
	});
	function select_tab(curr_tab)
	{
		$("form[name='ModelForm'] > div").hide();
		$("#table_box_"+curr_tab).show();
		$("ul[name=menu1] > li").removeClass('selected');
		$('#li_'+curr_tab).addClass('selected');
	}
	
	function checkForm()
	{
		var goods_name = $.trim($('#goods_name').val());
		var aa = /^([A-Z]|[a-z]|[\d]|[\-])*$/;
		var good_no = $('#goods_no').val();
		var point = $.trim($('#point').val());
		var store_nums = $.trim($('#store_nums').val());
		if(good_no!='')
		{
			if(!aa.test(good_no))
			{
				$('#goods_no').focus();
				alert('商品货号格式不正确!');
				return false;
			}
		}
		var box = document.getElementsByName('goods_category[]');
		var first = '0';
		for (var i=0;i<box.length;i++ ){
		  if(box[i].checked){
			  first = '1';
		  }
		}
		if(first=='0')
		{
			alert('请选择所属分类!');
			return false;
		}
		if(goods_name=='' || point=='' || store_nums=='')
		{
			select_tab('1');
		}
		var focus_photo = $('#focus_photo').val();
		var photo_name = $('#photo_name').val();
		if(photo_name!='' && photo_name!=',')
		{
			if(focus_photo==''){
				select_tab('1');
				return false;
			}
		}
		//检测货品编号的正确性
		var spec_va = $('#spec_va').val();
		if(spec_va!='')
		{
			var arr = spec_va.split(';');
			for(var i=0;i<arr.length;i++)
			{
				var pro_no = $('#goods_no'+i).val();
				if($.trim(pro_no)!='')
				{
					if(!aa.test(pro_no))
					{
						$('#goods_no'+i)[0].focus();
						alert('规格货号格式不正确!');
						return false;
					}
				}
			}
		}
	}
	
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
