<?php $siteConfig=new Config("site_config");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $siteConfig->name;?></title>
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/index.css";?>" />
<link rel="stylesheet" type="text/css" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/";?>jquery.bxSlider/bx_styles/bx_styles.css" />
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/jquery-1.4.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="/iwebshop/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/iwebshop/runtime/systemjs/autovalidate/validate.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/form.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
</head>
<body class="second" >
<div class="brand_list container_2">
	<div class="header">
		<h1 class="logo"><a title="<?php echo $siteConfig->name;?>" style="background:url(<?php echo IUrl::creatUrl("")."image/logo.gif";?>);" href="<?php echo IUrl::creatUrl("");?>"><?php echo $siteConfig->name;?></a></h1>
		<ul class="shortcut">
			<li class="first"><a href="<?php echo IUrl::creatUrl("/ucenter");?>">我的账户</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a></li>
	   		<li class='last'><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
		</ul>
		<?php $user = $this->user?>
		<p class="loginfo"><?php if((isset($user['user_id']) && $user['user_id']!='')){?><?php echo isset($user['username'])?$user['username']:"";?>您好，欢迎您来到<?php echo $siteConfig->name;?>购物！[<a class='reg' href="<?php echo IUrl::creatUrl("/simple/logout");?>">安全退出</a>]<?php }else{?>[<a href="<?php echo IUrl::creatUrl("/simple/login");?>">登录</a>
		<?php $callback = IReq::get('callback')?>
		<?php if($callback==""){?>
		<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg");?>">免费注册</a>
		<?php }else{?>
		<?php $callback=urlencode($callback);?>
		<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg?callback=$callback");?>">免费注册</a>
		<?php }?>
		]<?php }?></p>
	</div>

    <?php $seo_data=array(); $site_config=new Config('site_config');$site_config=$site_config->getInfo();?>
