CREATE VIEW `diantaoba`.`dbclass_addmission_view` AS
(
select
`basic_info`.*,

`complaint`.pre_sympton,
`complaint`.other,
`complaint`.scheduled_provedure,

`current_info`.current_medication,
`current_info`.current_risk,
`current_info`.pre_risk,
`current_info`.medical_surgical_hx,
`current_info`.allergies,
`current_info`.reaction,
`current_info`.nkda,
`current_info`.allergy,

`detail_info`.time,
`detail_info`.unit,
`detail_info`.form_where,
`detail_info`.accompany,
`detail_info`.add_nurse,
`detail_info`.via,

`ob_assessment`.uterus,
`ob_assessment`.contraction,
`ob_assessment`.contruction_date,
`ob_assessment`.fetal_movement,
`ob_assessment`.fetal_date,
`ob_assessment`.membranes,
`ob_assessment`.membranes_date,
`ob_assessment`.recent_intercourse,
`ob_assessment`.s_p,

`ob_physical_info`.age,
`ob_physical_info`.gracida,
`ob_physical_info`.term,
`ob_physical_info`.preter,
`ob_physical_info`.antibdy,
`ob_physical_info`.living,
`ob_physical_info`.lmp,
`ob_physical_info`.ega,
`ob_physical_info`.edc,
`ob_physical_info`.ht,
`ob_physical_info`.wt,
`ob_physical_info`.wt_gain,

`prenatal_labs`.status,
`prenatal_labs`.blood_type,
`prenatal_labs`.antibody,
`prenatal_labs`.rubella,
`prenatal_labs`.hbsag,
`prenatal_labs`.vdrl,
`prenatal_labs`.vdrl_date,
`prenatal_labs`.gbbs,
`prenatal_labs`.hiv,
`prenatal_labs`.ppd,
`prenatal_labs`.cxr,

`procedures`.iv_start_location,
`procedures`.iv_start_size,
`procedures`.fluid_type_rate,
`procedures`.fluid_glucose,
`procedures`.sse_examiner,
`procedures`.sse_date_time,
`procedures`.sse_intact,
`procedures`.sse_rom_color,
`procedures`.sse_ferning,
`procedures`.sse_nitrazine,
`procedures`.sse_pooling,
`procedures`.sse_is_labs_sent,
`procedures`.sse_labs_sent,
`procedures`.sse_is_urine_sent,
`procedures`.sse_urine_sent,
`procedures`.sse_is_cultures_sent,
`procedures`.sse_cultures_sent,
`procedures`.sse_is_other,
`procedures`.sse_other,
`procedures`.urinalysis_sgravity,
`procedures`.urinalysis_color,
`procedures`.urinalysis_apprnce,
`procedures`.urinalysis_leuo,
`procedures`.urinalysis_heme,
`procedures`.urinalysis_glucose,
`procedures`.urinalysis_ketones,
`procedures`.urinalysis_protein,


`ultrasound_other`.initial,
`ultrasound_other`.initial_date,
`ultrasound_other`.edc_by_us,
`ultrasound_other`.ega_by_us,
`ultrasound_other`.final_edc,
`ultrasound_other`.blood_transfusion_solid,
`ultrasound_other`.pre_c_s,
`ultrasound_other`.attempted,
`ultrasound_other`.last_intake_solid,
`ultrasound_other`.lasr_intake_fluid,


`procedures_other`.research_sudies,
`procedures_other`.ambulation_em_off,
`procedures_other`.ambulation_walking_for,
`procedures_other`.disposition_date,
`procedures_other`.disposition_admitted,
`procedures_other`.disposition_via,
`procedures_other`.disposition_report_given,
`procedures_other`.ida,
`procedures_other`.clinical_nutrition_consult,
`procedures_other`.home_with_instruction,
`procedures_other`.verbalizes_understand,
`procedures_other`.discharge_ama,
`procedures_other`.social_work_center_consult
from
`dbclass_obstetrical_basic_info` as `basic_info`
left join
`dbclass_admission_complaint` as `complaint`     
on `basic_info`.id = `complaint`.basic_id
left join
 `dbclass_admission_current_info` as `current_info`
 on `basic_info`.id = `current_info`.basic_id
left join
`dbclass_admission_detail_info` as `detail_info`
on `basic_info`.id = `detail_info`.basic_id
left join
`dbclass_admission_ob_assessment` as `ob_assessment`
on `basic_info`.id = `ob_assessment`.basic_id
left join
`dbclass_admission_ob_physical_info` as `ob_physical_info`
    on `basic_info`.id = `ob_physical_info`.basic_id
left join
`dbclass_admission_prenatal_labs` as `prenatal_labs`
    on `basic_info`.id = `prenatal_labs`.basic_id
left join
`dbclass_admission_procedures` as `procedures`
    on `basic_info`.id = `procedures`.basic_id
left join
`dbclass_admission_ultrasound_other` as `ultrasound_other`
    on `basic_info`.id = `ultrasound_other`.basic_id
left join
`dbclass_admission_procedures_other` as `procedures_other` 
    on `basic_info`.id = `procedures_other`.basic_id
where 1
)