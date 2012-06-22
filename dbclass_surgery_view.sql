--
-- 数据库: `dbclass`
--

-- --------------------------------------------------------

--
-- 视图结构 `dbclass_surgery_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dbclass_surgery_view` 
AS (
select 
`dbclass_obstetrical_basic_info`.`id` AS `id`,
`dbclass_obstetrical_basic_info`.`name` AS `name`,
`dbclass_obstetrical_basic_info`.`date` AS `date`,
`dbclass_obstetrical_basic_info`.`hospital_id` AS `hospital_id`,
`dbclass_obstetrical_basic_info`.`hospital` AS `hospital`,

`dbclass_surgery_illness`.`pregnacy_description` AS `pregnacy_description`,
`dbclass_surgery_illness`.`pre_anesthesia` AS `pre_anesthesia`,

`dbclass_surgery_plan`.`anesthetic_plan` AS `anesthetic_plan`,
`dbclass_surgery_plan`.`obstetrical_plan` AS `obstetrical_plan`,
`dbclass_surgery_plan`.`obsterian` AS `obsterian`,
`dbclass_surgery_plan`.`anesthesiologist` AS `anesthesiologist`,
`dbclass_surgery_plan`.`sign_date` AS `sign_date`,
`dbclass_surgery_plan`.`sign_time` AS `sign_time`,
`dbclass_admission_ultrasound_other`.`ega_by_us` AS `ega_by_us`,
`dbclass_admission_current_info`.`current_medication` AS `current_medication`,
`dbclass_admission_current_info`.`medical_surgical_hx` AS `medical_surgical_hx`,
`dbclass_admission_current_info`.`allergies` AS `allergies`,
`dbclass_surgery_system_review`.`review_cardovascular` AS `review_cardovascular`,
`dbclass_surgery_system_review`.`review_respiratory` AS `review_respiratory`,
`dbclass_surgery_system_review`.`review_gi_hepatic` AS `review_gi_hepatic`,
`dbclass_surgery_system_review`.`review_renal` AS `review_renal`,
`dbclass_surgery_system_review`.`review_newuro` AS `review_newuro`,
`dbclass_surgery_system_review`.`review_hemotology` AS `review_hemotology`,
`dbclass_surgery_system_review`.`review_laboratory` AS `review_laboratory`,
`dbclass_surgery_system_review`.`review_liver` AS `review_liver`,
`dbclass_surgery_system_review`.`review_chmistries` AS `review_chmistries`,
`dbclass_admission_ob_assessment`.`uterus` AS `uterus`,
`dbclass_admission_ob_assessment`.`contraction` AS `contraction`,
`dbclass_admission_ob_assessment`.`contruction_date` AS `contruction_date`,
`dbclass_admission_ob_assessment`.`fetal_movement` AS `fetal_movement`,
`dbclass_admission_ob_assessment`.`fetal_date` AS `fetal_date`,
`dbclass_admission_ob_assessment`.`membranes` AS `membranes`,
`dbclass_admission_ob_assessment`.`membranes_date` AS `membranes_date`,
`dbclass_admission_ob_assessment`.`recent_intercourse` AS `recent_intercourse`,
`dbclass_admission_ob_assessment`.`s_p` AS `s_p`,
`dbclass_surgery_hx_all`.`hx_smocking` AS `hx_smocking`,
`dbclass_surgery_hx_all`.`hx_alcohol_use` AS `hx_alcohol_use`,
`dbclass_surgery_hx_all`.`hx_substance_use` AS `hx_substance_use`,
`dbclass_surgery_hx_all`.`hx_social_situation` AS `hx_social_situation`,
`dbclass_surgery_hx_all`.`airway_tnj` AS `airway_tnj`,
`dbclass_surgery_hx_all`.`airway_neck_full_rom` AS `airway_neck_full_rom`,
`dbclass_surgery_hx_all`.`airway_hm_distance` AS `airway_hm_distance`,
`dbclass_surgery_hx_all`.`airway_dental` AS `airway_dental`,
`dbclass_surgery_hx_all`.`airway_path` AS `airway_path`,
`dbclass_surgery_hx_all`.`physical_examination_heart` AS `physical_examination_heart`,
`dbclass_surgery_hx_all`.`physical_examination_lungs` AS `physical_examination_lungs`,
`dbclass_surgery_hx_all`.`Obtestrical_dx` AS `Obtestrical_dx`,
`dbclass_surgery_hx_all`.`asa_physical_statues` AS `asa_physical_statues`,
`dbclass_surgery_hx_all`.`fasting_status_last_solid` AS `fasting_status_last_solid`,
`dbclass_surgery_hx_all`.`fasting_status_last_liquid` AS `fasting_status_last_liquid`,
`dbclass_surgery_hx_all`.`physical_examination_bp` AS `physical_examination_bp`,
`dbclass_surgery_hx_all`.`physical_examination_hr` AS `physical_examination_hr`,
`dbclass_surgery_hx_all`.`physical_examination_rr` AS `physical_examination_rr`,
`dbclass_surgery_hx_all`.`physical_examination_sao2` AS `physical_examination_sao2`,
`dbclass_surgery_hx_all`.`physical_examination_t` AS `physical_examination_t`,
`dbclass_surgery_hx_all`.`physical_examination_ht` AS `physical_examination_ht`,
`dbclass_surgery_hx_all`.`physical_examination_wt` AS `physical_examination_wt`,
`dbclass_admission_ob_physical_info`.`gracida` AS `gracida`,
`dbclass_admission_ob_physical_info`.`living` AS `living`,
`dbclass_admission_ob_physical_info`.`lmp` AS `lmp`,
`dbclass_admission_prenatal_labs`.`status` AS `status`,
`dbclass_admission_prenatal_labs`.`blood_type` AS `blood_type`,
`dbclass_admission_prenatal_labs`.`antibody` AS `antibody`,
`dbclass_admission_prenatal_labs`.`rubella` AS `rubella`,
`dbclass_admission_prenatal_labs`.`hbsag` AS `hbsag`,
`dbclass_admission_prenatal_labs`.`vdrl` AS `vdrl`,
`dbclass_admission_prenatal_labs`.`vdrl_date` AS `vdrl_date`,
`dbclass_admission_prenatal_labs`.`gbbs` AS `gbbs`,
`dbclass_admission_prenatal_labs`.`hiv` AS `hiv`,
`dbclass_admission_prenatal_labs`.`ppd` AS `ppd`,
`dbclass_admission_prenatal_labs`.`cxr` AS `cxr`
 from 
 (
 ((((((((
 `dbclass_obstetrical_basic_info` 
 left join `dbclass_surgery_illness` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_illness`.`basic_id`))) 
 left join `dbclass_surgery_hx_all` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_hx_all`.`basic_id`))) 
 left join `dbclass_surgery_plan` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_plan`.`basic_id`))) 
 left join `dbclass_admission_ultrasound_other` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ultrasound_other`.`basic_id`))) 
 left join `dbclass_admission_current_info` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_current_info`.`basic_id`))) 
 left join `dbclass_surgery_system_review` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_surgery_system_review`.`basic_id`))) 
 left join `dbclass_admission_prenatal_labs` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_prenatal_labs`.`basic_id`))) 
 left join `dbclass_admission_ob_physical_info` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ob_physical_info`.`basic_id`))) 
 left join `dbclass_admission_ob_assessment` 
 on((`dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ob_assessment`.`basic_id`))) 
 where 1);


