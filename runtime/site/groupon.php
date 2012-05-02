<?php $user = $this->user?>
<?php $myCartObj = new Cart(); $myCartInfo = $myCartObj->getMyCart();$siteConfig=new Config("site_config");?>
<?php $siteConfigObj = new Config("site_config");$site_config   = $siteConfigObj->getInfo();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $siteConfig->name;?></title>
<link type="image/x-icon" href="favicon.ico" rel="icon">
<link type="image/x-icon" href="favicon.ico" rel="bookmark">
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/index.css";?>" />
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/jquery.jqzoom.css";?>" />
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/form.js"></script>
<link rel="stylesheet" type="text/css" href="/iwebshop/runtime/systemjs/autovalidate/style.css"/><script charset="UTF-8" src="/iwebshop/runtime/systemjs/autovalidate/validate.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/artdialog/artDialog.min.js"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
<script type='text/javascript' src="<?php echo IUrl::creatUrl("/javascript/adloader/");?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/";?>jquery.bxSlider/bx_styles/bx_styles.css" />
</head>
<body class="index">
<div class="container">
	<div class="header">
		<h1 class="logo"><a title="<?php echo $siteConfig->name;?>" style="background:url(<?php echo IUrl::creatUrl("")."image/logo.gif";?>);" href="<?php echo IUrl::creatUrl("");?>"><?php echo $siteConfig->name;?></a></h1>
		<ul class="shortcut">
			<li class="first"><a href="<?php echo IUrl::creatUrl("/ucenter");?>">我的账户</a></li><li><a href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a></li><li class='last'><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
		</ul>
		<p class="loginfo">
			<?php if((isset($user['user_id']) && $user['user_id']!='')){?><?php echo isset($user['username'])?$user['username']:"";?>您好，欢迎您来到<?php echo $siteConfig->name;?>购物！[<a href="<?php echo IUrl::creatUrl("/simple/logout");?>" class="reg">安全退出</a>]<?php }else{?>[<a href="<?php echo IUrl::creatUrl("/simple/login");?>">登录</a>
			<?php $callback = IReq::get('callback')?>
			<?php if($callback==""){?>
			<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg");?>">免费注册</a>
			<?php }else{?>
			<?php $callback=urlencode($callback);?>
			<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg/?callback=$callback");?>">免费注册</a>
			<?php }?>
			]
			<?php }?>
		</p>
	</div>
	<div class="navbar">
		<ul>
			<li><a href="<?php echo IUrl::creatUrl("");?>">首页</a></li>
			<?php $i=0;?>
			<?php $query = new IQuery("guide");$items = $query->find(); foreach($items as $key => $item){?>
			<?php $i++;?>
			<li <?php if($i==count($items)){?>style="background:none;"<?php }?>><a href="<?php echo isset($item['link'])?$item['link']:"";?>"><?php echo isset($item['name'])?$item['name']:"";?><span> </span></a></li>
			<?php }?>
		</ul>

		<div class="mycart">
			<dl>
				<dt><a href="<?php echo IUrl::creatUrl("/simple/cart");?>">购物车<b name="mycart_count"><?php echo isset($myCartInfo['count'])?$myCartInfo['count']:"";?></b>件</a></dt>
				<dd><a href="<?php echo IUrl::creatUrl("/simple/cart");?>">去结算</a></dd>
			</dl>

			<!--购物车浮动div 开始-->
			<div class="shopping" id='div_mycart' style='display:none;'>
			</div>
			<!--购物车浮动div 结束-->

		</div>
	</div>

	<div class="searchbar">
		<div class="allsort">
			<a href="javascript:void(0);">全部商品分类</a>

			<!--总的商品分类-开始-->
			<ul class="sortlist" id='div_allsort' style='display:none'>
				<?php $this->goodsCategory = block::goods_category();?>
				<?php foreach($this->goodsCategory as $key => $first){?>
					<li>
						<h2><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/$first[id]");?>"><?php echo isset($first['name'])?$first['name']:"";?></a></h2>

						<!--商品分类 浮动div 开始-->
						<div class="sublist" style='display:none'>

							<div class="items">
								<strong>选择分类</strong>
								<?php if(isset($first['second'])){?>
								<?php foreach($first['second'] as $key => $second){?>
								<dl class="category selected">
									<dt>
										<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/$second[id]");?>"><?php echo isset($second['name'])?$second['name']:"";?></a>
									</dt>

									<dd>
										<?php if(isset($second['more'])){?>
										<?php foreach($second['more'] as $key => $third){?>
										<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/$third[id]");?>"><?php echo isset($third['name'])?$third['name']:"";?></a>|
										<?php }?>
										<?php }?>
									</dd>
								</dl>
								<?php }?>
								<?php }?>

							</div>

						</div>
						<!--商品分类 浮动div 结束-->

					</li>
				<?php }?>

			</ul>
			<!--总的商品分类-结束-->

		</div>

		<div class="searchbox">
			<form method='get'>
				<?php $word = IReq::get('word');?>
				<input class="text" type="text" name='word' id="word" autocomplete="off" value="<?php echo $word ? $word : '输入关键字...';?>" />
				<input class="btn" type="submit" value="商品搜索" onclick="checkInput('word','输入关键字...');window.location='<?php echo IUrl::creatUrl("/site/search_list/word/@word@");?>'.replace('@word@',this.form.word.value);return false;" />
			</form>

			<!--自动完成div 开始-->
			<ul class="auto_list" style='display:none'></ul>
			<!--自动完成div 开始-->

		</div>
		<div class="hotwords">热门搜索：
			<?php $query = new IQuery("keyword");$query->where = "hot = 1";$query->limit = "5";$query->order = "`order` asc";$items = $query->find(); foreach($items as $key => $item){?>
			<?php $tmpWord = urlencode($item['word']);?>
			<a href="<?php echo IUrl::creatUrl("/site/search_list/word/$tmpWord");?>"><?php echo isset($item['word'])?$item['word']:"";?></a>
			<?php }?>
		</div>
	</div>
	<div class="m_10" id="adHere_1"></div>
	<script language="javascript">
	(new adLoader()).load(1,'adHere_1');
	</script>

		<?php $seo_data=array(); $site_config=new Config('site_config');$site_config=$site_config->getInfo();?>

	<?php $seo_data['title']=isset($site_config['name'])?$site_config['name']:""?>
	<?php $tmp=$this->regiment_list;?>
	<?php if( count($tmp) == 1      ){?>
		<?php $tmp=end($tmp);$seo_data['title']=$tmp['title']."_".$seo_data['title'];?>
	<?php }else{?>
		<?php $seo_data['title']="团购_".$seo_data['title'];?>
	<?php }?>
	<?php seo::set($seo_data);?>
	<?php $iurl = IUrl::creatUrl();?>
	<div class="position"> <span>您当前的位置：</span> <a href="<?php echo IUrl::creatUrl("");?>"> 首页</a> » 团购 </div>
	<div class="groupon wrapper clearfix">
		<div class="sidebar f_r">
			<div class="box org_box m_10">
				<div class="title">每天订阅团购信息<span></span></div>
				<div class="cont clearfix">
					<p>请输入您的邮箱地址</p>
					<input type="text" name='orderinfo' class="gray_m">
					<label class="btn_orange f_r"><input type="button" value="立即订阅" onclick="orderinfo();"></label>
				</div>
