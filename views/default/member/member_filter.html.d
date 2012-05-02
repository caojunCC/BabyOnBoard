{js:my97date}
<div class="headbar">
	<div class="position"><span>会员</span><span>></span><span>会员管理</span><span>></span><span>会员列表</span></div>
	<div class="operating">
		<div class="search f_r">
		<form name="serachuser" action="{url:/}" method="get">
		<input type='hidden' name='controller' value='member' />
		<input type='hidden' name='action' value='member_list' />
			<select class="normal" name="search">
				<option value="u.username" {if:$search=='u.username'}selected{/if}>用户名</option>
				<option value="m.true_name" {if:$search=='m.true_name'}selected{/if}>姓名</option>
				<option value="m.telephone" {if:$search=='m.telephone'}selected{/if}>电话</option>
				<option value="m.mobile" {if:$search=='m.mobile'}selected{/if}>手机</option>
				<option value="u.email" {if:$search=='u.email'}selected{/if}>Email</option>
			</select><input class="small" name="keywords" type="text" value="{$keywords}" /><button class="btn" type="submit"><span class="sch">搜 索</span></button>
		</form>
		</div>
		<a href="{url:/member/member_edit}"><button class="operating_btn" type="button"><span class="addition">添加会员</span></button></a>
		<a href="javascript:void(0)" onclick="selectAll('check[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel({form:'member_list',msg:'确定要删除所选中的会员吗？<br />删除的会员可以从回收站找回。'})"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)" onclick="remove()"><button class="operating_btn" type="button"><span class="grade">批量编辑</span></button></a>
		<a href="{url:/member/recycling/}"><button class="operating_btn" type="button"><span class="recycle">回收站</span></button></a>
		<a href="javascript:void(0)" onclick="filter()"><button class="operating_btn" type="button"><span class="remove">筛选</span></button></a>
		<a href="javascript:void(0)" onclick="balance_add()"><button class="operating_btn" type="button"><span class="recharge">预付款管理</span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<col width="80px" />
			<col width="80px" />
			<col width="50px" />
			<col width="60px" />
			<col width="80px" />
			<col width="60px" />
			<col width="80px" />
			<col width="120px" />
			<col width="60px" />
			<col width="60px" />
			<col width="120px" />
			<col />
			<thead>
				<tr role="head">
					<th class="t_c">选择</th>
					<th sort="true">用户名</th>
					<th sort="true">会员等级</th>
					<th sort="true">姓名</th>
					<th sort="true">性别</th>
					<th sort="true">Email</th>
					<th sort="true" datatype="num">积分</th>
					<th sort="true" datatype="num">经验值</th>
					<th sort="true" datatype="date">注册日期</th>
					<th sort="true">电话</th>
					<th sort="true">手机</th>
					<th sort="true" datatype="num">邮编</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<form action="{url:/member/member_reclaim}" method="post" name="member_list" onsubmit="return checkboxCheck('check[]','尚未选中任何记录！')">
<div class="content">
	<input type="hidden" name="move_group" value="" />
	<input type="hidden" name="move_point" value="" />
	<table id="list_table" class="list_table">
		<col width="40px" />
		<col width="80px" />
		<col width="80px" />
		<col width="50px" />
		<col width="60px" />
		<col width="80px" />
		<col width="60px" />
		<col width="80px" />
		<col width="120px" />
		<col width="60px" />
		<col width="60px" />
		<col width="120px" />
		<col />
		<tbody>
			{foreach:items=$member_list}
			<tr>
				<td class="t_c"><input name="check[]" type="checkbox" value="{$item['user_id']}" /></td>
				<td>{$item['username']}</td>
				<td>{$group[$item['group_id']]}</td>
				<td>{$item['true_name']}</td>
				<td>{if:$item['sex']=='1'}男{elseif:$item['sex']=='2'}女{else:}保密{/if}</td>
				<td>{$item['email']}</td>
				<td>{$item['point']}</td>
				<td>{$item['exp']}</td>
				<td>{$item['time']}</td>
				<td>{$item['telephone']}</td>
				<td>{$item['mobile']}</td>
				<td>{$item['contact_addr']}</td>
				<td>{$item['zip']}</td>
				<td><a href="{url:/member/member_edit/uid/$item[user_id]}"><img class="operator" src="{skin:images/admin/icon_edit.gif}" alt="修改" /></a>
					<a href="javascript:void(0)" onclick="delModel({link:'{url:/member/member_reclaim/check/$item[user_id]}'})"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" /></a>
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
</div>
{$pageBar}
</form>
<script language="javascript">
<!--
function balance_add()
{
	if(checkboxCheck('check[]','请选择要进行预付款操作的用户！'))
	{
		art.dialog({
			id:'balan',
			title:'预付款管理',
		    content: '<div class="pop_win clearfix" style="width:400px;padding:5px"><table class="form_table"><col width="120px" /><col /><tr><td class="t_r">请选择：</td><td><select id="typecode" class="middle" onchange="show(this.value)"><option value="1">充值</option><option value="2">退款</option><option value="3">提现</option></select></td></tr><tr id="ord_no" style="display:none;"><td class="t_r">订单号：</td><td><input type="text" id="order_no" maxlength="20" class="middle"/></td></tr><tr><td class="t_r">请输入金额：</td><td><input id="balance" class="small" type="text" maxlength="10"/></td></tr></table></div>',
		    yesFn: function(){
		    	var va = $("#typecode").val();
		    	var order_no = $.trim($('#order_no').val());
		    	if(va=='2')
		    	{
			    	if(order_no=='')
			    	{
				    	alert('请输入订单号!');
				    	return false;
			    	}
		    	}
				var balance = $.trim($('#balance').val());
				if(balance=='')
				{
					alert('请输入金额!');
					return false;
				}
		        //return false; //如果返回false将阻止关闭
		        var tempUrl = '{url:/member/member_recharge/balance/@balance@/type/@type@/order_no/@order_no@}';
		        tempUrl     = tempUrl.replace('@balance@',balance);
		        tempUrl     = tempUrl.replace('@type@',va);
		        tempUrl     = tempUrl.replace('@order_no@',order_no);

				$("form[name='member_list']").attr('action',tempUrl);
				formSubmit('member_list')
		    },
		    noFn: true //为true等价于function(){}
		});
	}
}