<?php $seo_data['title']=isset($site_config['name'])?$site_config['name']:""?>
<?php $seo_data['title']="用户登录_".$seo_data['title']?>
<?php seo::set($seo_data);?>

	<div class="wrapper clearfix">
		<div class="wrap_box">
			<h3 class="notice">已注册用户，请登录</h3>
			<p class="tips">欢迎来到我们的网站，如果您已是本站会员请登录</p>
			<div class="box login_box clearfix">
				<form action='<?php echo IUrl::creatUrl("/simple/login_act");?>' method='post'>
					<?php $callback = IReq::get('callback')?>
					<?php if($callback!==null && $callback!=''){?>
					<input type="hidden" name='callback' value="<?php echo isset($callback)?$callback:"";?>">
					<?php }else{?>
					<input type="hidden" name='callback' value="<?php echo IUrl::getRefRoute();?>">
					<?php }?>
					<table width="515" class="form_table f_l">
						<col width="120px" />
						<col />

						<?php if($this->message!=''){?>
						<tr><td colspan="2">
							<div class="prompt"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/front/error_s.gif";?>" width="16" height="15" /><?php echo isset($this->message)?$this->message:"";?></div>
						</td></tr>
						<?php }?>

						<tr><th>用户名/邮箱：</th><td><input class="gray" type="text" name="login_info" value="<?php echo ICookie::get('loginName');?>" pattern='required' alt='填写用户名或邮箱' /></td></tr>
						<tr><th>密码：</th><td><input class="gray" type="password" name="password" pattern='^\S{6,32}$' alt='填写密码' /></td></tr>
						<tr class="low"><td></td>
							<td>
								<label class="attr"><input class="radio" type="checkbox" name="remember" value='1' />记住登录名</label>
								<label class="attr"><a class="link pwd" href="<?php echo IUrl::creatUrl("/simple/find_password/");?>">忘记密码</a></label>
							</td>
						</tr>
						<tr class="low">
							<td></td>
							<td>
								<?php $query = new IQuery("oauth");$query->where = "is_close = 0";$items = $query->find(); foreach($items as $key => $item){?>
								<a href="javascript:oauthlogin('<?php echo isset($item['id'])?$item['id']:"";?>');"><img src='<?php echo IUrl::creatUrl("")."$item[logo]";?>' /></a>
								<?php }?>
							</td>
						</tr>
						<tr><td></td><td><input class="submit_login" type="submit" value="登录" /></td></tr>
					</table>
				</form>

				<?php if(IReq::get('tourist') === null){?>
				<table width="360px" class="form_table prompt_3 f_l">
					<col width="75px" />
					<col />
					<tr>
						<th></th>
						<td>
							<p class="mt_10"><strong class="f14">您还不是<span class="orange"><?php echo $siteConfig->name;?></span>用户</strong></p>
							<p>现在免费注册成为<?php echo $siteConfig->name;?>商城用户，便能立即享受便宜又放心的购物乐趣。<a class="blue" href="<?php echo IUrl::creatUrl("");?>">网站首页>></a></p>
							<?php if($callback==""){?>
							<p class="mt_10"><a class="reg_btn" href="<?php echo IUrl::creatUrl("/simple/reg");?>">注册新用户</a></p>
							<?php }else{?>
							<?php $tmpUrl = urlencode($callback);?>
							<p class="mt_10"><a class="reg_btn" href="<?php echo IUrl::creatUrl("/simple/reg/?callback=$tmpUrl");?>">注册新用户</a></p>
							<?php }?>
						</td>
					</tr>
				</table>

				<?php }else{?>

				<table id="reg_table" width="360px" class="form_table prompt_3 f_l">
					<col width="75px" />
					<col />
					<tr>
						<th></th>
						<td>
							<p class="mt_10 m_15">
								<strong class="f14">您还不是<span class="orange"><?php echo $siteConfig->name;?></span>用户</strong><br />
								<label>使用游客身份结账或注册</label>
							</p>
							<p><label class="attr"><input class="radio" type='radio' name='next_step' value='acount' />使用游客身份结账</label></p>
							<p><label class="attr"><input class="radio" type='radio' name='next_step' value='reg' checked=checked />注册新用户</label></p>
							<p class="mt_10 indentation">现在免费注册成为<?php echo $siteConfig->name;?>商城用户，便能立即享受便宜又放心的购物乐趣。<a class="blue" href="<?php echo IUrl::creatUrl("");?>">网站首页>></a></p>
							<p class="mt_40 f_r"><a class="next_step" href="javascript:next_step();">下一步</a></p>
						</td>
					</tr>
				</table>
				<?php }?>

			</div>
		</div>
	</div>

	<script type='text/javascript'>
		//多平台登录
		function oauthlogin(oauth_id)
		{
			$.getJSON('<?php echo IUrl::creatUrl("/simple/oauth_login");?>',{id:oauth_id,callback:"<?php echo isset($callback)?$callback:"";?>"},function(content){
				if(content.isError == false)
				{
					window.location.href = content.url;
				}
				else
				{
					alert(content.message);
				}
			});
		}

		//下一步操作
		function next_step()
		{
			var step_val = $('[name="next_step"]:checked').val();
			if(step_val == 'acount')
			{
				window.location.href = '<?php if($callback!=""){?><?php $url=rtrim($callback,"/")."/tourist"?><?php echo IUrl::creatUrl("$url");?><?php }?>';
			}
			else if(step_val == 'reg')
			{
				window.location.href = '<?php if($callback==""){?><?php echo IUrl::creatUrl("/simple/reg");?><?php }else{?><?php echo IUrl::creatUrl("/simple/reg/?callback=$callback");?><?php }?>';
			}
		}

		jQuery
		(
			function($)
			{
				$(".form_table input").focus(function(){$(this).addClass('current');}).blur(function(){$(this).removeClass('current');})
			}
		)
	</script>


	<?php echo $siteConfig->site_footer_code;?>

</div>
<script type='text/javascript' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/site.js";?>'></script>
</body>
</html>