<script language="javascript">
//电子邮件订阅
		function orderinfo()
		{
			var email = $('[name="orderinfo"]').val();
			if(validate(email,'email') == false)
			{
				alert('请填写正确的email地址');
			}
			else
			{
				$.getJSON('<?php echo IUrl::creatUrl("/site/email_registry");?>',{email:email},function(content){
					if(content.isError == false)
					{
						alert('订阅成功');
						$('[name="orderinfo"]').val('');
					}
					else
						alert(content.message);
				});
			}
		}
</script>

				<span class="l"></span><span class="r"></span><span class="b_l"></span><span class="b_r"></span>
			</div>
			<div class="box">
				<div class="title">往期精彩团购<span></span></div>

				<div class="cont">
					<ul class="prolist clearfix">
						<?php $regimentUser = new IModel('regiment_user_relation')?>
						<?php foreach($this->ever_list as $key => $item){?>
						<?php 
							$regUserRow=$regimentUser->getObj('is_over = 1 and regiment_id = '.$item['id'],'count(*) as sum_count');
							$item['sum_count'] = isset($regUserRow['sum_count']) ? $regUserRow['sum_count'] : 0;
						?>
						<li>
							<a href="<?php echo IUrl::creatUrl("/site/products/id/$item[goods_id]/");?>"><img width="145" alt="<?php echo isset($item['title'])?$item['title']:"";?>" src="<?php echo IUrl::creatUrl("")."";?><?php echo isset($item['img'])?$item['img']:"";?>"></a>
							<p class="pro_title"><a href="<?php echo IUrl::creatUrl("/site/products/id/$item[goods_id]/");?>" class="blue"><?php echo isset($item['title'])?$item['title']:"";?></a></p>
							<p>原&nbsp;&nbsp;价：<s>￥<?php echo isset($item['sell_price'])?$item['sell_price']:"";?></s></p>
							<p class="orange">团购价：￥<?php echo isset($item['regiment_price'])?$item['regiment_price']:"";?></p>
							<p class="red2">购买人数：<?php echo isset($item['sum_count'])?$item['sum_count']:"";?>人</p>
						</li>
						<?php }?>
						<li class="more"><a class="blue" href="<?php echo IUrl::creatUrl("/site/groupon_list");?>">更多团购>></a></li>
					</ul>
				</div>
				<span class="l"></span><span class="r"></span><span class="b_l"></span><span class="b_r"></span>
			</div>
		</div>
		<div class="main f_l t_r">
