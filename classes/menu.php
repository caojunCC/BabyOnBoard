<?php
/**
 * @copyright Copyright(c) 2011 jooyea.net
 * @file menu.php
 * @brief 后台系统菜单管理
 * @author webning
 * @date 2011-01-12
 * @version 0.6
 * @note
 */
/**
 * @brief Menu
 * @class Menu
 * @note
 */
class Menu
{
	private static $commonMenu = array('/system/default');
	public $current;
    //菜单的配制数据
	private static $menu = array(
/*
	'商品'=>array(
				'商品管理'=>array(
					'/goods/goods_list' => '商品列表',
					'/goods/goods_add' => '商品添加'
				),
				'商品分类'=>array(
					'/goods/category_list'	=>	'分类列表',
					'/goods/category_edit'	=>	'添加分类'
				),
				'品牌'=>array(
					'/brand/category_list'		=>	'品牌分类',
					'/brand/brand_list'		=>	'品牌列表'
				),
				'模型'=>array(
					'/goods/model_list'=>'模型列表',
					'/goods/spec_list'=>'规格列表',
					'/goods/spec_photo'=>'规格图库'
				),
				'热门搜索'=>array(
					'/tools/keyword_list' => '关键词列表',
					'/tools/search_list' => '搜索统计'
				)
		),
		

		'会员'=>array(
				'会员管理'=>array(
            		'/member/member_list' => '会员列表',
             	'/member/group_list' => '会员组列表',
             	'/member/withdraw_list'=>'会员提现管理'
				),
				'信息处理' => array(
					'/comment/suggestion_list'  => '建议管理',
					'/comment/refer_list'		=> '咨询管理',
					'/comment/discussion_list'	=> '讨论管理',
					'/comment/comment_list'		=> '评价管理',
					'/comment/message_list'		=> '站内消息',
					'/message/notify_list'	=>	'到货通知',
				),
				'邮件短信设置'=>array(
					'/message/tpl_list'		=>	'模板管理',
					'/message/registry_list'=>	'邮件订阅'
				)
		),
		
	   '订单'=>array(
            	'订单管理'=>array(
                '/order/order_list' => '订单列表',
                '/order/order_add'  => '添加订单'
            	),
            	'单据管理'=>array(
             	'/order/order_collection_list'  => '收款单',
             	'/order/order_refundment_list'  => '退款单',
            		'/order/order_delivery_list'    => '配货单',
            		'/order/order_returns_list'     => '退货单',
            		'/order/refundment_list'     => '退款申请列表'
            	),
            	'快递单管理'=>array(
                '/order/ship_info_list'  => '发货信息管理'
            	)
		),
		
		'营销'=>array(
            	'促销活动' => array(
            		'/market/pro_rule_list' => '促销活动列表'
            	),
            	'营销活动' => array(
            		'/market/pro_speed_list' => '限时抢购',
            		'/market/regiment_list' => '团购',
            	),
            	'代金券管理'=>array(
            		'/market/ticket_list'       => '代金券列表',
            		'/market/ticket_excel_list' => '代金券文件列表',
            	)
		),
		
		'统计'=>array(
				'基础数据统计'=>array(
          		'/market/user_reg' 	   => '用户注册统计',
				'/market/spanding_avg' => '人均消费统计',
          		'/market/amount'       => '销售金额统计'
				),
				'日志操作记录'=>array(
				'/market/account_list'   => '资金操作记录',
				'/market/operation_list' => '后台操作记录',
				)
		),
		*/

        '系统 system'=>array(
      		'后台首页'=>array(
        			'/system/default' => '后台首页',
        		),
				
            	'网站管理'=>array(
            		'/system/conf_base' => '网站设置',
            		'/system/conf_ui'   => '主题设置',
            	),
            	/*
            	'支付管理'=>array(
                '/system/payment_list' => '支付方式'
            	),
            	
            	'多平台登录'=>array(
                '/system/oauth_list' => '平台列表'
            	),
            	
            	'配送管理'=>array(
                '/system/delivery'  	=> '配送方式',
                '/system/area'  		=> '地区管理',
            	'/system/freight_list'	=> '物流公司',
            	'/system/express'		=> '快递跟踪'
            	),
            	*/

            	'数据库管理'=>array(
					'/tools/db_bak' => '数据库备份',
					'/tools/db_res' => '数据库还原',
            	)
            	/*
				'系统升级'=>array(
					'/system/upgrade_1'=>'系统升级'
				)
				*/
		),
		'Mastercode模板' =>array(
		

			'Department Types科室' =>array(
				'/mastercode/department_type_list' => 'list科室列表',
				'/mastercode/department_type_edit' => 'edit编辑科室',
				),
				'Beds 床位'  =>array(
				'/mastercode/beds_list' => 'list病床列表',
				'/mastercode/beds_add'  => 'add编辑病床',
				),/*
			'Providers' =>array(
				),*/
				
			'Anesthesia麻醉' =>array(
				'/mastercode/anesthesia_list' => 'list麻醉列表',
				'/mastercode/anesthesia_edit' => 'edit麻醉编辑',
				),
			'Patient status病人状态' =>array(
				'/mastercode/patient_status_list' => 'list病人状态列表',
				'/mastercode/patient_status_edit' => 'edit病人状态编辑',
				),
				
			'Anesthesia Prob麻醉问题'=>array(
				'/mastercode/anesthesia_problems_list' => 'list麻醉问题列表',
				'/mastercode/anesthesia_problems_edit' => 'edit麻醉问题编辑',
				),
			'Presentation简述' =>array(
				'/mastercode/presentation_list' => 'list简述列表',
				'/mastercode/presentation_edit' => 'edit简述编辑',
				),
				
			'Amniotic Types羊水类型' =>array(
				'/mastercode/amniotic_types_list' => 'list羊水列表',
				'/mastercode/amniotic_types_edit' => 'edit羊水编辑',
				),
				/**/
		),
		'Hospital医院' =>array(
			'Hospital医院' =>array(
				'/mastercode/hospital_list' => '	list医院列表',
				'/mastercode/hospital_edit' => 'edit编辑医院',
				),
			'Providers人员' =>array(
				'/hospital/providers_list' => 'list人员列表',
				'/hospital/providers_edit' =>  'edit编辑人员',
				),
			'Position职位管理'=>array(
         //   		'/system/admin_list' => '用户',
            		'/system/role_list'  => 'role角色',
            		'/system/right_list' => 'rights权限资源'
            	),
			),
		'Obstetrical产妇' =>array(
			'Basic Information' => array(
				'/obstetrical/obstetrical_basic_list' =>'list',
				'/obstetrical/obstetrical_basic_edit' =>'edit',
				),
			'Admission Record' => array(
				'/obstetrical/admission_list' =>'list',
				'/obstetrical/admission_edit' =>'edit',
				),
			'Surgery Record' => array(
				'/obstetrical/surgery_list' =>'list',
				'/obstetrical/surgery_edit' =>'edit',
				),
			'Analgesia Record' => array(
				'/obstetrical/analgesia_list' =>'list',
				'/obstetrical/analgesia_edit' =>'edit',
				),
			'Progress Record' => array(
				'/obstetrical/progress_list' =>'list',
				'/obstetrical/progress_edit' =>'edit',
				),
				/*
			'report_stats报告统计' =>array(
				'/patient/report_stats_list ' =>'list报告统计',
				),
				*/

				
		),
		
		/**/
		/*,

       '工具'=>array(
				
       '数据库管理'=>array(
					'/tools/db_bak' => '数据库备份',
					'/tools/db_res' => '数据库还原',
				)
				*/
				/*,
				'文章管理'=>array(
					'/tools/article_cat_list'=> '文章分类',
					'/tools/article_list'=> '文章列表'
				),

				'帮助管理'=>array(
       			'/tools/help_cat_list'=> '帮助分类',
       			'/tools/help_list'=> '帮助列表'
       			),

       			'广告管理'=>array(
       			'/tools/ad_position_list'=> '广告位列表',
       			'/tools/ad_list'=> '广告列表'
       			),

       			'公告管理'=>array(
       			'/tools/notice_list'=> '公告列表',
       			'/tools/notice_edit'=> '公告发布'
       			),
         		'网站地图'=>array(
                '/tools/seo_sitemaps' => '网站搜索地图',
				)
				
		)
		
		*/
	);

