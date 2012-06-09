-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 09 日 07:39
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `diantaoba`
--

-- --------------------------------------------------------

--
-- 替换视图以便查看 `dbclass_addmission_view`
--
CREATE TABLE IF NOT EXISTS `dbclass_addmission_view` (
`id` int(11)
,`name` varchar(200)
,`date` date
,`hospital_id` int(11)
,`hospital` varchar(11)
,`pre_sympton` varchar(200)
,`other` varchar(200)
,`scheduled_provedure` varchar(200)
,`current_medication` varchar(200)
,`current_risk` varchar(200)
,`pre_risk` varchar(200)
,`medical_surgical_hx` varchar(200)
,`allergies` varchar(200)
,`reaction` varchar(200)
,`nkda` int(11)
,`allergy` int(11)
,`time` date
,`unit` int(11)
,`form_where` int(11)
,`accompany` varchar(200)
,`add_nurse` varchar(200)
,`via` int(11)
,`uterus` int(11)
,`contraction` varchar(200)
,`contruction_date` date
,`fetal_movement` int(200)
,`fetal_date` date
,`membranes` int(11)
,`membranes_date` date
,`recent_intercourse` date
,`s_p` varchar(200)
,`age` int(20)
,`gracida` int(11)
,`term` varchar(200)
,`preter` varchar(200)
,`antibdy` varchar(200)
,`living` varchar(200)
,`lmp` varchar(200)
,`ega` varchar(200)
,`edc` varchar(200)
,`ht` varchar(200)
,`wt` varchar(200)
,`wt_gain` varchar(200)
,`status` int(11)
,`blood_type` varchar(11)
,`antibody` varchar(45)
,`rubella` varchar(11)
,`hbsag` varchar(45)
,`vdrl` int(11)
,`vdrl_date` date
,`gbbs` varchar(45)
,`hiv` varchar(45)
,`ppd` varchar(45)
,`cxr` varchar(45)
,`iv_start_location` varchar(200)
,`iv_start_size` int(11)
,`fluid_type_rate` varchar(45)
,`fluid_glucose` varchar(45)
,`sse_examiner` varchar(45)
,`sse_date_time` date
,`sse_intact` int(11)
,`sse_rom_color` varchar(45)
,`sse_ferning` int(11)
,`sse_nitrazine` int(11)
,`sse_pooling` int(11)
,`sse_is_labs_sent` int(11)
,`sse_labs_sent` varchar(45)
,`sse_is_urine_sent` int(11)
,`sse_urine_sent` varchar(45)
,`sse_is_cultures_sent` int(11)
,`sse_cultures_sent` varchar(45)
,`sse_is_other` int(11)
,`sse_other` varchar(45)
,`urinalysis_sgravity` varchar(45)
,`urinalysis_color` varchar(45)
,`urinalysis_apprnce` varchar(45)
,`urinalysis_leuo` varchar(45)
,`urinalysis_heme` varchar(45)
,`urinalysis_glucose` varchar(45)
,`urinalysis_ketones` varchar(45)
,`urinalysis_protein` varchar(45)
,`initial` int(11)
,`initial_date` date
,`edc_by_us` date
,`ega_by_us` int(11)
,`final_edc` date
,`blood_transfusion_solid` int(11)
,`pre_c_s` int(11)
,`attempted` int(11)
,`last_intake_solid` date
,`lasr_intake_fluid` date
,`research_sudies` varchar(11)
,`ambulation_em_off` varchar(11)
,`ambulation_walking_for` int(11)
,`disposition_date` date
,`disposition_admitted` varchar(45)
,`disposition_via` int(11)
,`disposition_report_given` varchar(45)
,`ida` int(11)
,`clinical_nutrition_consult` int(11)
,`home_with_instruction` int(11)
,`verbalizes_understand` int(11)
,`discharge_ama` int(11)
,`social_work_center_consult` int(11)
);
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
  `hospital_id` varchar(200) NOT NULL DEFAULT '0' COMMENT '医院id',
  `admin_name` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '最后登录IP',
  `last_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除状态 1删除,0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员用户表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbclass_admin`
--