<script language="javascript">
	//倒计时
	var cd_timer=new countdown();
</script>
			<?php foreach($this->regiment_list as $key => $item){?>
			<?php $itemURL=IUrl::getHost().IUrl::creatUrl("/site/groupon/id/$item[id]");?>
			<div class="gt_box"><div class="grounpon_title box"><strong><?php echo isset($item['order_num'])?$item['order_num']:"";?><span>今日团购</span></strong><span class="l"></span><span class="r"></span></div>
			<div class="share_bar box">
				<ul>
				   <li class="normal">分享到： </li>
				  	<li style="background:url(http://v.t.qq.com/share/images/s/weiboicon16.png) no-repeat;"><a target="_blank" onclick="postShare('qq','<?php echo isset($itemURL)?$itemURL:"";?>','<?php echo isset($item['title'])?$item['title']:"";?>');return false;" href="javascript:void(0)">腾讯</a></li>

				   <li class="kaixin"><a target="_blank" onclick="postShare('kaixin','<?php echo isset($itemURL)?$itemURL:"";?>','<?php echo isset($item['title'])?$item['title']:"";?>');return false;" href="javascript:void(0)">开心</a></li>

					<li class="renren"><a target="_blank" onclick="postShare('renren','<?php echo isset($itemURL)?$itemURL:"";?>','<?php echo isset($item['title'])?$item['title']:"";?>');return false;" href="javascript:void(0)">人人</a></li>

					<li class="douban"><a target="_blank" onclick="postShare('douban','<?php echo isset($itemURL)?$itemURL:"";?>','<?php echo isset($item['title'])?$item['title']:"";?>');return false;" href="javascript:void(0)">豆瓣</a></li>

					<li class="sina"><a target="_blank" onclick="postShare('xinlang','<?php echo isset($itemURL)?$itemURL:"";?>','<?php echo isset($item['title'])?$item['title']:"";?>');return false;" href="javascript:void(0)">新浪</a></li>

				</ul>
			</div></div>
			<div class="shadow_box m_10 clearfix">
				<div class="cont clearfix">
					<h1 class="g_title"><a href="<?php echo isset($itemURL)?$itemURL:"";?>"><?php echo isset($item['title'])?$item['title']:"";?></a></h1>
					<div class="l_part">
						<div class="g_price m_10">
							<?php if($item['valid']){?>
							<div class="price_tag">
								<p>仅售<strong><?php echo isset($item['regiment_price'])?$item['regiment_price']:"";?></strong></p>
								<a class="buy" onclick="join_groupon(<?php echo isset($item['id'])?$item['id']:"";?>,<?php echo isset($item['goods_id'])?$item['goods_id']:"";?>);return false;" href="javascript:void(0);">购买</a>
							</div>
							<?php }else{?>
							<div class="price_tag disabled">
								<p>仅售<strong><?php echo isset($item['regiment_price'])?$item['regiment_price']:"";?></strong></p>
								<a class="buy" href="javascript:void(0)">结束</a>
							</div>
							<?php }?>
						</div>
						<div class="orange_box m_10">
							<table class="t_c">
								<col width="85px" />
								<col width="50px" />
								<col width="85px" />
								<tbody>
									<tr><th class="normal">原价</th><th class="normal">折扣</th><th class="normal">节省</th></tr>
									<tr class="bold">
										<td><s>￥<?php echo isset($item['sell_price'])?$item['sell_price']:"";?></s></td>
										<td><?php echo isset($item['discount'])?$item['discount']:"";?></td>
										<td>￥<?php echo $item['sell_price']-$item['regiment_price'];?></td>
									</tr>
								</tbody>
							</table>
						</div>

						<?php if($item['valid']){?>
						<div class="orange_box">
							<p>团购倒计时：</p>
							<?php $free_time=strtotime($item['end_time'])-ITime::getNow();?>
							<p class="t_c f14"><span id="cd_hour_<?php echo isset($item['id'])?$item['id']:"";?>" class="red2 bold"><?php echo floor($free_time/3600);?></span>小时<span id="cd_minute_<?php echo isset($item['id'])?$item['id']:"";?>" class="red2 bold"><?php echo floor( ($free_time%3600)/60 );?></span>分钟<span id="cd_second_<?php echo isset($item['id'])?$item['id']:"";?>" class="red2 bold"><?php echo $free_time%60;?></span>秒</p>
						<script language="javascript">
						cd_timer.add(<?php echo isset($item['id'])?$item['id']:"";?>);
						</script>
						</div>
						<div class="orange_box g_num m_10">
							<p class="t_c">已有<span class="red2 bold"><?php echo isset($item['user_num'])?$item['user_num']:"";?></span>人购买</p>
						</div>
						<div class="dot_box t_c">数量有限，请密切关注！</div>
						<?php }elseif($item['store_nums']!=0 && $item['user_num']>= $item['store_nums'] ){?>
						<div class="orange_box">
							<p class="t_c">本次团购的商品已售尽！</p>
							<p class="t_c">已有<span class="red2 bold"><?php echo isset($item['user_num'])?$item['user_num']:"";?></span>人购买</p>
						</div>
						<?php }else{?>
						<div class="orange_box">
							<p class="t_c">本次团购活动已结束！</p>
							<p class="t_c">已有<span class="red2 bold"><?php echo isset($item['user_num'])?$item['user_num']:"";?></span>人购买</p>
						</div>
						<?php }?>

					</div>

					<div class="r_part box">
						<img class="g_pic" width="480" src="<?php echo IUrl::creatUrl("")."";?><?php echo isset($item['img'])?$item['img']:"";?>">
						<div class="g_digest clearfix"><?php echo isset($item['intro'])?$item['intro']:"";?><a class="g_btn f_r" href="<?php echo IUrl::creatUrl("/site/products/id/$item[goods_id]/");?>">查看商品详情</a></div>
					</div>
				</div>
				<span class="l"></span><span class="r"></span><span class="b_l"></span><span class="b_r"></span>
			</div>
			<?php }?>

			<div class="g_notice box">
				<h3><strong>团购须知：</strong></h3>
				<p>1、买家只有通过<b class="orange"><?php echo isset($site_config['name'])?$site_config['name']:"";?></b>的团购统一入口才能有权以团购价购买活动商品。</p>
				<p>2、单个商品每个用户ID每天限购一次。</p>
				<p>3、因机会有限，请在拍下宝贝后<?php echo Regiment::time_limit();?>分钟内付款，否则系统视为放弃团购机会，订单会自动关闭。</p>
				<p>4、团购时间为当日10点到次日8点，只能在规定时间内进行，逾期结束，团购产品将下架。</p>
				<p>5、卖家将在团购结束后隔日开始发货，具体时间视卖家情况为准，具体实物以店家宝贝为准。</p>
				<p>6、因团购的订单量较大，宝贝的发货期为7天，请介意的买家慎重考虑！</p>
			</div>
		</div>
	</div>