var js_group = {};
var tpl_group = '<table width="250px" class="form_table"><tr><th style="background:none">会员等级：</th><td><select class="auto" id="removeto">{foreach:items=$group key=$key item=$value}<option value={$key}>{$value}</option>{/foreach}</select></td></tr>'+
				'	<tr><th style="background:none">积分：</th><td><input class="tiny" type="text" name="point" value="" /></td></tr>'+
				'</table>';
var content_filter = {};
var tpl_filter =	'<form name="form_filter" action="{url:/member/member_filter}" method="post">'+
					'</form>'+
					'<div name="filter" style="width:630px;">'+
					'	<div name="menu" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;height:24px;">'+
					'		<div style="width:120px;float:left;">添加筛选条件：</div>'+
					'		<div style="width:100px;float:left;"><select name="requirement" onchange="addoption()">'+
					'				<option value="c">请选择</option>'+
					'				<option value="group">会员等级</option>'+
					'				<option value="username">用户名</option>'+
					'				<option value="truename">姓名</option>'+
					'				<option value="mobile">手机</option>'+
					'				<option value="telephone">固定电话</option>'+
					'				<option value="email">Email</option>'+
					'				<option value="zip">邮编</option>'+
					'				<option value="sex">性别</option>'+
					'				<option value="point">经验值</option>'+
					'				<option value="regtime">注册日期</option>'+
					'			</select></div>'+
					'		<div><a href="javascript:void(0)" onclick="del_all_option()" >删除所有筛选条件</a></div>'+
					'	</div>'+
					'</div>';

tpl_option = new Array();
tpl_option['group'] =	'	<div name="group" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">会员等级</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="group_key"><option value="eq">等于</option><option value="neq">不等于</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="group_value">{foreach:items=$group key=$key item=$value}<option value={$key}>{$value}</option>{/foreach}</select></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['username'] ='	<div name="username" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">用户名</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="username_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="username_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['truename'] ='	<div name="truename" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">姓名</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="truename_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="truename_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['mobile'] =	'	<div name="mobile" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">手机</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="mobile_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="mobile_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['telephone'] ='	<div name="telephone" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">固定电话</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="telephone_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="telephone_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['email']	=	'	<div name="email" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">Email</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="email_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="email_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['zip']	=	'	<div name="zip" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">邮编</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="zip_key"><option value="eq">等于</option><option value="contain">包含</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="zip_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['sex']	=	'	<div name="sex" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">性别</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><span>是</span></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="sex"><option value="-1">请选择</option><option value="1">男</option><option value="2">女</option><option value="9">保密</option></select></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['point']	=	'	<div name="point" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">经验值</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><select name="point_key"><option value="gt">大于</option><option value="lt">小于</option><option value="eq">等于</option></select></div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="point_value" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';
tpl_option['regtime'] =	'	<div name="regtime" style="clear:both;width:100%;float:left;border-bottom:1px solid #DDDDDD;">'+
						'		<div style="width:120px;float:left;border-right:1px solid #DDDDDD;height:24px;">注册日期</div>'+
						'		<div style="width:100px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;">开始 - 截止</div>'+
						'		<div style="width:350px;float:left;border-right:1px solid #DDDDDD;height:24px;padding-left:3px;"><input type="text" name="regtimeBegin" onfocus="WdatePicker()" style="width:80px;" /> - <input type="text" name="regtimeEnd" onfocus="WdatePicker()" style="width:80px;" /></div>'+
						'		<div style="border-right:1px solid #DDDDDD;height:24px;width:26px;float:left;"><img class="operator" src="{skin:images/admin/icon_del.gif}" alt="删除" onclick="del_option(this)" /></div>'+
						'	</div>';

function remove()
{
	art.dialog({
		id: 'remove',
		title: '修改等级',
		height: '80px',
		width: '200px',
		border: false,
		content: js_group,
		tmpl: tpl_group,
		yesFn:function(){
			$(":input[name='move_group']").attr("value",$("#removeto option:selected").attr("value"));
			$(":input[name='move_point']").attr("value",$(":input[name='point']").val());
			$("form[name='member_list']").attr("action","{url:/member/member_remove/}");
			$("form[name='member_list']").submit();
			return false;
		},
		noFn: true
	});
}

function filter()
{
	art.dialog({
		id: 'filter',
		title: '筛选',
		height: '320px',
		width: '480px',
		border: false,
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
			var tmpUrl = "{url:/member/member_filter/@query@}";
			tmpUrl = tmpUrl.replace("@query@",queryurl);
			$("form[name='form_filter']").attr('action',tmpUrl);
			$("form[name='form_filter']").submit();
			return true;
		},
		noFn:true
	});
}
function del_all_option()
{
	$("div[name='filter']").children().not("div[name='menu']").each(function(i){
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
	if ($("div[name='"+obj.val()+"']").length<1)
	{
		$("div[name='filter']").append(tpl_option[obj.val()]);
	}
	obj.attr('disabled',true);
	$("select[name='requirement'] option:selected").removeAttr('selected');
}
//-->
</script>
