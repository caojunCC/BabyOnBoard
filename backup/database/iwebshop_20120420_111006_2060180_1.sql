DROP TABLE IF EXISTS `dbclass_address`;
 CREATE TABLE `dbclass_address` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`user_id` int(11) NOT NULL  COMMENT '用户ID',
`accept_name` varchar(20) NOT NULL  COMMENT '收货人姓名',
`zip` varchar(6) NULL  DEFAULT NULL  COMMENT '邮编',
`telphone` varchar(20) NULL  DEFAULT NULL  COMMENT '联系电话',
`country` int(11) NULL  DEFAULT NULL  COMMENT '国ID',
`province` int(11) NOT NULL  COMMENT '省ID',
`city` int(11) NOT NULL  COMMENT '市ID',
`area` int(11) NULL  DEFAULT NULL  COMMENT '区ID',
`address` varchar(250) NULL  DEFAULT NULL  COMMENT '收货地址',
`mobile` varchar(20) NULL  DEFAULT NULL  COMMENT '手机',
`default` tinyint(1) NOT NULL  DEFAULT 0 COMMENT '是否默认,0:为非默认,1:默认'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='收货信息表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_admin`;
 CREATE TABLE `dbclass_admin` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment COMMENT '管理员ID',
`admin_name` varchar(20) NOT NULL  COMMENT '用户名',
`password` varchar(32) NOT NULL  COMMENT '密码',
`role_id` int(11) NOT NULL  COMMENT '角色ID',
`create_time` datetime NULL  DEFAULT NULL  COMMENT '创建时间',
`email` varchar(255) NULL  DEFAULT NULL  COMMENT 'Email',
`last_ip` varchar(30) NULL  DEFAULT NULL  COMMENT '最后登录IP',
`last_time` datetime NULL  DEFAULT NULL  COMMENT '最后登录时间',
`is_del` tinyint(1) NOT NULL  DEFAULT 0 COMMENT '删除状态 1删除,0正常'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='管理员用户表' AUTO_INCREMENT=2;

INSERT INTO `dbclass_admin` VALUES( '1','admin','f6fdffe48c908deb0f4c3bd36c032e72','0','2012-04-19 12:40:23','','127.0.0.1','2012-04-20 11:00:34','0' ); 
DROP TABLE IF EXISTS `dbclass_admin_role`;
 CREATE TABLE `dbclass_admin_role` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`name` varchar(20) NOT NULL  COMMENT '角色名称',
`rights` text NULL  DEFAULT NULL  COMMENT '权限',
`is_del` tinyint(1) NOT NULL  DEFAULT 0 COMMENT '删除状态 1删除,0正常'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='后台角色分组表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_attribute`;
 CREATE TABLE `dbclass_attribute` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment COMMENT '属性ID',
`model_id` int(4) NULL  DEFAULT NULL  COMMENT '模型ID',
`type` tinyint(1) NULL  DEFAULT NULL  COMMENT '输入控件的类型,单选,复选等',
`name` varchar(50) NULL  DEFAULT NULL  COMMENT '名称',
`value` text NULL  DEFAULT NULL  COMMENT '属性值',
`search` tinyint(1) NULL  DEFAULT 0 COMMENT '是否支持搜索0不支持1支持'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='属性表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_find_password`;
 CREATE TABLE `dbclass_find_password` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`user_id` int(11) NOT NULL  COMMENT '用户ID',
`hash` char(32) NOT NULL  COMMENT 'hash值',
`addtime` int(11) NOT NULL  COMMENT '申请找回的时间'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='找回密码' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_guide`;
 CREATE TABLE `dbclass_guide` (
`order` smallint(5) NOT NULL  PRIMARY KEY  COMMENT '排序',
`name` varchar(255) NOT NULL  COMMENT '导航名字',
`link` varchar(255) NOT NULL  COMMENT '链接地址'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='首页导航栏';

DROP TABLE IF EXISTS `dbclass_log_error`;
 CREATE TABLE `dbclass_log_error` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`file` varchar(200) NULL  DEFAULT NULL  COMMENT '文件',
`line` smallint(5) unsigned NOT NULL  COMMENT '出错文件行数',
`content` varchar(500) NULL  DEFAULT NULL  COMMENT '内容',
`datetime` datetime NOT NULL  COMMENT '时间'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='错误日志表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_log_operation`;
 CREATE TABLE `dbclass_log_operation` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`author` varchar(80) NULL  DEFAULT NULL  COMMENT '操作人员',