INSERT INTO `dbclass_admin` (`id`, `hospital_id`, `admin_name`, `password`, `role_id`, `create_time`, `email`, `last_ip`, `last_time`, `is_del`) VALUES
(1, '0', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 0, '2012-04-19 12:40:23', NULL, '127.0.0.1', '2012-06-09 14:55:18', 0),
(4, '1', 'a123', 'e10adc3949ba59abbe56e057f20f883e', 3, '2012-05-09 19:16:28', NULL, '218.75.123.171', '2012-05-21 15:09:51', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台角色分组表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbclass_admin_role`
--

INSERT INTO `dbclass_admin_role` (`id`, `name`, `rights`, `is_del`) VALUES
(2, '护士', ',block@create_thumb,comment@comment_list,comment@discussion_list,', 0),
(3, '院长', ',hospital@providers_list,hospital@providers_list_data,mastercode@hospital_edit,', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_complaint`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `pre_sympton` varchar(200) DEFAULT NULL,
  `other` varchar(200) DEFAULT NULL,
  `scheduled_provedure` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='入院主诉' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dbclass_admission_complaint`
--

INSERT INTO `dbclass_admission_complaint` (`id`, `basic_id`, `pre_sympton`, `other`, `scheduled_provedure`) VALUES
(2, '1', '1,2,4,5,9,10', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_current_info`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_current_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) NOT NULL,
  `current_medication` varchar(200) DEFAULT NULL,
  `current_risk` varchar(200) DEFAULT NULL,
  `pre_risk` varchar(200) DEFAULT NULL,
  `medical_surgical_hx` varchar(200) DEFAULT NULL,
  `allergies` varchar(200) DEFAULT NULL,
  `reaction` varchar(200) DEFAULT NULL,
  `nkda` int(11) DEFAULT NULL,
  `allergy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产妇目前的状况' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_current_info`
--