<script language="javascript">
var url_path = 	encodeURIComponent('<?php echo isset($iurl)?$iurl:"";?>');
function join_groupon(id,goods_id)
{
//	var url='<?php echo IUrl::creatUrl("/site/groupon_join/?id=");?>'+id;
	var url="<?php echo IUrl::creatUrl("/site/products/promo/groupon/?id=");?>"+goods_id+"&regiment_id="+id;
	location=url;
	return;		
	$.getJSON(url,function(c)
	{
		if(c['flag']=='msg')
		{
			realAlert(c['data']);
		}
		if(c['flag']==false)
		{
			var url="<?php echo IUrl::creatUrl("/site/products/promo/groupon/?id=");?>"+goods_id+"&regiment_id="+id;
			location=url;
		}
		else
		{
			var url="<?php echo IUrl::creatUrl("/site/products/promo/groupon/?id=");?>"+goods_id+"&regiment_id="+id;
			var c=$("#group_join_tpl").html().replace("{URL}",url);
			art.dialog({'content':c, 'icon':null,'title':'','lock':true});
		}
	});
}
</script>
<div id="group_join_tpl" style="display:none;" >
	<div class="popwin f14" style="background:#fff;">
		<div class="title"><h3>温馨提示：</h3></div>
		<div class="cont">
			<p class="m_10">请在<b><?php echo Regiment::time_limit();?></b>之内下单并完成支付，否则您的订单将会被关闭</p>
			<!-- <p>还剩<b><span>1</span>小时<span>14</span>分钟<span>30</span>秒</b>完成购买</p> -->
			<p></p>
			<p class="t_r"><label class="btn_gray"><input onclick="top.location='{URL}';" type="button" value="下一步" /></label></p>
		</div>
	</div>
