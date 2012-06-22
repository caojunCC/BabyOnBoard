CREATE VIEW `diantaoba`.`dbclass_obstetrical_progress_basic_view` AS
(
select
-- basic_info
`dbclass_obstetrical_basic_info`.`id` AS `id`,
`dbclass_obstetrical_basic_info`.`name` AS `name`,
`dbclass_obstetrical_basic_info`.`date` AS `date`,
`dbclass_obstetrical_basic_info`.`hospital_id` AS `hospital_id`,
`dbclass_obstetrical_basic_info`.`hospital` AS `hospital`,


-- progress_basic_info
`dbclass_admission_detail_info`.`time` AS `time_ad`,
`dbclass_admission_prenatal_labs`.`blood_type` AS `blood_type`,
`dbclass_admission_ob_physical_info`.`edc` AS `edc`,
`dbclass_admission_ob_physical_info`.`gracida` AS `gracida`,
`dbclass_admission_ob_physical_info`.`term` AS `term`,
`dbclass_admission_ob_physical_info`.`preter` AS `preter`, 
`dbclass_admission_ob_physical_info`.`living` AS `living`,
`dbclass_admission_current_info`.`allergies` AS `allergies`,

`dbclass_obstetrical_progress_basic`.`gestation` AS `gestation`,
`dbclass_obstetrical_progress_basic`.`abortions` AS `abortions`,
`dbclass_obstetrical_progress_basic`.`bom` AS `bom`


 from
 `dbclass_obstetrical_basic_info`
 left join `dbclass_admission_detail_info`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_detail_info`.`basic_id`

 left join `dbclass_admission_prenatal_labs`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_prenatal_labs`.`basic_id`

 left join `dbclass_admission_ob_physical_info`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_ob_physical_info`.`basic_id`

 left join `dbclass_admission_current_info`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_admission_current_info`.`basic_id`

 left join `dbclass_obstetrical_progress_basic`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_obstetrical_progress_basic`.`basic_id`
 where 1);