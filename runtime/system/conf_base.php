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
	<script charset="UTF-8" src="/iwebshop/runtime/systemjs/editor/kindeditor-min.js"></script>
<div class="headbar">
	<div class="position"><span>系统</span><span>></span><span>网站管理</span><span>></span><span>站点设置</span></div>
	<ul class='tab' name='conf_menu'>
		<li class='selected'><a href="javascript:select_tab('base_conf');">基本设置</a></li>
		<li><a href="javascript:select_tab('guide_conf');">导航设置</a></li>
		<li><a href="javascript:select_tab('index_slide');">首页幻灯设置</a></li>
		<li><a href="javascript:select_tab('site_footer_conf');">站点底部信息</a></li>
		<li><a href="javascript:select_tab('shopping_conf');">购物设置</a></li>
		<li><a href="javascript:select_tab('show_conf');">显示设置</a></li>
		<li><a href="javascript:select_tab('image_conf');">图片设置</a></li>
		<li><a href="javascript:select_tab('mail_conf');">邮箱设置</a></li>
		<li><a href="javascript:select_tab('system_conf');">系统设置</a></li>
	</ul>
</div>
<div class="content_box">

	<div class="content form_content">
		<form action="<?php echo IUrl::creatUrl("/system/save_conf/form_index/base_conf");?>"  method="post" enctype='multipart/form-data' name='base_conf'>
			<!--基本设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>商店名称：</th>
					<td><input type='text' class='normal' name='name' pattern='required' alt='商店名称必须填写' /><label>* 网店名称</label></td>
				</tr>
				<tr>
					<th>商店网址：</th>
					<td>
						<input type='text' class='normal' name='url' pattern='url' alt='商店网址必须填写' />
						<label>* 网站完整的URL访问地址</label>
					</td>
				</tr>
				<tr>
					<th>商店logo：</th>
					<td>
						<div style="height:53px;overflow:hidden;">
							<img src='<?php echo IUrl::creatUrl("")."image/logo.gif";?>' onload="if(this.height>50)this.height=50" />
						</div>
						<input type='file' class='normal' name='logo' /><label>直接从本地上传图片覆盖原有的网站logo</label>
					</td>
				</tr>
				<tr>
					<th>联系人：</th>
					<td><input type='text' class='normal' name='master' /></td>
				</tr>
				<tr>
					<th>QQ：</th>
					<td><input type='text' class='normal' pattern='qq' name='qq' empty alt='请填写正确的QQ号' /></td>
				</tr>
				<tr>
					<th>Email：</th>
					<td><input type='text' class='normal' pattern='email' name='email' empty alt='请填写正确的email地址' /></td>
				</tr>
				<tr>
					<th>手机：</th>
					<td><input type='text' class='normal' pattern='mobi' name='mobile' empty alt='请填写正确的手机号码' /></td>
				</tr>
				<tr>
					<th>固定电话：</th>
					<td><input type='text' class='normal' pattern='phone' name='phone' empty alt='请填写正确的固定电话' /></td>
				</tr>
				<tr>
					<th>具体地址：</th>
					<td><input type='text' class='normal' pattern='required' name='address' empty alt='商店名称必须填写' /></td>
				</tr>
				<tr>
					<th>商品货号前缀：</th>
					<td><input type='text' class='normal' pattern='required' name='goods_no_pre' empty alt='商品货号前缀' /><label>只取前两位</label></td>
				</tr>
				<tr>
					<th>首页title后缀：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_title' empty alt='首页title后缀' /></td>
				</tr>
				<tr>
					<th>首页keywords：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_keywords' empty alt='首页keywords' /></td>
				</tr>
				<tr>
					<th>首页description：</th>
					<td><input type='text' class='normal' pattern='required' name='index_seo_description' empty alt='首页description' /></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存基本设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/guide_conf");?>' method='post' name='guide_conf'>
			<table class='form_table'>
				<col width="150px" />
				<col />

				<tr>
					<th>首页导航设置：</th>
					<td>

						<table class='border_table' id='guide_box'>
							<col width="150px" />
							<col width="250px" />
							<col width="120px" />
							<thead>
							<tr>
								<th>名称</th>
								<th>链接地址</th>
								<th>操作</th>
							</tr>
							</thead>

							<tbody>

							<?php $query = new IQuery("guide");$items = $query->find(); foreach($items as $key => $item){?>
							<tr class='td_c'>
								<td><input type='text' name='guide_name[]' class='small' value='<?php echo isset($item['name'])?$item['name']:"";?>' pattern='required' alt='请填写导航名' /></td>
								<td><input type='text' name='guide_link[]' class='middle' value='<?php echo isset($item['link'])?$item['link']:"";?>' pattern='url' alt='请填写URL，如：http://www.jooyea.com' /></td>
								<td>
									<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>" alt="向上" title='向上' />
									<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>" alt="向下" title='向下' />
									<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title='删除' />
								</td>
							</tr>
							<?php }?>
							</tbody>

							<tfoot>
							<tr>
								<td colspan='3'>
									<button type='button' class='btn' onclick="add_guide();"><span>添加导航</span></button>
								</td>
							</tr>
							</tfoot>
						</table>
						<label>设置首页顶部导航条内容和链接地址</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存导航栏配置</span></button></td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/index_slide");?>' method='post' name='index_slide' enctype="multipart/form-data">
			<table class='form_table'>
				<col width="150px" />
				<col />

				<tr>
					<th>首页幻灯设置：</th>
					<td>

						<table class='border_table' id='slide_box'>
							<col width="150px" />
							<col width="250px" />
							<col width="250px" />
							<col width="120px" />
							<thead>
							<tr>
								<th>名称</th>
								<th>链接地址</th>
								<th>图片文件</th>
								<th>操作</th>
							</tr>
							</thead>

							<tbody>

								<?php $index_slide=isset($this->confRow['index_slide'])?$this->confRow['index_slide']:serialize(array());?>
								<?php $index_slide=unserialize($index_slide);?>
								<?php if($index_slide){?>
								<?php foreach($index_slide as $key => $item){?>
									<tr class='td_c'>
										<td><input type='text' name='slide_name[]' class='small' value='<?php echo isset($item['name'])?$item['name']:"";?>' pattern='required' /></td>
										<td><input type='text' name='slide_url[]' class='middle' value='<?php echo isset($item['url'])?$item['url']:"";?>' pattern='url' /></td>
										<td>
											<?php if(isset($item['img']) && $item['img']!=''){?>
												<?php $img=IUrl::creatUrl('')."./".$item['img'];?>
												<img src="<?php echo isset($img)?$img:"";?>" width="150" /><br />
											<?php }?>
											<input type='file' name='slide_pic[]' />
											<input type="hidden" value="<?php echo isset($item['img'])?$item['img']:"";?>" name="slide_img[]" />
										</td>
										<td>
											<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>" alt="向上" title='向上' />
											<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>" alt="向下" title='向下' />
											<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title='删除' />

										</td>
									</tr>
								<?php }?>
								<?php }else{?>
								<tr class='td_c'>
									<td><input type='text' name='slide_name[]' class='small' pattern='required' /></td>
									<td><input type='text' name='slide_url[]' class='middle' pattern='url' /></td>
									<td><input type='file' name='slide_pic[]' /><input type="hidden" value="" name="slide_img[]" /></td>
									<td>
										<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>" alt="向上" title='向上' />
										<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>" alt="向下" title='向下' />
										<img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" alt="删除" title='删除' />
									</td>
								</tr>
								<?php }?>

							</tbody>

							<tfoot>
							<tr>
								<td colspan='4'>
									<button type='button' class='btn' onclick="add_slide();"><span>添加幻灯</span></button>
								</td>
							</tr>
							</tfoot>
						</table>
						<label>设置首页幻灯片图片与名称</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存幻灯片配置</span></button></td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/site_footer_conf");?>' method='post' name='site_footer_conf'>

			<table class='form_table'>
				<col width="150px" />
				<col />
				<tr>
					<th>站点底部信息：</th>
					<td>
						<textarea id="site_footer_code" name='site_footer_code' style='width:95%;height:300px;' ><?php echo isset($this->confRow['site_footer_code'])?$this->confRow['site_footer_code']:"";?></textarea>
						<label>设置站点底部页面信息，您可以点源代码试图直接进行代码编辑</label>
					</td>
					<script language="javascript">
					//装载编辑器
					KE.show({
						id : 'site_footer_code',
						cssPath:'<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/index.css";?>',
						imageUploadJson:'<?php echo IUrl::creatUrl("/block/upload_img_from_editor");?>'
					});
					</script>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>保存站点底部信息</span></button></td>
				</tr>
			</table>

		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/shopping_conf");?>' method='post' name='shopping_conf'>
			<!--购物设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>税率：</th>
					<td><input type='text' name='tax' class='small' empty pattern='float' alt='请输入正确的整数或者浮点数' />%</td>
				</tr>
				<tr>
					<th>默认备货时间：</th>
					<td><input type='text' class='small' name='stockup_time' pattern='int' alt='请填写整数' />天 <label>* 订单确认后需要备货的时间</label></td>
				</tr>
				<tr>
					<th>团购过期时间：</th>
					<td><input type='text' class='small' name='regiment_time_limit' pattern='int' alt='请填写整数' />分钟 <label>* 报名参加团购后多长时间不付款则视为过期，默认为60分钟</label></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存购物配置</span></button>
					</td>
				</tr>
			</table>
		</form>
		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/show_conf");?>' method='post' name='show_conf'>
			<!--显示设置!-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>默认的排序依据：</th>
					<td>
						<select name='order_by' class='normal'>
							<option value='new' selected=selected>上架时间</option>
							<option value='price' selected=selected>价格</option>
							<option value='sale'>销量</option>
							<option value='cpoint'>评分</option>
						</select>
						<label>* 在商品列表页中商品的排序依据条件</label>
					</td>
				</tr>
				<tr>
					<th>默认的排序方式：</th>
					<td>
						<select name='order_type' class='normal'>
							<option value='desc'>降序</option>
							<option value='asc'>升序</option>
						</select>
						<label>* 在商品列表页中商品的排序方式</label>
					</td>
				</tr>
				<tr>
					<th>列表默认展示方式：</th>
					<td>
						<select name='list_type' class='normal'>
							<option value='list' selected=selected>普通列表</option>
							<option value='win'>橱窗形式</option>
						</select>
						<label>* 在商品列表页中商品的展示样式</label>
					</td>
				</tr>
				<tr>
					<th>列表展示商品数量：</th>
					<td><input type='text' class='small' name='list_num' pattern='int' /><label>* 在商品列表页中商品的展示数量</label></td>
				</tr>
				<tr>
					<th>智能提示开启的字符数：</th>
					<td>
						<input type='text' class='small' name='auto_finish' pattern='int' alt='请填写整数' empty />
						<label>当输入若干个字符后，会出现智能提示信息</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit' onclick='add_guide();'><span>保存显示设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/image_conf");?>' method='post' enctype='multipart/form-data' name='image_conf'>
			<!--图片设置-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>列表页缩略图：</th>
					<td>
						宽：<input type='text' class='small' name='list_thumb_width' empty pattern='int' alt='请填写一个数字' />
						高：<input type='text' class='small' name='list_thumb_height' empty pattern='int' alt='请填写一个数字' />
					</td>
				</tr>
				<tr>
					<th>详细页缩略图：</th>
					<td>
						宽：<input type='text' name='show_thumb_width' class='small' empty pattern='int' alt='请填写一个数字' />
						高：<input type='text' name='show_thumb_height' class='small' empty pattern='int' alt='请填写一个数字' />
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存图片设置</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action='<?php echo IUrl::creatUrl("/system/save_conf/form_index/mail_conf");?>' method='post' name='mail_conf'>
			<!--邮箱设置-->
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>发送Email方式：</th>
					<td>
						<label class='attr'><input type='radio' name='email_type' value='1' checked=checked onclick="show_mail(1);" />第三方SMTP方式</label>
						<label class='attr'><input type='radio' name='email_type' value='2' onclick="show_mail(2)" />本地mail邮箱</label>
						<label>* 如果本地已经搭建好邮件服务，请选择 "本地mail邮箱"，否则选择" 第三方SMTP方式 "来发送邮件</label>
					</td>
				</tr>
				<tr>
					<th>发送邮件的地址：</th>
					<td>
						<input type='text' name='mail_address' pattern='email' alt='填写正确的email地址' class='normal' />
						<label>* 发送邮件所使用的email地址，邮件内容中的收件人信息就是显示此信息</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>SMTP地址：</th>
					<td>
						<input type='text' name='smtp' class='normal' pattern='required' empty alt='填写正确的email地址' />
						<label>第三方的SMTP的URL地址</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>用户名：</th>
					<td>
						<input type='text' name='smtp_user' class='normal' pattern='required' alt='发送邮件' empty />
						<label>SMTP用户名</label>
					</td>
				</tr>
				<tr name='smtp'>
					<th>密码：</th>
					<td><input type='password' name='smtp_pwd' class='normal' value='<?php echo isset($this->confRow['smtp_pwd'])?$this->confRow['smtp_pwd']:"";?>' empty /><label>SMTP密码</label></td>
				</tr>
				<tr name='smtp'>
					<th>端口号：</th>
					<td><input type='text' name='smtp_port' class='small' empty /><label>SMTP端口号(默认：25)</label></td>
				</tr>
				<tr>
					<th>测试邮件地址：</th>
					<td><input type='text' name='test_address' pattern='email' class='normal' empty alt='填写正确的email地址' /><label>用于测试邮件发送的功能【可选】</label></td>
				</tr>
				<tr>
					<th></th>
					<td>
						<button class="submit" type='submit'><span>保存邮箱设置</span></button>
						<button class="submit" type='button' onclick="test_mail(this);"><span id='testmail'>测试邮件发送</span></button>
					</td>
				</tr>
			</table>
		</form>

		<form action="<?php echo IUrl::creatUrl("/system/save_conf/form_index/system_conf");?>" method="post" name='system_conf'>
			<table class="form_table">
				<col width="150px" />
				<col />
				<tr>
					<th>清理模板缓存：</th>
					<td>
						<button class='btn' type='button' onclick="clearCache();"><span>开始清理</span></button>
						<label>清理系统编译生成的模板缓存文件</label>
					</td>
				</tr>

				<tr>
					<th>整站安全机制：</th>
					<td>
						<select name='safe' class='normal' pattern='required' alt='请选择一种语言'>
							<option value='cookie'>COOKIE方案</option>
							<option value='session'>SESSION方案</option>
						</select>
						<label>个人信息安全存储策略，采用COOKIE方案可以减轻服务器压力，并且其信息也经过特殊加密，建议使用</label>
					</td>
				</tr>

				<tr>
					<th>设置语言包：</th>
					<td>
						<?php $langList = $this->getSitePlan('lang')?>
						<select class='normal' name='lang' pattern='required' alt='请选择一种语言'>
							<?php foreach($langList as $key => $item){?>
							<option value='<?php echo isset($key)?$key:"";?>'><?php echo isset($item['name'])?$item['name']:"";?></option>
							<?php }?>
						</select>
						<label>切换整站语言</label>
					</td>
				</tr>

				<tr>
					<th>伪静态：</th>
					<td>
						<label class='attr'><input type='radio' name='rewriteRule' value="pathinfo" />开启</label>
						<label class='attr'><input type='radio' name='rewriteRule' value="url" />关闭</label>
						<label>开启伪静态前请先配置服务器的重写规则</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><button class="submit" type='submit'><span>保存系统设置</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<script type='text/javascript'>
	//测试邮件发送
	function test_mail(obj)
	{
		//获取数据
		var email_type   = $('input[name="email_type"]').val();
		var mail_address = $('input[name="mail_address"]').val();
		var smtp         = $('input[name="smtp"]').val();
		var smtp_user    = $('input[name="smtp_user"]').val();
		var smtp_pwd     = $('input[name="smtp_pwd"]').val();
		var smtp_port    = $('input[name="smtp_port"]').val();
		var test_address = $('input[name="test_address"]').val();
		var sendData     = {test_address:test_address,email_type:email_type,mail_address:mail_address,smtp:smtp,smtp_user:smtp_user,smtp_pwd:smtp_pwd,smtp_port:smtp_port};

		if(!test_address)
		{
			$('input[name="test_address"]').addClass('invalid-text');
			alert('请填写要发送邮件的测试地址');
			return '';
		}

		$('input[name="test_address"]').removeClass('invalid-text');

		//按钮控制
		obj.disabled = true;
		$('#testmail').html('正在测试发送请稍后...');

		var ajaxUrl = '<?php echo IUrl::creatUrl("/system/test_sendmail/@random@");?>';
		ajaxUrl     = ajaxUrl.replace('@random@',Math.random());

		$.getJSON(ajaxUrl,sendData,function(content){
			obj.disabled = false;
			$('#testmail').html('测试邮件发送');
			alert(content.message);
		});
	}

	//添加导航
	function add_guide()
	{
		var nodeValue =  "<tr class='td_c'>"
						+"<td><input type='text' name='guide_name[]' class='small' pattern='required' alt='请填写导航名' /></td>"
						+"<td><input type='text' name='guide_link[]' class='middle' pattern='url' alt='请填写URL，如：http://www.jooyea.com' /></td>"
						+"<td>"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>' alt='向上' title='向上' />"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>' alt='向下' title='向下' />"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' />"
						+"</td>"
						+"</tr>";

		$('#guide_box tbody').append(nodeValue);
		var last_index = $('#guide_box tbody tr').size()-1;
		buttonInit(last_index);
	}

	function add_slide()
	{
		var nodeValue =  "<tr class='td_c'>"
						+"<td><input type='text' name='slide_name[]' class='small' pattern='required' /></td>"
						+"<td><input type='text' name='slide_url[]' class='middle' pattern='url' /></td>"
						+"<td><input type='file' name='slide_pic[]' class='middle' />"
						+'<input type="hidden" value="" name="slide_img[]" /></td>'
						+"<td>"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_asc.gif";?>' alt='向上' title='向上' />"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_desc.gif";?>' alt='向下' title='向下' />"
						+"<img class='operator' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>' alt='删除' title='删除' />"
						+"</td>"
						+"</tr>";

		$('#slide_box tbody').append(nodeValue);
		var last_index = $('#slide_box tbody tr').size()-1;
		buttonInit(last_index,'#slide_box');
	}

	//操作按钮绑定
	function buttonInit(indexValue,ele)
	{
		ele = ele || "#guide_box";
		if(indexValue == undefined || indexValue === '')
		{
			var button_times = $(ele+' tbody tr').length;

			for(var item=0;item < button_times;item++)
			{
				buttonInit(item,ele);
			}
		}
		else
		{
			var obj = $(ele+' tbody tr:eq('+indexValue+') .operator')

			//功能操作按钮
			obj.each(
				function(i)
				{
					switch(i)
					{
						//向上排序
						case 0:
						{
							$(this).click(
								function()
								{
									var insertIndex = $(this).parent().parent().prev().index();
									if(insertIndex >= 0)
									{
										$(ele+' tbody tr:eq('+insertIndex+')').before($(this).parent().parent());
									}
								}
							)
						}
						break;

						//向上排序
						case 1:
						{
							$(this).click(
								function()
								{
									var insertIndex = $(this).parent().parent().next().index();
									$(ele+' tbody tr:eq('+insertIndex+')').after($(this).parent().parent());
								}
							)
						}
						break;

						//删除排序
						case 2:
						{
							$(this).click(
								function()
								{
									var obj = $(this);
									art.dialog.confirm('确定要删除么？',function(){obj.parent().parent().remove()});
								}
							)
						}
						break;
					}
				}
			)
		}
	}

	//清理缓存
	function clearCache()
	{
		art.dialog({
			id:'clearCache',
			content:'<img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/loading.gif";?>" />请稍候，系统正在清理缓存文件...'
		});

		jQuery.get('<?php echo IUrl::creatUrl("/system/clearCache");?>',function(content)
		{
			art.dialog({id:'clearCache'}).close();
			var content = $.trim(content);
			if(content == 1)
				art.dialog.tips('清理成功！', 1.5);
			else
				art.dialog.tips('清理失败！', 1.5);
		});
	}

	//滑动门
	function select_tab(indexVal)
	{
		//设置默认值
		if(indexVal == '')
		{
			indexVal = 'base_conf';
		}

		var formObj  = $('form[name="'+indexVal+'"]');
		var li_index = $('form').index(formObj);

		//切换form
		$('form').hide();
		$('form:eq('+li_index+')').show();

		//切换li
		$('ul[name="conf_menu"] li').attr('class','');
		$('ul[name="conf_menu"] li:eq('+li_index+')').attr('class','selected');
	}

	//切换图片设置
	function show_watermark(val)
	{
		//隐藏所有水印的控件内容
		$('table tr[name*=watermark] *').hide();

		switch(val)
		{
			case 1:
			{
				$('table tr[name="watermark"] *').show();
				$('table tr[name="watermark_pic"] *').show();
			}
			break;

			case 2:
			{
				$('table tr[name="watermark"] *').show();
				$('table tr[name="watermark_txt"] *').show();
			}
			break;
		}
	}

	//切换邮箱设置
	function show_mail(checkedVal)
	{
		if(checkedVal==1)
			$('table tr[name="smtp"] *').show();
		else
			$('table tr[name="smtp"] *').hide();
	}

	//默认系统定义
	select_tab("<?php echo isset($this->confRow['form_index'])?$this->confRow['form_index']:"";?>");
	show_watermark(0);
	show_mail(1);

	//当导航栏目为空时发生错误
	if($('#guide_box tbody tr').size() == 0)
	{
		add_guide();
	}

	buttonInit();
	buttonInit(undefined,'#slide_box');

	//表单数据回填
	var formBase = new Form('base_conf');
	formBase.init({
		'name':"<?php echo isset($this->confRow['name'])?$this->confRow['name']:"";?>",
		'url':"<?php echo isset($this->confRow['url'])?$this->confRow['url']:"";?>",
		'master':"<?php echo isset($this->confRow['master'])?$this->confRow['master']:"";?>",
		'qq':"<?php echo isset($this->confRow['qq'])?$this->confRow['qq']:"";?>",
		'email':"<?php echo isset($this->confRow['email'])?$this->confRow['email']:"";?>",
		'mobile':"<?php echo isset($this->confRow['mobile'])?$this->confRow['mobile']:"";?>",
		'phone':"<?php echo isset($this->confRow['phone'])?$this->confRow['phone']:"";?>",
		'address':"<?php echo isset($this->confRow['address'])?$this->confRow['address']:"";?>",
		'index_seo_keywords':"<?php echo isset($this->confRow['index_seo_keywords'])?$this->confRow['index_seo_keywords']:"";?>",
		'index_seo_title':"<?php echo isset($this->confRow['index_seo_title'])?$this->confRow['index_seo_title']:"";?>",
		'index_seo_description':"<?php echo isset($this->confRow['index_seo_description'])?$this->confRow['index_seo_description']:"";?>",
		'goods_no_pre':"<?php echo isset($this->confRow['goods_no_pre'])?$this->confRow['goods_no_pre']:"";?>"
	});

	var formImage = new Form('image_conf');
	formImage.init({
		'list_thumb_width':"<?php echo isset($this->confRow['list_thumb_width'])?$this->confRow['list_thumb_width']:"";?>",
		'list_thumb_height':"<?php echo isset($this->confRow['list_thumb_height'])?$this->confRow['list_thumb_height']:"";?>",
		'show_thumb_width':"<?php echo isset($this->confRow['show_thumb_width'])?$this->confRow['show_thumb_width']:"";?>",
		'show_thumb_height':"<?php echo isset($this->confRow['show_thumb_height'])?$this->confRow['show_thumb_height']:"";?>",
		'watermark':"<?php echo isset($this->confRow['watermark'])?$this->confRow['watermark']:"";?>",
		'watermark_text':"<?php echo isset($this->confRow['watermark_text'])?$this->confRow['watermark_text']:"";?>",
		'watermark_size':"<?php echo isset($this->confRow['watermark_size'])?$this->confRow['watermark_size']:"";?>",
		'watermark_color':"<?php echo isset($this->confRow['watermark_color'])?$this->confRow['watermark_color']:"";?>",
		'watermark_tran':"<?php echo isset($this->confRow['watermark_tran'])?$this->confRow['watermark_tran']:"";?>",
		'watermark_position':"<?php echo isset($this->confRow['watermark_position'])?$this->confRow['watermark_position']:"";?>"
	});

	var formShopping = new Form('shopping_conf');
	formShopping.init({
		'mustReg':"<?php echo isset($this->confRow['mustReg'])?$this->confRow['mustReg']:"";?>",
		'shopping':"<?php echo isset($this->confRow['shopping'])?$this->confRow['shopping']:"";?>",
		'sale_out':"<?php echo isset($this->confRow['sale_out'])?$this->confRow['sale_out']:"";?>",
		'new_goods_time':"<?php echo isset($this->confRow['new_goods_time'])?$this->confRow['new_goods_time']:"";?>",
		'tax':"<?php echo isset($this->confRow['tax'])?$this->confRow['tax']:"";?>",
		'stockup_time':"<?php echo isset($this->confRow['stockup_time'])?$this->confRow['stockup_time']:"";?>",
		'regiment_time_limit':"<?php echo isset($this->confRow['regiment_time_limit'])?$this->confRow['regiment_time_limit']:"";?>"
	});

	var formShow = new Form('show_conf');
	formShow.init({
		'order_by':"<?php echo isset($this->confRow['order_by'])?$this->confRow['order_by']:"";?>",
		'order_type':"<?php echo isset($this->confRow['order_type'])?$this->confRow['order_type']:"";?>",
		'list_type':"<?php echo isset($this->confRow['list_type'])?$this->confRow['list_type']:"";?>",
		'list_num':"<?php echo isset($this->confRow['list_num'])?$this->confRow['list_num']:"";?>",
		'show_history':"<?php echo isset($this->confRow['show_history'])?$this->confRow['show_history']:"";?>",
		'auto_finish':"<?php echo isset($this->confRow['auto_finish'])?$this->confRow['auto_finish']:"";?>"
	});

	var formMail = new Form('mail_conf');
	formMail.init({
		'email_type':"<?php echo isset($this->confRow['email_type'])?$this->confRow['email_type']:"";?>",
		'mail_address':"<?php echo isset($this->confRow['mail_address'])?$this->confRow['mail_address']:"";?>",
		'smtp':"<?php echo isset($this->confRow['smtp'])?$this->confRow['smtp']:"";?>",
		'smtp_user':"<?php echo isset($this->confRow['smtp_user'])?$this->confRow['smtp_user']:"";?>",
		'smtp_port':"<?php echo isset($this->confRow['smtp_port'])?$this->confRow['smtp_port']:"";?>"
	});

	var formSystem = new Form('system_conf');
	formSystem.init({
		'safe':"<?php echo isset($this->confRow['safe'])?$this->confRow['safe']:"";?>",
		'lang':"<?php echo isset($this->confRow['lang'])?$this->confRow['lang']:"";?>",
		'rewriteRule':'<?php echo isset($this->confRow['rewriteRule'])?$this->confRow['rewriteRule']:"";?>'
	});
</script>

	</div>
	<div id="separator"></div>
</div>

</body>
</html>