INSERT INTO `dbclass_admission_current_info` (`id`, `basic_id`, `current_medication`, `current_risk`, `pre_risk`, `medical_surgical_hx`, `allergies`, `reaction`, `nkda`, `allergy`) VALUES
(1, '1', 'panfeng1', 'ASDF', 'ASDF', 'panfeng3', 'panfeng4', 'ASDFASDF', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_detail_info`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_detail_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `form_where` int(11) DEFAULT NULL,
  `accompany` varchar(200) DEFAULT NULL,
  `add_nurse` varchar(200) DEFAULT NULL,
  `via` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='入院基本情况' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_detail_info`
--

INSERT INTO `dbclass_admission_detail_info` (`id`, `basic_id`, `time`, `unit`, `form_where`, `accompany`, `add_nurse`, `via`) VALUES
(1, '1', '2012-05-10', 1, 2, 'panfeng', 'panfeng', 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_ob_assessment`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_ob_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uterus` int(11) DEFAULT NULL,
  `contraction` varchar(200) DEFAULT NULL,
  `contruction_date` date DEFAULT NULL,
  `fetal_movement` int(200) DEFAULT NULL,
  `fetal_date` date DEFAULT NULL,
  `membranes` int(11) DEFAULT NULL,
  `membranes_date` date DEFAULT NULL,
  `recent_intercourse` date DEFAULT NULL,
  `s_p` varchar(200) DEFAULT NULL,
  `basic_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产科评估' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_ob_assessment`
--

INSERT INTO `dbclass_admission_ob_assessment` (`id`, `uterus`, `contraction`, `contruction_date`, `fetal_movement`, `fetal_date`, `membranes`, `membranes_date`, `recent_intercourse`, `s_p`, `basic_id`) VALUES
(1, 1, 'asdf', '2012-05-17', 1, '2012-05-12', 0, '2012-05-14', '2012-05-21', '0', '1');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_ob_physical_info`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_ob_physical_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `gracida` int(11) DEFAULT NULL,
  `term` varchar(200) DEFAULT NULL,
  `preter` varchar(200) DEFAULT NULL,
  `antibdy` varchar(200) DEFAULT NULL,
  `living` varchar(200) DEFAULT NULL,
  `lmp` varchar(200) DEFAULT NULL,
  `ega` varchar(200) DEFAULT NULL,
  `edc` varchar(200) DEFAULT NULL,
  `ht` varchar(200) DEFAULT NULL,
  `wt` varchar(200) DEFAULT NULL,
  `wt_gain` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产妇基本信息' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dbclass_admission_ob_physical_info`
--

INSERT INTO `dbclass_admission_ob_physical_info` (`id`, `basic_id`, `age`, `gracida`, `term`, `preter`, `antibdy`, `living`, `lmp`, `ega`, `edc`, `ht`, `wt`, `wt_gain`) VALUES
(2, '1', 0, 5, 'asdf', 'asdf', 'asdf', '4', '156', 'asdf', 'asdf', 'adsf', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_prenatal_labs`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_prenatal_labs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `blood_type` varchar(11) DEFAULT NULL,
  `antibody` varchar(45) DEFAULT NULL,
  `rubella` varchar(11) DEFAULT NULL,
  `hbsag` varchar(45) DEFAULT NULL,
  `vdrl` int(11) DEFAULT NULL,
  `vdrl_date` date DEFAULT NULL,
  `gbbs` varchar(45) DEFAULT NULL,
  `hiv` varchar(45) DEFAULT NULL,
  `ppd` varchar(45) DEFAULT NULL,
  `cxr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产前实验室' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_prenatal_labs`
--

INSERT INTO `dbclass_admission_prenatal_labs` (`id`, `basic_id`, `status`, `blood_type`, `antibody`, `rubella`, `hbsag`, `vdrl`, `vdrl_date`, `gbbs`, `hiv`, `ppd`, `cxr`) VALUES
(1, '1', 1, 'A', 'ALL', '1', '1', 1, '2012-05-10', '20', '1', '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_procedures`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) NOT NULL,
  `iv_start_location` varchar(200) DEFAULT NULL,
  `iv_start_size` int(11) DEFAULT NULL,
  `fluid_type_rate` varchar(45) DEFAULT NULL,
  `fluid_glucose` varchar(45) DEFAULT NULL,
  `sse_examiner` varchar(45) DEFAULT NULL,
  `sse_date_time` date DEFAULT NULL,
  `sse_intact` int(11) DEFAULT NULL,
  `sse_rom_color` varchar(45) DEFAULT NULL,
  `sse_ferning` int(11) DEFAULT NULL,
  `sse_nitrazine` int(11) DEFAULT NULL,
  `sse_pooling` int(11) DEFAULT NULL,
  `sse_is_labs_sent` int(11) DEFAULT NULL,
  `sse_labs_sent` varchar(45) DEFAULT NULL,
  `sse_is_urine_sent` int(11) DEFAULT NULL,
  `sse_urine_sent` varchar(45) DEFAULT NULL,
  `sse_is_cultures_sent` int(11) DEFAULT NULL,
  `sse_cultures_sent` varchar(45) DEFAULT NULL,
  `sse_is_other` int(11) DEFAULT NULL,
  `sse_other` varchar(45) DEFAULT NULL,
  `urinalysis_sgravity` varchar(45) DEFAULT NULL,
  `urinalysis_color` varchar(45) DEFAULT NULL,
  `urinalysis_apprnce` varchar(45) DEFAULT NULL,
  `urinalysis_leuo` varchar(45) DEFAULT NULL,
  `urinalysis_heme` varchar(45) DEFAULT NULL,
  `urinalysis_glucose` varchar(45) DEFAULT NULL,
  `urinalysis_ketones` varchar(45) DEFAULT NULL,
  `urinalysis_protein` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='入院-操作' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_procedures`
--

INSERT INTO `dbclass_admission_procedures` (`id`, `basic_id`, `iv_start_location`, `iv_start_size`, `fluid_type_rate`, `fluid_glucose`, `sse_examiner`, `sse_date_time`, `sse_intact`, `sse_rom_color`, `sse_ferning`, `sse_nitrazine`, `sse_pooling`, `sse_is_labs_sent`, `sse_labs_sent`, `sse_is_urine_sent`, `sse_urine_sent`, `sse_is_cultures_sent`, `sse_cultures_sent`, `sse_is_other`, `sse_other`, `urinalysis_sgravity`, `urinalysis_color`, `urinalysis_apprnce`, `urinalysis_leuo`, `urinalysis_heme`, `urinalysis_glucose`, `urinalysis_ketones`, `urinalysis_protein`) VALUES
(1, '1', 'asdf', 12, '15', '12.4', '.12.', '2012-05-09', 0, '红色', 1, 2, 1, 1, 'asdf', 1, 'asdf', 1, 'asdf', 1, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_procedures_other`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_procedures_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `is_research_sudies` int(11) NOT NULL,
  `research_sudies` varchar(11) DEFAULT NULL,
  `ambulation_em_off` varchar(11) DEFAULT NULL,
  `ambulation_walking_for` int(11) DEFAULT NULL,
  `disposition_date` date DEFAULT NULL,
  `disposition_admitted` varchar(45) DEFAULT NULL,
  `disposition_via` int(11) DEFAULT NULL,
  `disposition_report_given` varchar(45) DEFAULT NULL,
  `ida` int(11) DEFAULT NULL,
  `clinical_nutrition_consult` int(11) DEFAULT NULL,
  `home_with_instruction` int(11) DEFAULT NULL,
  `verbalizes_understand` int(11) DEFAULT NULL,
  `discharge_ama` int(11) DEFAULT NULL,
  `social_work_center_consult` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='剩余操作' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_procedures_other`
--

INSERT INTO `dbclass_admission_procedures_other` (`id`, `basic_id`, `is_research_sudies`, `research_sudies`, `ambulation_em_off`, `ambulation_walking_for`, `disposition_date`, `disposition_admitted`, `disposition_via`, `disposition_report_given`, `ida`, `clinical_nutrition_consult`, `home_with_instruction`, `verbalizes_understand`, `discharge_ama`, `social_work_center_consult`) VALUES
(1, '1', 2, 'asdf', 'asdf', 12, '2012-05-01', 'asdf', 1, 'asdf', 1, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_admission_ultrasound_other`
--

CREATE TABLE IF NOT EXISTS `dbclass_admission_ultrasound_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` varchar(11) DEFAULT NULL,
  `initial` int(11) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `edc_by_us` date DEFAULT NULL,
  `ega_by_us` int(11) DEFAULT NULL,
  `final_edc` date DEFAULT NULL,
  `blood_transfusion_solid` int(11) DEFAULT NULL,
  `pre_c_s` int(11) DEFAULT NULL,
  `attempted` int(11) DEFAULT NULL,
  `last_intake_solid` date DEFAULT NULL,
  `lasr_intake_fluid` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='超声与其他' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_admission_ultrasound_other`
--

INSERT INTO `dbclass_admission_ultrasound_other` (`id`, `basic_id`, `initial`, `initial_date`, `edc_by_us`, `ega_by_us`, `final_edc`, `blood_transfusion_solid`, `pre_c_s`, `attempted`, `last_intake_solid`, `lasr_intake_fluid`) VALUES
(1, '1', 1, '2012-05-22', '2012-05-30', 3, '2012-05-31', 2, 1, 1, '2012-05-18', '2012-05-23');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='科室分类' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_department_type`
--

INSERT INTO `dbclass_department_type` (`id`, `name_en`, `name_ch`, `order`) VALUES
(1, 'FamilyLabor&Delivery', '家化待产室', 4);

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
-- 表的结构 `dbclass_obstetrical_basic_info`
--

CREATE TABLE IF NOT EXISTS `dbclass_obstetrical_basic_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `hospital` varchar(11) NOT NULL COMMENT '住院号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产妇基本信息' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_obstetrical_basic_info`
--

INSERT INTO `dbclass_obstetrical_basic_info` (`id`, `name`, `date`, `hospital_id`, `hospital`) VALUES
(1, 'zhangfan', '2012-05-10', 1, '20');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限资源码' AUTO_INCREMENT=117 ;

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
(116, '读取人员列表', 'hospital@providers_list_data', 0),
(115, '添加医院人员', 'hospital@providers_list', 0),
(114, '添加医院', 'mastercode@hospital_edit', 0),
(113, '邮件测试', 'system@test_sendmail', 1);

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
-- 表的结构 `dbclass_surgery_hx_all`
--

CREATE TABLE IF NOT EXISTS `dbclass_surgery_hx_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hx_smocking` varchar(200) DEFAULT NULL,
  `hx_alcohol_use` varchar(200) DEFAULT NULL,
  `hx_substance_use` varchar(200) DEFAULT NULL,
  `hx_social_situation` varchar(200) DEFAULT NULL,
  `airway_tnj` varchar(200) DEFAULT NULL,
  `airway_neck_full_rom` varchar(200) DEFAULT NULL,
  `airway_hm_distance` varchar(45) DEFAULT NULL,
  `airway_dental` varchar(45) DEFAULT NULL,
  `airway_path` varchar(200) DEFAULT NULL,
  `physical_examination_heart` varchar(200) DEFAULT NULL,
  `physical_examination_lungs` varchar(200) DEFAULT NULL,
  `Obtestrical_dx` varchar(45) DEFAULT NULL,
  `asa_physical_statues` int(11) DEFAULT NULL,
  `fasting_status_last_solid` varchar(45) DEFAULT NULL,
  `fasting_status_last_liquid` varchar(45) DEFAULT NULL,
  `basic_id` int(11) DEFAULT NULL,
  `physical_examination_bp` varchar(45) DEFAULT NULL,
  `physical_examination_hr` varchar(45) DEFAULT NULL,
  `physical_examination_rr` varchar(45) DEFAULT NULL,
  `physical_examination_sao2` varchar(45) DEFAULT NULL,
  `physical_examination_t` varchar(45) DEFAULT NULL,
  `physical_examination_ht` varchar(45) DEFAULT NULL,
  `physical_examination_wt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='历史' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_surgery_hx_all`
--

INSERT INTO `dbclass_surgery_hx_all` (`id`, `hx_smocking`, `hx_alcohol_use`, `hx_substance_use`, `hx_social_situation`, `airway_tnj`, `airway_neck_full_rom`, `airway_hm_distance`, `airway_dental`, `airway_path`, `physical_examination_heart`, `physical_examination_lungs`, `Obtestrical_dx`, `asa_physical_statues`, `fasting_status_last_solid`, `fasting_status_last_liquid`, `basic_id`, `physical_examination_bp`, `physical_examination_hr`, `physical_examination_rr`, `physical_examination_sao2`, `physical_examination_t`, `physical_examination_ht`, `physical_examination_wt`) VALUES
(1, 'asdf', 'panfeng0', 'panfeng1', 'panfeng2', 'asdf', 'asdf', 'asdf', 'asdf', 'asdfa', '1', '453', '', 1, 'asdf', 'asdf', 1, '1501', '010', '10', '10', '10', '10', '010');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_surgery_illness`
--

CREATE TABLE IF NOT EXISTS `dbclass_surgery_illness` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` int(11) DEFAULT NULL,
  `pregnacy_description` varchar(200) DEFAULT NULL,
  `pre_anesthesia` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='现病史' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_surgery_illness`
--

INSERT INTO `dbclass_surgery_illness` (`id`, `basic_id`, `pregnacy_description`, `pre_anesthesia`) VALUES
(1, 1, 'panfeng0', 'panfeng2');

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_surgery_plan`
--

CREATE TABLE IF NOT EXISTS `dbclass_surgery_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anesthetic_plan` varchar(200) DEFAULT NULL,
  `obstetrical_plan` varchar(45) DEFAULT NULL,
  `obsterian` varchar(45) DEFAULT NULL,
  `anesthesiologist` varchar(200) DEFAULT NULL,
  `sign_date` date DEFAULT NULL,
  `sign_time` time DEFAULT NULL,
  `basic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='计划及签名' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_surgery_plan`
--

INSERT INTO `dbclass_surgery_plan` (`id`, `anesthetic_plan`, `obstetrical_plan`, `obsterian`, `anesthesiologist`, `sign_date`, `sign_time`, `basic_id`) VALUES
(1, 'asdfasdf', 'asdfasdf', 'asdf', 'asdf', '2012-05-01', '00:00:00', 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_surgery_system_review`
--

CREATE TABLE IF NOT EXISTS `dbclass_surgery_system_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_id` int(11) DEFAULT NULL,
  `review_cardovascular` varchar(400) DEFAULT NULL,
  `review_respiratory` varchar(400) DEFAULT NULL,
  `review_gi_hepatic` varchar(400) DEFAULT NULL,
  `review_renal` varchar(400) DEFAULT NULL,
  `review_newuro` varchar(400) DEFAULT NULL,
  `review_hemotology` varchar(400) DEFAULT NULL,
  `review_laboratory` varchar(400) DEFAULT NULL,
  `review_liver` varchar(400) DEFAULT NULL,
  `review_chmistries` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统回顾' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dbclass_surgery_system_review`
--

INSERT INTO `dbclass_surgery_system_review` (`id`, `basic_id`, `review_cardovascular`, `review_respiratory`, `review_gi_hepatic`, `review_renal`, `review_newuro`, `review_hemotology`, `review_laboratory`, `review_liver`, `review_chmistries`) VALUES
(1, 1, 'asdfasd', 'asdfasdf', 'asdfasdf', 'asdf', 'asdf', 'asdf', 'asdfasdf', 'sadf', 'asdf');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `dbclass_surgery_view`
--
CREATE TABLE IF NOT EXISTS `dbclass_surgery_view` (
`id` int(11)
,`name` varchar(200)
,`date` date
,`hospital_id` int(11)
,`hospital` varchar(11)
,`pregnacy_description` varchar(200)
,`pre_anesthesia` varchar(200)
,`anesthetic_plan` varchar(200)
,`obstetrical_plan` varchar(45)
,`obsterian` varchar(45)
,`anesthesiologist` varchar(200)
,`sign_date` date
,`sign_time` time
,`ega_by_us` int(11)
,`current_medication` varchar(200)
,`medical_surgical_hx` varchar(200)
,`allergies` varchar(200)
,`review_cardovascular` varchar(400)
,`review_respiratory` varchar(400)
,`review_gi_hepatic` varchar(400)
,`review_renal` varchar(400)
,`review_newuro` varchar(400)
,`review_hemotology` varchar(400)
,`review_laboratory` varchar(400)
,`review_liver` varchar(400)
,`review_chmistries` varchar(400)
,`uterus` int(11)
,`contraction` varchar(200)
,`contruction_date` date
,`fetal_movement` int(200)
,`fetal_date` date
,`membranes` int(11)
,`membranes_date` date
,`recent_intercourse` date
,`s_p` varchar(200)
,`hx_smocking` varchar(200)
,`hx_alcohol_use` varchar(200)
,`hx_substance_use` varchar(200)
,`hx_social_situation` varchar(200)
,`airway_tnj` varchar(200)
,`airway_neck_full_rom` varchar(200)
,`airway_hm_distance` varchar(45)
,`airway_dental` varchar(45)
,`airway_path` varchar(200)
,`physical_examination_heart` varchar(200)
,`physical_examination_lungs` varchar(200)
,`Obtestrical_dx` varchar(45)
,`asa_physical_statues` int(11)
,`fasting_status_last_solid` varchar(45)
,`fasting_status_last_liquid` varchar(45)
,`physical_examination_bp` varchar(45)
,`physical_examination_hr` varchar(45)
,`physical_examination_rr` varchar(45)
,`physical_examination_sao2` varchar(45)
,`physical_examination_t` varchar(45)
,`physical_examination_ht` varchar(45)
,`physical_examination_wt` varchar(45)
,`gracida` int(11)
,`living` varchar(200)
,`lmp` varchar(200)
,`status` int(11)
,`blood_type` varchar(11)
,`antibody` varchar(45)
,`rubella` varchar(11)
,`hbsag` varchar(45)
,`vdrl` int(11)
,`vdrl_date` date
,`gbbs` varchar(45)
,`hiv` varchar(45)
,`ppd` varchar(45)
,`cxr` varchar(45)
);
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

-- --------------------------------------------------------

--
-- 视图结构 `dbclass_addmission_view`
--
DROP TABLE IF EXISTS `dbclass_addmission_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dbclass_addmission_view` AS (select `basic_info`.`id` AS `id`,`basic_info`.`name` AS `name`,`basic_info`.`date` AS `date`,`basic_info`.`hospital_id` AS `hospital_id`,`basic_info`.`hospital` AS `hospital`,`complaint`.`pre_sympton` AS `pre_sympton`,`complaint`.`other` AS `other`,`complaint`.`scheduled_provedure` AS `scheduled_provedure`,`current_info`.`current_medication` AS `current_medication`,`current_info`.`current_risk` AS `current_risk`,`current_info`.`pre_risk` AS `pre_risk`,`current_info`.`medical_surgical_hx` AS `medical_surgical_hx`,`current_info`.`allergies` AS `allergies`,`current_info`.`reaction` AS `reaction`,`current_info`.`nkda` AS `nkda`,`current_info`.`allergy` AS `allergy`,`detail_info`.`time` AS `time`,`detail_info`.`unit` AS `unit`,`detail_info`.`form_where` AS `form_where`,`detail_info`.`accompany` AS `accompany`,`detail_info`.`add_nurse` AS `add_nurse`,`detail_info`.`via` AS `via`,`ob_assessment`.`uterus` AS `uterus`,`ob_assessment`.`contraction` AS `contraction`,`ob_assessment`.`contruction_date` AS `contruction_date`,`ob_assessment`.`fetal_movement` AS `fetal_movement`,`ob_assessment`.`fetal_date` AS `fetal_date`,`ob_assessment`.`membranes` AS `membranes`,`ob_assessment`.`membranes_date` AS `membranes_date`,`ob_assessment`.`recent_intercourse` AS `recent_intercourse`,`ob_assessment`.`s_p` AS `s_p`,`ob_physical_info`.`age` AS `age`,`ob_physical_info`.`gracida` AS `gracida`,`ob_physical_info`.`term` AS `term`,`ob_physical_info`.`preter` AS `preter`,`ob_physical_info`.`antibdy` AS `antibdy`,`ob_physical_info`.`living` AS `living`,`ob_physical_info`.`lmp` AS `lmp`,`ob_physical_info`.`ega` AS `ega`,`ob_physical_info`.`edc` AS `edc`,`ob_physical_info`.`ht` AS `ht`,`ob_physical_info`.`wt` AS `wt`,`ob_physical_info`.`wt_gain` AS `wt_gain`,`prenatal_labs`.`status` AS `status`,`prenatal_labs`.`blood_type` AS `blood_type`,`prenatal_labs`.`antibody` AS `antibody`,`prenatal_labs`.`rubella` AS `rubella`,`prenatal_labs`.`hbsag` AS `hbsag`,`prenatal_labs`.`vdrl` AS `vdrl`,`prenatal_labs`.`vdrl_date` AS `vdrl_date`,`prenatal_labs`.`gbbs` AS `gbbs`,`prenatal_labs`.`hiv` AS `hiv`,`prenatal_labs`.`ppd` AS `ppd`,`prenatal_labs`.`cxr` AS `cxr`,`procedures`.`iv_start_location` AS `iv_start_location`,`procedures`.`iv_start_size` AS `iv_start_size`,`procedures`.`fluid_type_rate` AS `fluid_type_rate`,`procedures`.`fluid_glucose` AS `fluid_glucose`,`procedures`.`sse_examiner` AS `sse_examiner`,`procedures`.`sse_date_time` AS `sse_date_time`,`procedures`.`sse_intact` AS `sse_intact`,`procedures`.`sse_rom_color` AS `sse_rom_color`,`procedures`.`sse_ferning` AS `sse_ferning`,`procedures`.`sse_nitrazine` AS `sse_nitrazine`,`procedures`.`sse_pooling` AS `sse_pooling`,`procedures`.`sse_is_labs_sent` AS `sse_is_labs_sent`,`procedures`.`sse_labs_sent` AS `sse_labs_sent`,`procedures`.`sse_is_urine_sent` AS `sse_is_urine_sent`,`procedures`.`sse_urine_sent` AS `sse_urine_sent`,`procedures`.`sse_is_cultures_sent` AS `sse_is_cultures_sent`,`procedures`.`sse_cultures_sent` AS `sse_cultures_sent`,`procedures`.`sse_is_other` AS `sse_is_other`,`procedures`.`sse_other` AS `sse_other`,`procedures`.`urinalysis_sgravity` AS `urinalysis_sgravity`,`procedures`.`urinalysis_color` AS `urinalysis_color`,`procedures`.`urinalysis_apprnce` AS `urinalysis_apprnce`,`procedures`.`urinalysis_leuo` AS `urinalysis_leuo`,`procedures`.`urinalysis_heme` AS `urinalysis_heme`,`procedures`.`urinalysis_glucose` AS `urinalysis_glucose`,`procedures`.`urinalysis_ketones` AS `urinalysis_ketones`,`procedures`.`urinalysis_protein` AS `urinalysis_protein`,`ultrasound_other`.`initial` AS `initial`,`ultrasound_other`.`initial_date` AS `initial_date`,`ultrasound_other`.`edc_by_us` AS `edc_by_us`,`ultrasound_other`.`ega_by_us` AS `ega_by_us`,`ultrasound_other`.`final_edc` AS `final_edc`,`ultrasound_other`.`blood_transfusion_solid` AS `blood_transfusion_solid`,`ultrasound_other`.`pre_c_s` AS `pre_c_s`,`ultrasound_other`.`attempted` AS `attempted`,`ultrasound_other`.`last_intake_solid` AS `last_intake_solid`,`ultrasound_other`.`lasr_intake_fluid` AS `lasr_intake_fluid`,`procedures_other`.`research_sudies` AS `research_sudies`,`procedures_other`.`ambulation_em_off` AS `ambulation_em_off`,`procedures_other`.`ambulation_walking_for` AS `ambulation_walking_for`,`procedures_other`.`disposition_date` AS `disposition_date`,`procedures_other`.`disposition_admitted` AS `disposition_admitted`,`procedures_other`.`disposition_via` AS `disposition_via`,`procedures_other`.`disposition_report_given` AS `disposition_report_given`,`procedures_other`.`ida` AS `ida`,`procedures_other`.`clinical_nutrition_consult` AS `clinical_nutrition_consult`,`procedures_other`.`home_with_instruction` AS `home_with_instruction`,`procedures_other`.`verbalizes_understand` AS `verbalizes_understand`,`procedures_other`.`discharge_ama` AS `discharge_ama`,`procedures_other`.`social_work_center_consult` AS `social_work_center_consult` from (((((((((`dbclass_obstetrical_basic_info` `basic_info` left join `dbclass_admission_complaint` `complaint` on((`basic_info`.`id` = `complaint`.`basic_id`))) left join `dbclass_admission_current_info` `current_info` on((`basic_info`.`id` = `current_info`.`basic_id`))) left join `dbclass_admission_detail_info` `detail_info` on((`basic_info`.`id` = `detail_info`.`basic_id`))) left join `dbclass_admission_ob_assessment` `ob_assessment` on((`basic_info`.`id` = `ob_assessment`.`basic_id`))) left join `dbclass_admission_ob_physical_info` `ob_physical_info` on((`basic_info`.`id` = `ob_physical_info`.`basic_id`))) left join `dbclass_admission_prenatal_labs` `prenatal_labs` on((`basic_info`.`id` = `prenatal_labs`.`basic_id`))) left join `dbclass_admission_procedures` `procedures` on((`basic_info`.`id` = `procedures`.`basic_id`))) left join `dbclass_admission_ultrasound_other` `ultrasound_other` on((`basic_info`.`id` = `ultrasound_other`.`basic_id`))) left join `dbclass_admission_procedures_other` `procedures_other` on((`basic_info`.`id` = `procedures_other`.`basic_id`))) where 1);

-- --------------------------------------------------------

--
-- 视图结构 `dbclass_surgery_view`
--
DROP TABLE IF EXISTS `dbclass_surgery_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dbclass_surgery_view` AS (select `dbclass_obstetrical_basic_info`.`id` AS `id`,`dbclass_obstetrical_basic_info`.`name` AS `name`,`dbclass_obstetrical_basic_info`.`date` AS `date`,`dbclass_obstetrical_basic_info`.`hospital_id` AS `hospital_id`,`dbclass_obstetrical_basic_info`.`hospital` AS `hospital`,`dbclass_surgery_illness`.`pregnacy_description` AS `pregnacy_description`,`dbclass_surgery_illness`.`pre_anesthesia` AS `pre_anesthesia`,`dbclass_surgery_plan`.`anesthetic_plan` AS `anesthetic_plan`,`dbclass_surgery_plan`.`obstetrical_plan` AS `obstetrical_plan`,`dbclass_surgery_plan`.`obsterian` AS `obsterian`,`dbclass_surgery_plan`.`anesthesiologist` AS `anesthesiologist`,`dbclass_surgery_plan`.`sign_date` AS `sign_date`,`dbclass_surgery_plan`.`sign_time` AS `sign_time`,`dbclass_admission_ultrasound_other`.`ega_by_us` AS `ega_by_us`,`dbclass_admission_current_info`.`current_medication` AS `current_medication`,`dbclass_admission_current_info`.`medical_surgical_hx` AS `medical_surgical_hx`,`dbclass_admission_current_info`.`allergies` AS `allergies`,`dbclass_surgery_system_review`.`review_cardovascular` AS `review_cardovascular`,`dbclass_surgery_system_review`.`review_respiratory` AS `review_respiratory`,`dbclass_surgery_system_review`.`review_gi_hepatic` AS `review_gi_hepatic`,`dbclass_surgery_system_review`.`review_renal` AS `review_renal`,`dbclass_surgery_system_review`.`review_newuro` AS `review_newuro`,`dbclass_surgery_system_review`.`review_hemotology` AS `review_hemotology`,`dbclass_surgery_system_review`.`review_laboratory` AS `review_laboratory`,`dbclass_surgery_system_review`.`review_liver` AS `review_liver`,`dbclass_surgery_system_review`.`review_chmistries` AS `review_chmistries`,`dbclass_admission_ob_assessment`.`uterus` AS `uterus`,`dbclass_admission_ob_assessment`.`contraction` AS `contraction`,`dbclass_admission_ob_assessment`.`contruction_date` AS `contruction_date`,`dbclass_admission_ob_assessment`.`fetal_movement` AS `fetal_movement`,`dbclass_admission_ob_assessment`.`fetal_date` AS `fetal_date`,`dbclass_admission_ob_assessment`.`membranes` AS `membranes`,`dbclass_admission_ob_assessment`.`membranes_date` AS `membranes_date`,`dbclass_admission_ob_assessment`.`recent_intercourse` AS `recent_intercourse`,`dbclass_admission_ob_assessment`.`s_p` AS `s_p`,`dbclass_surgery_hx_all`.`hx_smocking` AS `hx_smocking`,`dbclass_surgery_hx_all`.`hx_alcohol_use` AS `hx_alcohol_use`,`dbclass_surgery_hx_all`.`hx_substance_use` AS `hx_substance_use`,`dbclass_surgery_hx_all`.`hx_social_situation` AS `hx_social_situation`,`dbclass_surgery_hx_all`.`airway_tnj` AS `airway_tnj`,`dbclass_surgery_hx_all`.`airway_neck_full_rom` AS `airway_neck_full_rom`,`dbclass_surgery_hx_all`.`airway_hm_distance` AS `airway_hm_distance`,`dbclass_surgery_hx_all`.`airway_dental` AS `airway_dental`,`dbclass_surgery_hx_all`.`airway_path` AS `airway_path`,`dbclass_surgery_hx_all`.`physical_examination_heart` AS `physical_examination_heart`,`dbclass_surgery_hx_all`.`physical_examination_lungs` AS `physical_examination_lungs`,`dbclass_surgery_hx_all`.`Obtestrical_dx` AS `Obtestrical_dx`,`dbclass_surgery_hx_all`.`asa_physical_statues` AS `asa_physical_statues`,`dbclass_surgery_hx_all`.`fasting_status_last_solid` AS `fasting_status_last_solid`,`dbclass_surgery_hx_all`.`fasting_status_last_liquid` AS `fasting_status_last_liquid`,`dbclass_surgery_hx_all`.`physical_examination_bp` AS `physical_examination_bp`,`dbclass_surgery_hx_all`.`physical_examination_hr` AS `physical_examination_hr`,`dbclass_surgery_hx_all`.`physical_examination_rr` AS `physical_examination_rr`,`dbclass_surgery_hx_all`.`physical_examination_sao2` AS `physical_examination_sao2`,`dbclass_surgery_hx_all`.`physical_examination_t` AS `physical_examination_t`,`dbclass_surgery_hx_all`.`physical_examination_ht` AS `physical_examination_ht`,`dbclass_surgery_hx_all`.`physical_examination_wt` AS `physical_examination_wt`,`dbclass_admission_ob_physical_info`.`gracida` AS `gracida`,`dbclass_admission_ob_physical_info`.`living` AS `living`,`dbclass_admission_ob_physical_info`.`lmp` AS `lmp`,`dbclass_admission_prenatal_labs`.`status` AS `status`,`dbclass_admission_prenatal_labs`.`blood_type` AS `blood_type`,`dbclass_admission_prenatal_labs`.`antibody` AS `antibody`,`dbclass_admission_prenatal_labs`.`rubella` AS `rubella`,`dbclass_admission_prenatal_labs`.`hbsag` AS `hbsag`,`dbclass_admission_prenatal_labs`.`vdrl` AS `vdrl`,`dbclass_admission_prenatal_labs`.`vdrl_date` AS `vdrl_date`,`dbclass_admission_prenatal_labs`.`gbbs` AS `gbbs`,`dbclass_admission_prenatal_labs`.`hiv` AS `hiv`,`dbclass_admission_prenatal_labs`.`ppd` AS `ppd`,`dbclass_admission_prenatal_labs`.`cxr` AS `cxr` from (((((((((`dbclass_obstetrical_basic_info` left join `dbclass_surgery_illness` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_illness`.`basic_id`))) left join `dbclass_surgery_hx_all` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_hx_all`.`basic_id`))) left join `dbclass_surgery_plan` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_plan`.`basic_id`))) left join `dbclass_admission_ultrasound_other` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ultrasound_other`.`basic_id`))) left join `dbclass_admission_current_info` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_current_info`.`basic_id`))) left join `dbclass_surgery_system_review` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_system_review`.`basic_id`))) left join `dbclass_admission_prenatal_labs` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_prenatal_labs`.`basic_id`))) left join `dbclass_admission_ob_physical_info` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ob_physical_info`.`basic_id`))) left join `dbclass_admission_ob_assessment` on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ob_assessment`.`basic_id`))) where 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
