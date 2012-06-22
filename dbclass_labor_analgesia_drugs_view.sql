-- --------------------------------------------------------

--
-- 视图结构 `dbclass_labor_analgesia_drugs_view`
--

CREATE  VIEW `diantaoba`.`dbclass_labor_analgesia_drugs_view` AS 
(select 
`dbclass_labor_analgesia_time`.`basic_id` AS `basic_id`,
`dbclass_labor_analgesia_time`.`time_id` AS `time_id`,
`dbclass_labor_analgesia_time`.`time` AS `time`,
`dbclass_labor_analgesia_drugs`.`oxygen` AS `oxygen`,
`dbclass_labor_analgesia_drugs`.`bupivacaiane` AS `bupivacaiane`,
`dbclass_labor_analgesia_drugs`.`ropivacaine` AS `ropivacaine`,
`dbclass_labor_analgesia_drugs`.`lidocaine` AS `lidocaine`,
`dbclass_labor_analgesia_drugs`.`lid_epi` AS `lid_epi`,
`dbclass_labor_analgesia_drugs`.`fentanyl` AS `fentanyl`,
`dbclass_labor_analgesia_drugs`.`ephedrine` AS `ephedrine`,
`dbclass_labor_analgesia_drugs`.`phenyephrine` AS `phenyephrine`,
`dbclass_labor_analgesia_drugs`.`bup_fen` AS `bup_fen`,
`dbclass_labor_analgesia_drugs`.`blood_f` AS `blood_f`,
`dbclass_labor_analgesia_drugs`.`bloodLoss_f` AS `bloodLoss_f`,
`dbclass_labor_analgesia_drugs`.`unine_f` AS `unine_f`,
`dbclass_labor_analgesia_comments`.`pain` AS `pain`,
`dbclass_labor_analgesia_comments`.`sensory_l` AS `sensory_l`,
`dbclass_labor_analgesia_comments`.`sensory_r` AS `sensory_r`,
`dbclass_labor_analgesia_comments`.`ob_dilation` AS `ob_dilation`,
`dbclass_labor_analgesia_comments`.`ob_station` AS `ob_station`,
`dbclass_labor_analgesia_comments`.`temperature` AS `temperature`,
`dbclass_labor_analgesia_comments`.`cv_ecg` AS `cv_ecg`,
`dbclass_labor_analgesia_comments`.`cv_spo` AS `cv_spo`,
`dbclass_labor_analgesia_comments`.`resident` AS `resident`,
`dbclass_labor_analgesia_comments`.`rttending` AS `rttending`,
`dbclass_labor_analgesia_bphp`.`cuff_bp` AS `cuff_bp`,
`dbclass_labor_analgesia_bphp`.`aline_bp` AS `aline_bp`,
`dbclass_labor_analgesia_bphp`.`hr` AS `hr`,
`dbclass_labor_analgesia_bphp`.`fetal_hr` AS `fetal_hr` 

from (((`dbclass_labor_analgesia_time` 
left join `dbclass_labor_analgesia_comments` 
on(((`dbclass_labor_analgesia_time`.`basic_id` = `dbclass_labor_analgesia_comments`.`basic_id`) 
and (`dbclass_labor_analgesia_time`.`time_id` = `dbclass_labor_analgesia_comments`.`time_id`)))) 
left join `dbclass_labor_analgesia_drugs` 
on(((`dbclass_labor_analgesia_time`.`basic_id` = `dbclass_labor_analgesia_drugs`.`basic_id`) 
and (`dbclass_labor_analgesia_time`.`time_id` = `dbclass_labor_analgesia_drugs`.`time_id`)))) 
left join `dbclass_labor_analgesia_bphp` 
on(((`dbclass_labor_analgesia_time`.`basic_id` = `dbclass_labor_analgesia_bphp`.`basic_id`) 
and (`dbclass_labor_analgesia_time`.`time_id` = `dbclass_labor_analgesia_bphp`.`time_id`)))) 
where 1);