	private static $menu_non_display = array(
		'/tools/article_edit_act'=>'/tools/article_list',
		'/message/notify_filter' =>'/message/notify_list',
		'/market/ticket_edit' => '/market/ticket_list',
		'/order/collection_show' => '/order/order_collection_list',
		'/order/refundment_show' => '/order/order_refundment_list',
		'/order/delivery_show' => '/order/order_delivery_list',
		'/order/returns_show' => '/order/order_returns_list',
		'/order/refundment_doc_show' => '/order/refundment_list',
		'/system/navigation' => '/system/conf_none_exists',
		'/system/navigation_edit' => '/system/conf_none_exists',
		'/system/navigation_recycle' => '/system/conf_none_exists',
		'/order/print_template' => '/order/order_list_non_exists',
		'/system/area_edit' => '/system/area',
		'/system/delivery_edit' => '/system/delivery',
		'/system/delivery_recycle' => '/system/delivery',
		'/member/recycling' => '/member/member_list',
		'/order/collection_recycle_list' => '/order/order_collection_list',
		'/order/delivery_recycle_list' => '/order/order_delivery_list',
		'/order/returns_recycle_list'	=>	'/order/order_returns_list',
		'/order/recycle_list'	=>	'/order/ship_info_list'

	);

    /**
     * @brief 根据用户的权限过滤菜单
     * @return array
     */
    private function filterMenu()
    {
    	$rights = ISafe::get('admin_right');

		//如果不是超级管理员则要过滤菜单
		if($rights != 'administrator')
		{
			foreach(self::$menu as $firstKey => $firstVal)
			{
				if(is_array($firstVal))
				{
					foreach($firstVal as $secondKey => $secondVal)
					{
						if(is_array($secondVal))
						{
							foreach($secondVal as $thirdKey => $thirdVal)
							{
								if(!in_array($thirdKey,self::$commonMenu) && (stripos(str_replace('@','/',$rights),','.substr($thirdKey,1).',') === false))
								{
									unset(self::$menu[$firstKey][$secondKey][$thirdKey]);
								}
							}
							if(empty(self::$menu[$firstKey][$secondKey]))
							{
								unset(self::$menu[$firstKey][$secondKey]);
							}
						}
					}
					if(empty(self::$menu[$firstKey]))
					{
						unset(self::$menu[$firstKey]);
					}
				}
			}
		}
    }

