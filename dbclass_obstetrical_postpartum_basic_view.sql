CREATE VIEW `diantaoba`.`dbclass_obstetrical_postpartum_basic_view` AS
(
select
-- basic_info
`dbclass_obstetrical_basic_info`.`id` AS `id`,
`dbclass_obstetrical_basic_info`.`name` AS `name`,
`dbclass_obstetrical_basic_info`.`date` AS `date`,
`dbclass_obstetrical_basic_info`.`hospital_id` AS `hospital_id`,
`dbclass_obstetrical_basic_info`.`hospital` AS `hospital`,


-- postpartum_basic
`dbclass_obstetrical_postpartum_basic`.`date` AS `date_p`,
`dbclass_obstetrical_postpartum_basic`.`svb` AS `svb`,
`dbclass_obstetrical_postpartum_basic`.`pm` AS `pm`,
`dbclass_obstetrical_postpartum_basic`.`at` AS `at`,
`dbclass_obstetrical_postpartum_basic`.`toe` AS `toe`,
`dbclass_obstetrical_postpartum_basic`.`ox` AS `ox`


 from
 `dbclass_obstetrical_basic_info`
 left join `dbclass_obstetrical_postpartum_basic`
 on `dbclass_obstetrical_basic_info`.`id` = `dbclass_obstetrical_postpartum_basic`.`basic_id`
 where 1);