-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 05 月 05 日 08:31
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dbclass`
--

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_address`
--

CREATE TABLE IF NOT EXISTS `dbclass_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `accept_name` varchar(20) NOT NULL COMMENT '收货人姓名',
  `zip` varchar(6) DEFAULT NULL COMMENT '邮编',
  `telphone` varchar(20) DEFAULT NULL COMMENT '联系电话',
  `country` int(11) DEFAULT NULL COMMENT '国ID',
  `province` int(11) NOT NULL COMMENT '省ID',
  `city` int(11) NOT NULL COMMENT '市ID',
  `area` int(11) DEFAULT NULL COMMENT '区ID',
  `address` varchar(250) DEFAULT NULL COMMENT '收货地址',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否默认,0:为非默认,1:默认',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收货信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admin`
--

CREATE TABLE IF NOT EXISTS `dbclass_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_name` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '最后登录IP',
  `last_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除状态 1删除,0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dbclass_admin`
--

INSERT INTO `dbclass_admin` (`id`, `admin_name`, `password`, `role_id`, `create_time`, `email`, `last_ip`, `last_time`, `is_del`) VALUES
(1, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 0, '2012-04-19 12:40:23', NULL, '0.0.0.0', '2012-05-05 15:23:14', 0),
(2, 'abcd', 'e10adc3949ba59abbe56e057f20f883e', 1, '2012-05-03 10:37:24', '499139122@qq.com', '0.0.0.0', '2012-05-03 10:38:39', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admin_role`
--

CREATE TABLE IF NOT EXISTS `dbclass_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `rights` text COMMENT '权限',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除状态 1删除,0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台角色分组表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admin_role`
--

INSERT INTO `dbclass_admin_role` (`id`, `name`, `rights`, `is_del`) VALUES
(1, '痛苦', ',block@create_thumb,comment@comment_del,comment@comment_list,comment@discussion_del,comment@discussion_list,comment@message_del,comment@message_send,comment@refer_del,comment@refer_list,comment@refer_reply,comment@suggestion_edit,comment@suggestion_edit_act,goods@category_del,goods@goods_add,goods@goods_list,goods@goods_sort,goods@model_edit,goods@spec_del,goods@spec_photo,', 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_ammiot_type`
--

CREATE TABLE IF NOT EXISTS `dbclass_ammiot_type` (
  `id` int(11) NOT NULL,
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `mnemonics_en` varchar(200) NOT NULL COMMENT '英文简称',
  `mnemonics_ch` varchar(200) NOT NULL COMMENT '中文简称',
  `front_colot` varchar(200) NOT NULL COMMENT '前景色',
  `background_color` varchar(200) NOT NULL COMMENT '背景色',
  `is_bold` int(11) NOT NULL COMMENT '粗体',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='羊膜类型';

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_anesthesia_pro`
--

CREATE TABLE IF NOT EXISTS `dbclass_anesthesia_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `mnemonics_en` varchar(200) NOT NULL COMMENT '英文简称',
  `mnemonics_ch` varchar(200) NOT NULL COMMENT '中文简称',
  `front_color` varchar(200) NOT NULL COMMENT '前景色',
  `background_color` varchar(200) NOT NULL COMMENT '背景色',
  `is_bold` int(11) NOT NULL COMMENT '粗体:1',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='麻醉问题' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_anethesia`
--

CREATE TABLE IF NOT EXISTS `dbclass_anethesia` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `mnemonic_ch` varchar(200) NOT NULL COMMENT '中文简称',
  `mnemonic_en` varchar(200) NOT NULL COMMENT '英文简称',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `front_color` varchar(200) NOT NULL COMMENT '前景色',
  `background_color` varchar(200) NOT NULL COMMENT '背景色',
  `is_bold` int(11) NOT NULL COMMENT '1表示粗体',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='麻醉' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_attribute`
--

CREATE TABLE IF NOT EXISTS `dbclass_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '属性ID',
  `model_id` int(4) DEFAULT NULL COMMENT '模型ID',
  `type` tinyint(1) DEFAULT NULL COMMENT '输入控件的类型,单选,复选等',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `value` text COMMENT '属性值',
  `search` tinyint(1) DEFAULT '0' COMMENT '是否支持搜索0不支持1支持',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='属性表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_beds_type`
--

CREATE TABLE IF NOT EXISTS `dbclass_beds_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `hospital_id` int(11) NOT NULL COMMENT 'id of hospital',
  `department` int(11) NOT NULL COMMENT 'id of department',
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='病床图' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_department_type`
--

CREATE TABLE IF NOT EXISTS `dbclass_department_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name_en` varchar(200) NOT NULL COMMENT 'name of department',
  `name_ch` varchar(200) NOT NULL COMMENT '科室名称',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='科室分类' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_find_password`
--

CREATE TABLE IF NOT EXISTS `dbclass_find_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `hash` char(32) NOT NULL COMMENT 'hash值',
  `addtime` int(11) NOT NULL COMMENT '申请找回的时间',
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='找回密码' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_guide`
--

CREATE TABLE IF NOT EXISTS `dbclass_guide` (
  `order` smallint(5) NOT NULL COMMENT '排序',
  `name` varchar(255) NOT NULL COMMENT '导航名字',
  `link` varchar(255) NOT NULL COMMENT '链接地址',
  PRIMARY KEY (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='首页导航栏';

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_hospital_detail`
--

CREATE TABLE IF NOT EXISTS `dbclass_hospital_detail` (
  `hospital_name_ch` varchar(200) NOT NULL COMMENT '医院中文名',
  `hospital_name_en` varchar(200) NOT NULL COMMENT 'hospital_english_name',
  `hospital_adress_ch` varchar(200) NOT NULL COMMENT '医院地址',
  `hospital_adress_en` varchar(200) NOT NULL,
  `hospital_province_ch` varchar(200) NOT NULL COMMENT '医院所在省',
  `hospital_province_en` varchar(200) NOT NULL,
  `hospital_zipcode` int(20) NOT NULL COMMENT '邮编/zipcode',
  `visited_date_b` date NOT NULL COMMENT 'begin date of visit',
  `visited_date_e` date NOT NULL COMMENT 'end date of visit',
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='医院详细信息表/hospital_detail' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbclass_hospital_detail`
--

INSERT INTO `dbclass_hospital_detail` (`hospital_name_ch`, `hospital_name_en`, `hospital_adress_ch`, `hospital_adress_en`, `hospital_province_ch`, `hospital_province_en`, `hospital_zipcode`, `visited_date_b`, `visited_date_e`, `id`) VALUES
('宁波市妇女儿童医院', 'Ningbo Women & Children''s Hospital', '宁波市柳汀街339号 电话：0574-87083300', '399 Liuding Road， Ningbo ', '浙江', 'Zhejiang', 315012, '2011-08-13', '2011-08-21', 1),
('（上海）中国福利会国际和平妇幼保健院', '(Shanghai) International Peace Maternity & Child Health Hospital of the China Welfare Institute', '上海市徐汇区衡山路910号，电话： 021-64070434', '910 Hengsan Road, Shanghai  ', '上海', 'Shanghai', 200030, '2012-05-01', '2012-05-31', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_log_error`
--

CREATE TABLE IF NOT EXISTS `dbclass_log_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) DEFAULT NULL COMMENT '文件',
  `line` smallint(5) unsigned NOT NULL COMMENT '出错文件行数',
  `content` varchar(500) DEFAULT NULL COMMENT '内容',
  `datetime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='错误日志表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_log_operation`
--

CREATE TABLE IF NOT EXISTS `dbclass_log_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(80) DEFAULT NULL COMMENT '操作人员',
  `action` varchar(200) DEFAULT NULL COMMENT '动作',
  `content` text COMMENT '内容',
  `datetime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='日志操作记录' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_log_sql`
--

CREATE TABLE IF NOT EXISTS `dbclass_log_sql` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL COMMENT '执行的SQL语句',
  `runtime` float unsigned NOT NULL COMMENT '语句执行时间(秒)',
  `datetime` datetime NOT NULL COMMENT '发生的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SQL日志记录' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_member`
--

CREATE TABLE IF NOT EXISTS `dbclass_member` (
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `true_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `telephone` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `area` varchar(255) DEFAULT NULL COMMENT '地区',
  `contact_addr` varchar(250) DEFAULT NULL COMMENT '联系地址',
  `qq` varchar(15) DEFAULT NULL COMMENT 'QQ',
  `msn` varchar(250) DEFAULT NULL COMMENT 'MSN',
  `sex` tinyint(1) DEFAULT '1' COMMENT '性别1男2女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `group_id` int(6) NOT NULL DEFAULT '0' COMMENT '分组',
  `exp` int(11) NOT NULL DEFAULT '0' COMMENT '经验值',
  `point` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `message_ids` text COMMENT '消息ID',
  `time` datetime DEFAULT NULL COMMENT '注册日期时间',
  `zip` varchar(10) DEFAULT NULL COMMENT '邮政编码',
  `status` tinyint(1) DEFAULT '1' COMMENT '用户状态 1正常状态 2 删除至回收站 3锁定',
  `prop` text COMMENT '用户拥有的工具',
  `balance` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户余额',
  `last_login` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  `custom` varchar(255) DEFAULT NULL COMMENT '用户习惯方式,配送和支付方式等信息',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_message`
--

CREATE TABLE IF NOT EXISTS `dbclass_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `time` datetime DEFAULT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='站内消息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_msg_template`
--

CREATE TABLE IF NOT EXISTS `dbclass_msg_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '模板名称',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '模板内容',
  `variable` varchar(255) DEFAULT NULL COMMENT '模板中的变量标签',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息模板表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbclass_msg_template`
--

INSERT INTO `dbclass_msg_template` (`id`, `name`, `title`, `content`, `variable`) VALUES
(1, '到货通知', '最近到货通知', '<p>dear：{$user_name}你关注的商品：{$goods_name}已到货，由于此商品近期销售火爆，请及时购买！</p>\n<p>-------IWeb商场</p>', '用户名 {$user_name} 商品名 {$goods_name}'),
(2, '网站订阅', '2011年1月最新上架商品', '2011年1月最新上架商品', NULL),
(3, '找回密码', 'IWeb密码找回', '<p>dear：{$user_name}：</p><br /><p>您的新密码为{$password},请您尽快登陆用户中心，修改为您常用的密码！</p><br /><p>-------IWeb商场</p><br />', '用户名 {$user_name} 新密码 {$password}');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_navigate`
--

CREATE TABLE IF NOT EXISTS `dbclass_navigate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '名称',
  `floor` int(11) DEFAULT NULL COMMENT '层次',
  `order` int(11) DEFAULT NULL COMMENT '顺序',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='导航栏表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_patient_status`
--

CREATE TABLE IF NOT EXISTS `dbclass_patient_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `front_color` varchar(200) NOT NULL COMMENT '前景色',
  `background_color` varchar(200) NOT NULL COMMENT '背景色',
  `is_bold` varchar(200) NOT NULL COMMENT '粗体：1',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='病人状态' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_presentation`
--

CREATE TABLE IF NOT EXISTS `dbclass_presentation` (
  `id` int(11) NOT NULL,
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='简称';

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_quick_naviga`
--

CREATE TABLE IF NOT EXISTS `dbclass_quick_naviga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) DEFAULT NULL COMMENT '管理员id',
  `naviga_name` varchar(255) DEFAULT NULL COMMENT '导航名称',
  `url` varchar(255) DEFAULT NULL COMMENT '导航链接',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除1为删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员快速导航' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_right`
--

CREATE TABLE IF NOT EXISTS `dbclass_right` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '权限名字',
  `right` varchar(255) NOT NULL COMMENT '权限码(控制器+动作)',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除状态 1删除,0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限资源码' AUTO_INCREMENT=114 ;

--
-- 转存表中的数据 `dbclass_right`
--

INSERT INTO `dbclass_right` (`id`, `name`, `right`, `is_del`) VALUES
(1, '数据库备份[展示]', 'tools@db_bak', 0),
(2, '数据库备份[动作]', 'tools@db_act_bak', 0),
(3, '数据库还原[展示]', 'tools@db_res', 0),
(4, '数据库还原[动作]', 'tools@res_act', 0),
(5, '数据库备份删除', 'tools@backup_del', 0),
(6, '数据库备份下载', 'tools@download', 0),
(7, '数据库备份打包下载', 'tools@download_pack', 0),
(8, '友情链接添加和修改[展示]', 'tools@link_edit', 0),
(9, '友情链接添加和修改[动作]', 'tools@link_edit_act', 0),
(10, '友情链接删除', 'tools@link_del', 0),
(11, '文章删除', 'tools@article_del', 0),
(12, '文章添加和修改[展示]', 'tools@article_edit', 0),
(13, '文章添加和修改[动作]', 'tools@article_edit_act', 0),
(14, '文章分类添加和修改[展示]', 'tools@cat_edit', 0),
(15, '文章分类添加和修改[动作]', 'tools@cat_edit_act', 0),
(16, '文章分类删除', 'tools@cat_del', 0),
(17, '广告位添加和修改[展示]', 'tools@ad_position_edit', 0),
(18, '广告位添加和修改[动作]', 'tools@ad_position_edit_act', 0),
(19, '广告位删除', 'tools@ad_position_del', 0),
(20, '广告添加和修改[展示]', 'tools@ad_edit', 0),
(21, '广告添加和修改[动作]', 'tools@ad_edit_act', 0),
(22, '广告删除', 'tools@ad_del', 0),
(23, '帮助列表', 'tools@help_list', 0),
(24, '帮助添加和修改[展示]', 'tools@help_edit', 0),
(25, '帮助添加和修改[动作]', 'tools@help_edit_act', 0),
(26, '帮助删除', 'tools@help_del', 0),
(27, '帮助分类添加和修改[展示]', 'tools@help_cat_edit', 0),
(28, '帮助分类添加和修改[动作]', 'tools@help_cat_edit_act', 0),
(29, '帮助分类列表', 'tools@help_cat_list', 0),
(30, '帮助分类位置设置', 'tools@help_cat_position', 0),
(31, '关键词添加[动作]', 'tools@keyword_add', 0),
(32, '关键词添加[展示]', 'tools@keyword_edit', 0),
(33, '关键词删除', 'tools@keyword_del', 0),
(34, '关键词设置热门', 'tools@keyword_hot', 0),
(35, '关键词排序', 'tools@keyword_order', 0),
(36, '关键词统计商品数量', 'tools@keyword_account', 0),
(37, '订单列表', 'order@order_list', 0),
(38, '订单详情', 'order@order_show', 0),
(39, '订单添加', 'order@order_add', 0),
(40, '收款单列表', 'order@order_collection_list', 0),
(41, '退款单列表', 'order@order_refundment_list', 0),
(42, '发货单列表', 'order@order_delivery_list', 0),
(43, '退货单列表', 'order@order_returns_list', 0),
(44, '退货申请列表', 'order@refundment_list', 0),
(45, '发货信息列表', 'order@ship_info_list', 0),
(46, '订单删除', 'order@order_del', 0),
(47, '收款单删除', 'order@collection_del', 0),
(48, '退款单删除', 'order@refundment_del', 0),
(49, '发货单删除', 'order@delivery_del', 0),
(50, '退货单删除', 'order@returns_del', 0),
(51, '退款申请删除', 'order@refundment_doc_del', 0),
(52, '发货信息删除', 'order@ship_info_del', 0),
(53, '商品模型列表', 'goods@model_list', 0),
(54, '商品模型修改[展示]', 'goods@model_edit', 0),
(55, '规格列表', 'goods@spec_list', 0),
(56, '商品规格添加和修改', 'goods@spec_edit', 0),
(57, '商品规格图库', 'goods@spec_photo', 0),
(58, '商品添加[展示]', 'goods@goods_add', 0),
(59, '商品修改[展示]', 'goods@goods_edit', 0),
(60, '商品添加[动作]', 'goods@goods_save', 0),
(61, '商品修改[动作]', 'goods@goods_update', 0),
(62, '商品列表', 'goods@goods_list', 0),
(63, '商品分类修改[展示]', 'goods@category_edit', 0),
(64, '商品分类列表', 'goods@category_list', 0),
(65, '商品模型删除', 'goods@model_del', 0),
(66, '商品规格删除', 'goods@spec_del', 0),
(67, '商品删除', 'goods@goods_del', 0),
(68, '商品分类删除', 'goods@category_del', 0),
(69, '商品规格图片删除', 'goods@spec_photo_del', 0),
(70, '会员信息添加和修改', 'member@member_edit', 0),
(71, '会员列表', 'member@member_list', 0),
(72, '用户组添加和修改[展示]', 'member@group_edit', 0),
(73, '用户组列表', 'mebmer@group_list', 0),
(74, '会员提现申请', 'member@withdraw_list', 0),
(75, '会员信息模板列表', 'member@tpl_list', 0),
(76, '会员到货通知', 'member@notify_list', 0),
(77, '评论列表', 'comment@comment_list', 0),
(78, '讨论列表', 'comment@discussion_list', 0),
(79, '站内消息列表', 'comment@message_list', 0),
(80, '建议列表', 'comment@suggestion_list', 0),
(81, '咨询列表', 'comment@refer_list', 0),
(82, '代金券列表', 'market@ticket_list', 0),
(83, '代金券文件列表', 'market@ticket_excel_list', 0),
(84, '促销规则列表', 'market@pro_rule_list', 0),
(85, '促销规则添加和修改[展示]', 'market@pro_rule_edit', 0),
(86, '显示抢购列表', 'market@pro_speed_list', 0),
(87, '团购列表', 'market@regiment_list', 0),
(88, '促销规则删除', 'market@pro_rule_del', 0),
(89, '团购删除', 'market@regiment_del', 0),
(90, '限时抢购删除', 'market@pro_speed_del', 0),
(91, '代金券删除', 'market@ticket_del', 0),
(92, '代金券实体删除', 'market@ticket_more_del', 0),
(93, '代金券实体文件删除', 'market@ticket_excel_del', 0),
(94, '资金操作记录', 'market@account_list', 0),
(95, '文章列表', 'tools@article_list', 0),
(96, '商品模型修改[动作]', 'goods@model_update', 0),
(97, '商品排序[动作]', 'goods@goods_sort', 0),
(98, '商品回收站删除[动作]', 'goods@goods_recycle_del', 0),
(99, '商品规格回收站删除[动作]', 'goods@spec_recycle_del', 0),
(100, '生成缩略图[动作]', 'block@create_thumb', 0),
(101, '建议详细页面', 'comment@suggestion_edit', 0),
(102, '建议恢复[动作]', 'comment@suggestion_edit_act', 0),
(103, '建议删除[动作]', 'comment@suggestion_del', 0),
(104, '评价详情页面', 'comment@comment_edit', 0),
(105, '评价删除[动作]', 'comment@comment_del', 0),
(106, '讨论详情页面', 'comment@discussion_edit', 0),
(107, '讨论删除[动作]', 'comment@discussion_del', 0),
(108, '咨询删除[动作]', 'comment@refer_del', 0),
(109, '咨询详情页面', 'comment@refer_edit', 0),
(110, '咨询回复[动作]', 'comment@refer_reply', 0),
(111, '站内信删除', 'comment@message_del', 0),
(112, '站内信发送', 'comment@message_send', 0),
(113, '邮件测试', 'system@test_sendmail', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_search`
--

CREATE TABLE IF NOT EXISTS `dbclass_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL COMMENT '搜索关键字',
  `num` int(5) DEFAULT '0' COMMENT '搜索次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='搜索关键字' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_user`
--

CREATE TABLE IF NOT EXISTS `dbclass_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(250) DEFAULT NULL COMMENT 'Email',
  `head_ico` varchar(250) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_user_group`
--

CREATE TABLE IF NOT EXISTS `dbclass_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户组ID',
  `group_name` varchar(20) NOT NULL COMMENT '组名',
  `discount` float NOT NULL DEFAULT '0' COMMENT '折扣率',
  `minexp` int(11) DEFAULT NULL COMMENT '最小经验',
  `maxexp` int(11) DEFAULT NULL COMMENT '最大经验',
  `message_ids` varchar(255) DEFAULT NULL COMMENT '消息ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
