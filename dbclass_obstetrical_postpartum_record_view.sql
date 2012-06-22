CREATE VIEW `diantaoba`.`dbclass_obstetrical_postpartum_record_view` AS
(
select
-- dbclass_obstetrical_postpartum_time
`dbclass_obstetrical_postpartum_time`.`id` AS `id`,
`dbclass_obstetrical_postpartum_time`.`time_id` AS `time_id`,
`dbclass_obstetrical_postpartum_time`.`basic_id` AS `basic_id`,
`dbclass_obstetrical_postpartum_time`.`time` AS `time`,

-- dbclass_obstetrical_progress_patient
`dbclass_obstetrical_postpartum_record`.`bp` AS `bp`,
`dbclass_obstetrical_postpartum_record`.`prr` AS `prr`,
`dbclass_obstetrical_postpartum_record`.`temp` AS `temp`,
`dbclass_obstetrical_postpartum_record`.`spo` AS `spo`,
`dbclass_obstetrical_postpartum_record`.`ox` AS `ox`,
`dbclass_obstetrical_postpartum_record`.`ss` AS `ss`,
`dbclass_obstetrical_postpartum_record`.`motor` AS `motor`,
`dbclass_obstetrical_postpartum_record`.`iv` AS `iv`,
`dbclass_obstetrical_postpartum_record`.`fun` AS `fun`,
`dbclass_obstetrical_postpartum_record`.`loc` AS `loc`,
`dbclass_obstetrical_postpartum_record`.`per` AS `per`,
`dbclass_obstetrical_postpartum_record`.`inc` AS `inc`,
`dbclass_obstetrical_postpartum_record`.`dre` AS `dre`,
`dbclass_obstetrical_postpartum_record`.`med` AS `med`,
`dbclass_obstetrical_postpartum_record`.`ini` AS `ini`


 from
 `dbclass_obstetrical_postpartum_time`
 left join `dbclass_obstetrical_postpartum_record`
 on `dbclass_obstetrical_postpartum_time`.`time_id` = `dbclass_obstetrical_postpartum_record`.`time_id`
 AND `dbclass_obstetrical_postpartum_time`.`basic_id` = `dbclass_obstetrical_postpartum_record`.`basic_id`
 where 1);