</div>


	<div class="help m_10">
		<div class="cont clearfix">
			<?php $cat_list=array();?>
			<?php $query = new IQuery("help_category AS cat");$query->where = "position_foot = 1";$query->order = "sort ASC,id desc";$query->limit = "5";$items = $query->find(); foreach($items as $key => $item){?>
			<?php $cat_list[$item['id']]=$item;?>
			<?php }?>
			<?php if(count($cat_list)){?>
				<?php $width=floor(100/count($cat_list))-1;?>
			<?php }?>

			<?php foreach($cat_list as $cat_id => $cat){?>
			<dl style="width:<?php echo isset($width)?$width:"";?>%">
     			<dt><a href="<?php echo IUrl::creatUrl("/site/help_list/id/$cat[id]");?>"><?php echo isset($cat['name'])?$cat['name']:"";?></a></dt>
     			<?php $query = new IQuery("help");$query->where = "cat_id = $cat_id";$query->order = "sort ASC,id desc";$items = $query->find(); foreach($items as $key => $item){?>
					<dd><a href="<?php echo IUrl::creatUrl("/site/help/id/$item[id]");?>"><?php echo isset($item['name'])?$item['name']:"";?></a></dd>
				<?php }?>
      		</dl>
      		<?php }?>
		</div>
	</div>
	<?php echo $siteConfig->site_footer_code;?>
</div>
<script type='text/javascript' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/site.js";?>'></script>
<script type='text/javascript'>
	$('input:text[name="word"]').bind({
		keyup:function(){autoComplete('<?php echo IUrl::creatUrl("/site/autoComplete");?>','<?php echo IUrl::creatUrl("/site/search_list/word/@word@");?>','<?php echo isset($site_config['auto_finish'])?$site_config['auto_finish']:"";?>');}
	});

	var mycartLateCall = new lateCall(200,function(){showCart('<?php echo IUrl::creatUrl("/simple/showCart");?>')});

	//购物车div层
	$('.mycart').hover(
		function(){
			mycartLateCall.start();
		},
		function(){
			mycartLateCall.stop();
			$('#div_mycart').hide('slow');
		}
	);

	//[ajax]加入购物车
	function joinCart_ajax(id,type)
	{
		var url ="<?php echo IUrl::creatUrl("/simple/joinCart/random/@random@/goods_id/@goods_id@/type/@type@");?>";
		url = url.replace("@random@",Math.random()).replace("@goods_id@",id).replace("@type@",type);
		$.getJSON(url,function(content){
			if(content.isError == false)
			{
				var count = parseInt($('[name="mycart_count"]').html());
				$('[name="mycart_count"]').html(count + 1);
				$('.msgbox').hide();
				alert(content.message);
			}
			else
			{
				alert(content.message);
			}
		});
	}

	//列表页加入购物车统一接口
	function joinCart_list(id)
	{
		var url = "<?php echo IUrl::creatUrl("/simple/getProducts/id/@id@");?>";
		$.get('<?php echo IUrl::creatUrl("/simple/getProducts");?>',{id:id},function(content){
			if(content == '')
			{
				joinCart_ajax(id,'goods');
			}
			else
			{
				$('#product_box_'+id).html(content);
				$('#product_box_'+id).parent().show();
			}
		});
	}
</script>
</body>
</html>