`action` varchar(200) NULL  DEFAULT NULL  COMMENT '动作',
`content` text NULL  DEFAULT NULL  COMMENT '内容',
`datetime` datetime NOT NULL  COMMENT '时间'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='日志操作记录' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_log_sql`;
 CREATE TABLE `dbclass_log_sql` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`content` varchar(500) NOT NULL  COMMENT '执行的SQL语句',
`runtime` float unsigned NOT NULL  COMMENT '语句执行时间(秒)',
`datetime` datetime NOT NULL  COMMENT '发生的时间'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='SQL日志记录' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_member`;
 CREATE TABLE `dbclass_member` (
`user_id` int(11) NOT NULL  PRIMARY KEY  COMMENT '用户ID',
`true_name` varchar(50) NULL  DEFAULT NULL  COMMENT '真实姓名',
`telephone` varchar(50) NULL  DEFAULT NULL  COMMENT '联系电话',
`mobile` varchar(20) NULL  DEFAULT NULL  COMMENT '手机',
`area` varchar(255) NULL  DEFAULT NULL  COMMENT '地区',
`contact_addr` varchar(250) NULL  DEFAULT NULL  COMMENT '联系地址',
`qq` varchar(15) NULL  DEFAULT NULL  COMMENT 'QQ',
`msn` varchar(250) NULL  DEFAULT NULL  COMMENT 'MSN',
`sex` tinyint(1) NULL  DEFAULT 1 COMMENT '性别1男2女',
`birthday` date NULL  DEFAULT NULL  COMMENT '生日',
`group_id` int(6) NOT NULL  DEFAULT 0 COMMENT '分组',
`exp` int(11) NOT NULL  DEFAULT 0 COMMENT '经验值',
`point` int(11) NOT NULL  DEFAULT 0 COMMENT '积分',
`message_ids` text NULL  DEFAULT NULL  COMMENT '消息ID',
`time` datetime NULL  DEFAULT NULL  COMMENT '注册日期时间',
`zip` varchar(10) NULL  DEFAULT NULL  COMMENT '邮政编码',
`status` tinyint(1) NULL  DEFAULT 1 COMMENT '用户状态 1正常状态 2 删除至回收站 3锁定',
`prop` text NULL  DEFAULT NULL  COMMENT '用户拥有的工具',
`balance` float(10,2) NOT NULL  DEFAULT 0.00 COMMENT '用户余额',
`last_login` datetime NULL  DEFAULT NULL  COMMENT '最后一次登录时间',
`custom` varchar(255) NULL  DEFAULT NULL  COMMENT '用户习惯方式,配送和支付方式等信息'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='用户信息表';

DROP TABLE IF EXISTS `dbclass_message`;
 CREATE TABLE `dbclass_message` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`title` varchar(255) NOT NULL  COMMENT '标题',
`content` text NULL  DEFAULT NULL  COMMENT '内容',
`time` datetime NULL  DEFAULT NULL  COMMENT '发送时间'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='站内消息' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_msg_template`;
 CREATE TABLE `dbclass_msg_template` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`name` varchar(255) NOT NULL  COMMENT '模板名称',
`title` varchar(255) NULL  DEFAULT NULL  COMMENT '标题',
`content` text NOT NULL  COMMENT '模板内容',
`variable` varchar(255) NULL  DEFAULT NULL  COMMENT '模板中的变量标签'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='消息模板表' AUTO_INCREMENT=4;

INSERT INTO `dbclass_msg_template` VALUES( '1','到货通知','最近到货通知','<p>dear：{$user_name}你关注的商品：{$goods_name}已到货，由于此商品近期销售火爆，请及时购买！</p>\n<p>-------IWeb商场</p>','用户名 {$user_name} 商品名 {$goods_name}' ); 
INSERT INTO `dbclass_msg_template` VALUES( '2','网站订阅','2011年1月最新上架商品','2011年1月最新上架商品','' ); 
INSERT INTO `dbclass_msg_template` VALUES( '3','找回密码','IWeb密码找回','<p>dear：{$user_name}：</p><br /><p>您的新密码为{$password},请您尽快登陆用户中心，修改为您常用的密码！</p><br /><p>-------IWeb商场</p><br />','用户名 {$user_name} 新密码 {$password}' ); 
DROP TABLE IF EXISTS `dbclass_navigate`;
 CREATE TABLE `dbclass_navigate` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`name` varchar(255) NOT NULL  COMMENT '名称',
`floor` int(11) NULL  DEFAULT NULL  COMMENT '层次',
`order` int(11) NULL  DEFAULT NULL  COMMENT '顺序',
`url` varchar(255) NULL  DEFAULT NULL  COMMENT '链接'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='导航栏表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_quick_naviga`;
 CREATE TABLE `dbclass_quick_naviga` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`adminid` int(11) NULL  DEFAULT NULL  COMMENT '管理员id',
`naviga_name` varchar(255) NULL  DEFAULT NULL  COMMENT '导航名称',
`url` varchar(255) NULL  DEFAULT NULL  COMMENT '导航链接',
`is_del` tinyint(1) NOT NULL  DEFAULT 0 COMMENT '是否删除1为删除'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='管理员快速导航' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_right`;
 CREATE TABLE `dbclass_right` (
`id` int(10) NOT NULL  PRIMARY KEY auto_increment,
`name` varchar(80) NOT NULL  COMMENT '权限名字',
`right` varchar(255) NOT NULL  COMMENT '权限码(控制器+动作)',
`is_del` tinyint(1) NOT NULL  DEFAULT 0 COMMENT '删除状态 1删除,0正常'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='权限资源码' AUTO_INCREMENT=113;

INSERT INTO `dbclass_right` VALUES( '1','数据库备份[展示]','tools@db_bak','0' ); 
INSERT INTO `dbclass_right` VALUES( '2','数据库备份[动作]','tools@db_act_bak','0' ); 
INSERT INTO `dbclass_right` VALUES( '3','数据库还原[展示]','tools@db_res','0' ); 
INSERT INTO `dbclass_right` VALUES( '4','数据库还原[动作]','tools@res_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '5','数据库备份删除','tools@backup_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '6','数据库备份下载','tools@download','0' ); 
INSERT INTO `dbclass_right` VALUES( '7','数据库备份打包下载','tools@download_pack','0' ); 
INSERT INTO `dbclass_right` VALUES( '8','友情链接添加和修改[展示]','tools@link_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '9','友情链接添加和修改[动作]','tools@link_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '10','友情链接删除','tools@link_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '11','文章删除','tools@article_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '12','文章添加和修改[展示]','tools@article_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '13','文章添加和修改[动作]','tools@article_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '14','文章分类添加和修改[展示]','tools@cat_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '15','文章分类添加和修改[动作]','tools@cat_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '16','文章分类删除','tools@cat_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '17','广告位添加和修改[展示]','tools@ad_position_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '18','广告位添加和修改[动作]','tools@ad_position_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '19','广告位删除','tools@ad_position_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '20','广告添加和修改[展示]','tools@ad_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '21','广告添加和修改[动作]','tools@ad_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '22','广告删除','tools@ad_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '23','帮助列表','tools@help_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '24','帮助添加和修改[展示]','tools@help_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '25','帮助添加和修改[动作]','tools@help_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '26','帮助删除','tools@help_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '27','帮助分类添加和修改[展示]','tools@help_cat_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '28','帮助分类添加和修改[动作]','tools@help_cat_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '29','帮助分类列表','tools@help_cat_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '30','帮助分类位置设置','tools@help_cat_position','0' ); 
INSERT INTO `dbclass_right` VALUES( '31','关键词添加[动作]','tools@keyword_add','0' ); 
INSERT INTO `dbclass_right` VALUES( '32','关键词添加[展示]','tools@keyword_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '33','关键词删除','tools@keyword_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '34','关键词设置热门','tools@keyword_hot','0' ); 
INSERT INTO `dbclass_right` VALUES( '35','关键词排序','tools@keyword_order','0' ); 
INSERT INTO `dbclass_right` VALUES( '36','关键词统计商品数量','tools@keyword_account','0' ); 
INSERT INTO `dbclass_right` VALUES( '37','订单列表','order@order_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '38','订单详情','order@order_show','0' ); 
INSERT INTO `dbclass_right` VALUES( '39','订单添加','order@order_add','0' ); 
INSERT INTO `dbclass_right` VALUES( '40','收款单列表','order@order_collection_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '41','退款单列表','order@order_refundment_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '42','发货单列表','order@order_delivery_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '43','退货单列表','order@order_returns_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '44','退货申请列表','order@refundment_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '45','发货信息列表','order@ship_info_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '46','订单删除','order@order_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '47','收款单删除','order@collection_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '48','退款单删除','order@refundment_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '49','发货单删除','order@delivery_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '50','退货单删除','order@returns_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '51','退款申请删除','order@refundment_doc_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '52','发货信息删除','order@ship_info_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '53','商品模型列表','goods@model_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '54','商品模型修改[展示]','goods@model_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '55','规格列表','goods@spec_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '56','商品规格添加和修改','goods@spec_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '57','商品规格图库','goods@spec_photo','0' ); 
INSERT INTO `dbclass_right` VALUES( '58','商品添加[展示]','goods@goods_add','0' ); 
INSERT INTO `dbclass_right` VALUES( '59','商品修改[展示]','goods@goods_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '60','商品添加[动作]','goods@goods_save','0' ); 
INSERT INTO `dbclass_right` VALUES( '61','商品修改[动作]','goods@goods_update','0' ); 
INSERT INTO `dbclass_right` VALUES( '62','商品列表','goods@goods_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '63','商品分类修改[展示]','goods@category_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '64','商品分类列表','goods@category_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '65','商品模型删除','goods@model_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '66','商品规格删除','goods@spec_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '67','商品删除','goods@goods_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '68','商品分类删除','goods@category_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '69','商品规格图片删除','goods@spec_photo_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '70','会员信息添加和修改','member@member_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '71','会员列表','member@member_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '72','用户组添加和修改[展示]','member@group_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '73','用户组列表','mebmer@group_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '74','会员提现申请','member@withdraw_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '75','会员信息模板列表','member@tpl_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '76','会员到货通知','member@notify_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '77','评论列表','comment@comment_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '78','讨论列表','comment@discussion_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '79','站内消息列表','comment@message_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '80','建议列表','comment@suggestion_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '81','咨询列表','comment@refer_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '82','代金券列表','market@ticket_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '83','代金券文件列表','market@ticket_excel_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '84','促销规则列表','market@pro_rule_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '85','促销规则添加和修改[展示]','market@pro_rule_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '86','显示抢购列表','market@pro_speed_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '87','团购列表','market@regiment_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '88','促销规则删除','market@pro_rule_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '89','团购删除','market@regiment_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '90','限时抢购删除','market@pro_speed_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '91','代金券删除','market@ticket_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '92','代金券实体删除','market@ticket_more_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '93','代金券实体文件删除','market@ticket_excel_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '94','资金操作记录','market@account_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '95','文章列表','tools@article_list','0' ); 
INSERT INTO `dbclass_right` VALUES( '96','商品模型修改[动作]','goods@model_update','0' ); 
INSERT INTO `dbclass_right` VALUES( '97','商品排序[动作]','goods@goods_sort','0' ); 
INSERT INTO `dbclass_right` VALUES( '98','商品回收站删除[动作]','goods@goods_recycle_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '99','商品规格回收站删除[动作]','goods@spec_recycle_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '100','生成缩略图[动作]','block@create_thumb','1' ); 
INSERT INTO `dbclass_right` VALUES( '101','建议详细页面','comment@suggestion_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '102','建议恢复[动作]','comment@suggestion_edit_act','0' ); 
INSERT INTO `dbclass_right` VALUES( '103','建议删除[动作]','comment@suggestion_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '104','评价详情页面','comment@comment_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '105','评价删除[动作]','comment@comment_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '106','讨论详情页面','comment@discussion_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '107','讨论删除[动作]','comment@discussion_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '108','咨询删除[动作]','comment@refer_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '109','咨询详情页面','comment@refer_edit','0' ); 
INSERT INTO `dbclass_right` VALUES( '110','咨询回复[动作]','comment@refer_reply','0' ); 
INSERT INTO `dbclass_right` VALUES( '111','站内信删除','comment@message_del','0' ); 
INSERT INTO `dbclass_right` VALUES( '112','站内信发送','comment@message_send','0' ); 
DROP TABLE IF EXISTS `dbclass_search`;
 CREATE TABLE `dbclass_search` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`keyword` varchar(255) NOT NULL  COMMENT '搜索关键字',
`num` int(5) NULL  DEFAULT 0 COMMENT '搜索次数'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='搜索关键字' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_user`;
 CREATE TABLE `dbclass_user` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment,
`username` varchar(20) NOT NULL  UNIQUE KEY  COMMENT '用户名',
`password` char(32) NOT NULL  COMMENT '密码',
`email` varchar(250) NULL  DEFAULT NULL  COMMENT 'Email',
`head_ico` varchar(250) NULL  DEFAULT NULL  COMMENT '头像'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `dbclass_user_group`;
 CREATE TABLE `dbclass_user_group` (
`id` int(11) NOT NULL  PRIMARY KEY auto_increment COMMENT '用户组ID',
`group_name` varchar(20) NOT NULL  COMMENT '组名',
`discount` float NOT NULL  DEFAULT 0 COMMENT '折扣率',
`minexp` int(11) NULL  DEFAULT NULL  COMMENT '最小经验',
`maxexp` int(11) NULL  DEFAULT NULL  COMMENT '最大经验',
`message_ids` varchar(255) NULL  DEFAULT NULL  COMMENT '消息ID'
 ) ENGINE=MyISAM CHARSET=utf8 COMMENT='用户组' AUTO_INCREMENT=1;

