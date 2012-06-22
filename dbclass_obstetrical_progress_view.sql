CREATE VIEW `diantaoba`.`dbclass_obstetrical_progress_view` AS
(
select
-- dbclass_obstetrical_progress_time
`dbclass_obstetrical_progress_time`.`id` AS `id`,
`dbclass_obstetrical_progress_time`.`time_id` AS `time_id`,
`dbclass_obstetrical_progress_time`.`basic_id` AS `basic_id`,
`dbclass_obstetrical_progress_time`.`time` AS `time`,

-- dbclass_obstetrical_progress_patient
`dbclass_obstetrical_progress_patient`.`temp` AS `temp`,
`dbclass_obstetrical_progress_patient`.`pulse` AS `pulse`,
`dbclass_obstetrical_progress_patient`.`rr` AS `rr`,
`dbclass_obstetrical_progress_patient`.`bp` AS `bp`,
`dbclass_obstetrical_progress_patient`.`pain` AS `pain`,
`dbclass_obstetrical_progress_patient`.`loc` AS `loc`,
`dbclass_obstetrical_progress_patient`.`psy` AS `psy`,
`dbclass_obstetrical_progress_patient`.`wt` AS `wt`,
`dbclass_obstetrical_progress_patient`.`act` AS `act`,
`dbclass_obstetrical_progress_patient`.`nv` AS `nv`,
`dbclass_obstetrical_progress_patient`.`cnsc` AS `cnsc`,
`dbclass_obstetrical_progress_patient`.`ref` AS `ref`,
`dbclass_obstetrical_progress_patient`.`hom` AS `hom`,
`dbclass_obstetrical_progress_patient`.`edema` AS `edema`,
`dbclass_obstetrical_progress_patient`.`breath` AS `breath`,
`dbclass_obstetrical_progress_patient`.`fundus` AS `fundus`,
`dbclass_obstetrical_progress_patient`.`lochia` AS `lochia`,
`dbclass_obstetrical_progress_patient`.`episiotomy` AS `episiotomy`,
`dbclass_obstetrical_progress_patient`.`bladder` AS `bladder`,
`dbclass_obstetrical_progress_patient`.`h_r_p` AS `h_r_p`,

-- dbclass_obstetrical_progress_fetal
`dbclass_obstetrical_progress_fetal`.`variability` AS `variability`,
`dbclass_obstetrical_progress_fetal`.`fhr` AS `fhr`,
`dbclass_obstetrical_progress_fetal`.`frequency` AS `frequency`,
`dbclass_obstetrical_progress_fetal`.`duration` AS `duration`,

-- dbclass_obstetrical_progress_contractions
`dbclass_obstetrical_progress_contractions`.`quality` AS `quality`,
`dbclass_obstetrical_progress_contractions`.`tone` AS `tone`,
`dbclass_obstetrical_progress_contractions`.`position` AS `position`,
`dbclass_obstetrical_progress_contractions`.`cervical` AS `cervical`,
`dbclass_obstetrical_progress_contractions`.`vaginal` AS `vaginal`,
`dbclass_obstetrical_progress_contractions`.`oxytocic` AS `oxytocic`,

-- dbclass_obstetrical_progress_meds
`dbclass_obstetrical_progress_meds`.`meds1` AS `meds1`,
`dbclass_obstetrical_progress_meds`.`meds2` AS `meds2`,
`dbclass_obstetrical_progress_meds`.`meds3` AS `meds3`,
`dbclass_obstetrical_progress_meds`.`meds4` AS `meds4`,

-- dbclass_obstetrical_progress_po
`dbclass_obstetrical_progress_po`.`liquids` AS `liquids`,
`dbclass_obstetrical_progress_po`.`da` AS `da`,

-- dbclass_obstetrical_progress_iv
`dbclass_obstetrical_progress_iv`.`iv1` AS `iv1`,
`dbclass_obstetrical_progress_iv`.`iv2` AS `iv2`,
`dbclass_obstetrical_progress_iv`.`iv3` AS `iv3`,

-- dbclass_obstetrical_progress_op
`dbclass_obstetrical_progress_op`.`uop` AS `uop`,
`dbclass_obstetrical_progress_op`.`ebl` AS `ebl`,
`dbclass_obstetrical_progress_op`.`last_bm` AS `last_bm`,
`dbclass_obstetrical_progress_op`.`other1` AS `other1`,
`dbclass_obstetrical_progress_op`.`other2` AS `other2`




 from
 `dbclass_obstetrical_progress_time`
 left join `dbclass_obstetrical_progress_patient`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_patient`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_patient`.`basic_id`

 left join `dbclass_obstetrical_progress_fetal`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_fetal`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_fetal`.`basic_id`

 left join `dbclass_obstetrical_progress_contractions`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_contractions`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_contractions`.`basic_id`

 left join `dbclass_obstetrical_progress_meds`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_meds`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_meds`.`basic_id`

 left join `dbclass_obstetrical_progress_po`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_po`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_po`.`basic_id`

 left join `dbclass_obstetrical_progress_iv`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_iv`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_iv`.`basic_id`

 left join `dbclass_obstetrical_progress_op`
 on `dbclass_obstetrical_progress_time`.`time_id` = `dbclass_obstetrical_progress_op`.`time_id`
 AND `dbclass_obstetrical_progress_time`.`basic_id` = `dbclass_obstetrical_progress_op`.`basic_id`
 where 1);