    /**
     * @brief 取得当前菜单应该生成的对应JSON数据
     * @return Json
     */
	public function submenu()
	{
		$controllerObj = IWeb::$app->getController();
		$controller = $controllerObj->getId();
		$actionObj = $controllerObj->getAction();
		$action = $actionObj->getId();
		$this->current = '/'.$controller.'/'.$action;
       $this->vcurrent = '/'.$controller.'/';
		$items  = array();

		if(isset(self::$menu_non_display[$this->current]))
		{
			$this->current = self::$menu_non_display[$this->current];
			$tmp = explode("/",$this->current);
			$this->vcurrent = $tmp[1];
			$action = $tmp[2];
		}

		//过滤菜单
		$this->filterMenu();
		$find_current = false;
		$items = array();
		foreach(self::$menu as $key => $value)
		{
			if(!is_array($value))
			{
				return;
			}
			$item = array();
			$item['current'] = false;
			$item['title'] = $key;

			foreach($value as $big_cat_name => $big_cat)
			{
				foreach($big_cat as $link=>$title)
				{
					if(!isset($item['link']) )
					{
						$item['link'] = $link;
					}

					if($find_current)
					{
						break;
					}

					$tmp1 = explode('_',$action);
					$tmp1 = $tmp1[0];
					if($link == $this->current || preg_match("!^/[^/]+/{$tmp1}_!",$link) )
					{
						$item['current'] = $find_current = true;
						foreach($value as $k=>$v)
						{
							foreach($v as $subMenuKey=>$subMenuName)
							{
								$tmpUrl = IUrl::creatUrl($subMenuKey);
								unset($value[$k][$subMenuKey]);
								$value[$k][$tmpUrl]['name'] = $subMenuName;
								$value[$k][$tmpUrl]['urlPathinfo'] = $subMenuKey;
							}
						}
						$item['list'] = $value;
					}
				}

				if($find_current)
				{
					break;
				}
			}
			$item['link'] = IUrl::creatUrl($item['link']);
			$items[] = $item;
		}
		return JSON::encode($items);
	}
}
?>
