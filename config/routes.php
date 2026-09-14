<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



//SUPPLY
$route['request_supply'] = 'pages/request_supply';
//END OF SUPPLY


//------------------Games------------------------------------
$route['games/2025_valentines'] = 'games/valentines_2025';
$route['games/get_top_10_players'] = 'games/get_top_10_players';
//------------------Games------------------------------------

//HR 
//USER
$route['hr_dashboard'] = 'pages/hr_dashboard';
$route['hr_add_training'] = 'pages/hr_add_training';
$route['add_training_docs'] = 'pages/add_training_docs';
$route['edit_training_docs'] = 'pages/edit_training_docs';
$route['delete_training'] = 'pages/delete_training';
$route['delete_inv_training'] = 'pages/delete_inv_training';
$route['zip_download_per_employee'] = 'pages/zip_download_per_employee';
$route['print_hr_training_user'] = 'pages/print_hr_training_user';
$route['print_nominees/(:any)'] = 'pages/print_nominees/$1';
$route['update_user_info'] = 'pages/update_user_info';

//Management

$route['cancel_nominee/(:any)'] = 'pages/cancel_nominee/$1';
$route['approve_nominate_selected'] = 'pages/approve_nominate_selected';
$route['approve_nominee/(:any)'] = 'pages/approve_nominee/$1';
$route['disapprove_nominee/(:any)'] = 'pages/disapprove_nominee/$1';
$route['view_nominee/(:any)'] = 'pages/view_nominee/$1';
$route['upload_memorandum'] = 'pages/upload_memorandum';
$route['upload_tesda_order'] = 'pages/upload_tesda_order';
$route['upload_tdi_form'] = 'pages/upload_tdi_form';
$route['delete_nomination/(:any)'] = 'pages/delete_nomination/$1';
$route['nominate_selected'] = 'pages/nominate_selected';
$route['nominate_user/(:any)'] = 'pages/nominate_user/$1';
$route['add_nominee/(:any)'] = 'pages/add_nominee/$1';
$route['get_employees_plantilla'] = 'pages/get_employees_plantilla';
$route['plantilla_position_data_save'] = 'pages/plantilla_position_data_save';
$route['get_plantilla_position'] = 'pages/get_plantilla_position';
$route['add_training_inv'] = 'pages/add_training_inv';
$route['list_of_training_inv/(:any)'] = 'pages/list_of_training_inv/$1';
$route['list_of_training_inv_foreign/(:any)'] = 'pages/list_of_training_inv_foreign/$1';
$route['list_of_training_inv_national/(:any)'] = 'pages/list_of_training_inv_national/$1';
$route['list_of_training_inv_local/(:any)'] = 'pages/list_of_training_inv_local/$1';
$route['list_of_vacant_position/(:any)'] = 'pages/list_of_vacant_position/$1';
$route['hr_pillar1_notifications/(:any)'] = 'pages/hr_pillar1_notifications/$1';
$route['list_of_plantilla_positions'] = 'pages/list_of_plantilla_positions';
$route['get_vacant_position'] = 'pages/get_vacant_position';
$route['hr_pillar1'] = 'pages/hr_pillar1';
$route['hr_pillar2'] = 'pages/hr_pillar2';
$route['filtered_list_of_learning_and_development/(:any)'] = 'pages/filter/$1';
$route['employees'] = 'pages/employees';
$route['list_of_learning_and_development/(:any)'] = 'pages/list_of_learning_and_development/$1';
$route['print_hr_training_user_individual/(:any)'] = 'pages/print_hr_training_user_individual/$1';
$route['export_hr_training_user_individual/(:any)'] = 'pages/export_hr_training_user_individual/$1';
$route['zip_download_per_employee_individual/(:any)'] = 'pages/zip_download_per_employee_individual/$1';
$route['add_training_admin/(:any)'] = 'pages/add_training_admin/$1';
$route['print_hr_report_TPMRF/(:any)'] = 'pages/print_hr_report_TPMRF/$1';
$route['export_hr_report_TPMRF/(:any)'] = 'pages/export_hr_report_TPMRF/$1';
$route['notify_user/(:any)'] = 'pages/notify_user/$1';
$route['notify_selected'] = 'pages/notify_selected';
$route['update_user_info_admin'] = 'pages/update_user_info_admin';
$route['hr_report'] = 'pages/hr_report';
$route['personal_information_system'] = 'pages/personal_information_system';
$route['update_user_info_pds_sheet1'] = 'pages/update_user_info_pds_sheet1';
$route['update_notification_one_signal'] = 'pages/update_notification_one_signal';
$route['send_notif_system_updates'] = 'pages/send_notif_system_updates';
$route['extra'] = 'pages/extra';
$route['children_data'] = 'pages/children_data';
$route['children_data_save'] = 'pages/children_data_save';
$route['children_data_delete'] = 'pages/children_data_delete';
$route['update_user_info_pds_sheet1_1'] = 'pages/update_user_info_pds_sheet1_1';
$route['educational_data_update'] = 'pages/educational_data_update';
$route['educational_data_save'] = 'pages/educational_data_save';
$route['educational_data'] = 'pages/educational_data';
$route['educational_data_delete'] = 'pages/educational_data_delete';
$route['personal_data_sheet_view'] = 'pages/personal_data_sheet_view';
$route['personal_data_sheet_view1'] = 'pages/personal_data_sheet_view1';
$route['personal_data_sheet_view2'] = 'pages/personal_data_sheet_view2';
$route['personal_data_sheet_view3'] = 'pages/personal_data_sheet_view3';
$route['personal_data_sheet_view_wes'] = 'pages/personal_data_sheet_view_wes';
$route['employment_information'] = 'pages/employment_information';
$route['endorse_nominee/(:any)'] = 'pages/endorse_nominee/$1';
$route['upload_memo_endorsement'] = 'pages/upload_memo_endorsement';
$route['eligibility_data'] = 'pages/eligibility_data';
$route['eligibility_data_save'] = 'pages/eligibility_data_save';
$route['eligibility_data_delete'] = 'pages/eligibility_data_delete';
$route['edit_training_inv'] = 'pages/edit_training_inv';
$route['maintenance_on'] = 'pages/maintenance_on';
$route['maintenance_off'] = 'pages/maintenance_off';
$route['work_experience_data'] = 'pages/work_experience_data';
$route['work_experience_data_save'] = 'pages/work_experience_data_save';
$route['work_experience_data_delete'] = 'pages/work_experience_data_delete';
$route['learning_and_development_data'] = 'pages/learning_and_development_data';
$route['voluntary_work_data'] = 'pages/voluntary_work_data';
$route['voluntary_work_data_save'] = 'pages/voluntary_work_data_save';
$route['voluntary_work_data_delete'] = 'pages/voluntary_work_data_delete';
$route['hobbies_data'] = 'pages/hobbies_data';
$route['hobbies_data_save'] = 'pages/hobbies_data_save';
$route['hobbies_data_delete'] = 'pages/hobbies_data_delete';
$route['recognition_data'] = 'pages/recognition_data';
$route['recognition_data_save'] = 'pages/recognition_data_save';
$route['recognition_data_delete'] = 'pages/recognition_data_delete';
$route['membership_data'] = 'pages/membership_data';
$route['membership_data_save'] = 'pages/membership_data_save';
$route['membership_data_delete'] = 'pages/membership_data_delete';
$route['references_data'] = 'pages/references_data';
$route['reference_data_save'] = 'pages/reference_data_save';
$route['reference_data_delete'] = 'pages/reference_data_delete';
$route['wes_data'] = 'pages/wes_data';
$route['wes_data_save_wes'] = 'pages/wes_data_save_wes';
$route['wes_data_delete'] = 'pages/wes_data_delete';
$route['government_data_save'] = 'pages/government_data_save';
$route['get_ous_inv_for_action_save/(:any)'] = 'pages/get_ous_inv_for_action_save/$1';
$route['postpone_nominee/(:any)'] = 'pages/postpone_nominee/$1';
$route['vacant_position_id'] = 'pages/vacant_position_id';
$route['delete_vacant_position_id'] = 'pages/delete_vacant_position_id';
$route['duplicate_vacant_position_id'] = 'pages/duplicate_vacant_position_id';
$route['open_vacant_position_id'] = 'pages/open_vacant_position_id';
$route['close_vacant_position_id'] = 'pages/close_vacant_position_id';
$route['publish_vacant_position_id'] = 'pages/publish_vacant_position_id';
$route['timeline_vacant_position_id'] = 'pages/timeline_vacant_position_id';
$route['request_for_publication/(:any)'] = 'pages/request_for_publication/$1';
$route['careers'] = 'pages/careers';
$route['get_vacant_position_open'] = 'pages/get_vacant_position_open';
$route['save_forme1'] = 'pages/save_forme1';
$route['save_forme2'] = 'pages/save_forme2';
$route['save_forme3'] = 'pages/save_forme3';
$route['save_forme4'] = 'pages/save_forme4';
$route['save_forme5'] = 'pages/save_forme5';
$route['save_forme6'] = 'pages/save_forme6';
$route['save_forme7'] = 'pages/save_forme7';
$route['save_forme8'] = 'pages/save_forme8';
$route['save_forme9'] = 'pages/save_forme9';
$route['save_forme10'] = 'pages/save_forme10';
$route['view_applicants/(:any)'] = 'pages/view_applicants/$1';
$route['get_applicants/(:any)'] = 'pages/get_applicants/$1';
$route['link_shortener'] = 'pages/link_shortener';
$route['plantilla_position_data_edit'] = 'pages/plantilla_position_data_edit';
$route['annual_recruitment_plan'] = 'pages/annual_recruitment_plan';
$route['eligibility_data_edit'] = 'pages/eligibility_data_edit';
$route['work_experience_data_edit'] = 'pages/work_experience_data_edit';
$route['voluntary_work_data_edit'] = 'pages/voluntary_work_data_edit';
$route['wes_data_edit_wes'] = 'pages/wes_data_edit_wes';
$route['my_document_data'] = 'pages/my_document_data';
$route['save_my_document'] = 'pages/save_my_document';
$route['delete_my_document'] = 'pages/delete_my_document';
$route['notify_vacant_position_id'] = 'pages/notify_vacant_position_id';
$route['work_experience_data_duplicate'] = 'pages/work_experience_data_duplicate';
$route['hr_report_learning_and_development/(:any)'] = 'pages/hr_report_learning_and_development/$1';
$route['r2_annex_j/(:any)'] = 'pages/r2_annex_j/$1';
$route['evaluate_form'] = 'pages/evaluate_form';
$route['r2_annex_j2/(:any)'] = 'pages/r2_annex_j2/$1';
$route['r2_profile_of_applicants/(:any)'] = 'pages/r2_profile_of_applicants/$1';
$route['r2_annex_k/(:any)'] = 'pages/r2_annex_k/$1';
$route['notify_disqualified_applicants'] = 'pages/notify_disqualified_applicants';
$route['search_form_applicant'] = 'pages/search_form_applicant';
$route['test_mail_server'] = 'pages/test_mail_server';
$route['hr_ipcr'] = 'pages/hr_ipcr';
$route['indicators_data'] = 'pages/indicators_data';
$route['notify_qualified_applicants'] = 'pages/notify_qualified_applicants';
$route['email_qualified_applicants'] = 'pages/email_qualified_applicants';
$route['show_flg_videos'] = 'pages/show_flg_videos';
$route['getLogs'] = 'pages/getLogs';

//Employees
$route['personal_information/(:any)'] = 'employees/personal_information/$1';
//intranet
$route['intranet'] = 'intranet/intranet';
//END OF HR

//Travel
$route['approvedto/(:any)'] = 'travel/approvedto/$1';
$route['disapprove_to/(:any)'] = 'travel/disapprove_to/$1';
$route['updatetonumber'] = 'travel/updatetonumber';


//ROD
$route['pap'] = 'rod/pap';
$route['get_pmr_pap/(:any)'] = 'rod/get_pmr_pap/$1';
$route['get_pmr_pobatanes/(:any)'] = 'rod/get_pmr_pobatanes/$1';
$route['update_target_id'] = 'rod/update_target_id';
$route['rate_target_id'] = 'rod/rate_target_id';
$route['edit_target_ous_id'] = 'rod/edit_target_ous_id';
$route['edit_target_ous_id'] = 'rod/edit_target_ous_id';
$route['performance_monitorin_report_system_notification'] = 'rod/performance_monitorin_report_system_notification';
$route['get_employees_plantilla_1'] = 'rod/get_employees_plantilla_1';
$route['get_employees_plantilla_2'] = 'rod/get_employees_plantilla_2';
$route['edit_access_form'] = 'rod/edit_access_form';
$route['opcr_output'] = 'rod/opcr_output';
$route['opcr_target'] = 'rod/opcr_target';
$route['monitoring'] = 'rod/monitoring';
$route['po_batanes_target_o'] = 'rod/po_batanes_target_o';
$route['del_target_id'] = 'rod/del_target_id';
$route['table/(:any)'] = 'rod/table/$1';
$route['table_2023'] = 'rod/table_2023';
$route['pool_of_trinees'] = 'rod/pool_of_trinees';
$route['pmr_evidences/(:any)'] = 'rod/pmr_evidences/$1';


//MYPA
$route['unit_request'] = 'pages/unit_request';
$route['notifications'] = 'pages/notifications';
$route['unit_user'] = 'pages/unit_user';
$route['unit_user_document/(:any)'] = 'pages/unit_user_document/$1';
$route['unit_user_document_add/(:any)'] = 'pages/unit_user_document_add/$1';
$route['edit_exhibits_docs'] = 'pages/edit_exhibits_docs';
$route['edit_exhibits_docs1'] = 'pages/edit_exhibits_docs1';
$route['add_exhibits_docs'] = 'pages/add_exhibits_docs';
$route['add_exhibits_docs1'] = 'pages/add_exhibits_docs1';
$route['delete_exhibits_docs'] = 'pages/delete_exhibits_docs';
$route['delete_exhibits_docs1'] = 'pages/delete_exhibits_docs1';
$route['categories'] = 'pages/categories';
$route['add_quarter'] = 'pages/add_quarter';
$route['edit_quarter'] = 'pages/edit_quarter';
$route['delete_quarter'] = 'pages/delete_quarter';
$route['operating_units'] = 'pages/operating_units';
$route['add_operating_units'] = 'pages/add_operating_units';
$route['edit_operating_units'] = 'pages/edit_operating_units';
$route['delete_operating_units'] = 'pages/delete_operating_units';
$route['unit_admin/(:any)'] = 'pages/unit_admin/$1';
$route['unit_user_document_admin/(:any)'] = 'pages/unit_user_document_admin/$1';
$route['unit_user_document_add_admin/(:any)'] = 'pages/unit_user_document_add_admin/$1';
$route['unit_user_admin'] = 'pages/unit_user_admin';
$route['add_division'] = 'pages/add_division';
$route['delete_division'] = 'pages/delete_division';
$route['edit_division'] = 'pages/edit_division';
$route['forgot_password'] = 'pages/forgot_password';
$route['forgot'] = 'pages/forgot';
$route['zip_download'] = 'pages/zip_download';
$route['zip_download_per_quarter/(:any)'] = 'pages/zip_download_per_quarter/$1';
$route['results'] = 'pages/results';
$route['add_result_docs'] = 'pages/add_result_docs';
$route['delete_result_docs'] = 'pages/delete_result_docs';
$route['calendar'] = 'pages/calendar';
$route['ajaxaccount'] = 'pages/ajaxaccount';
$route['ajaxnotifications'] = 'pages/ajaxnotifications';
$route['auth_logs'] = 'pages/auth_logs';


//END OF MYPA


//Forms for Add, Edit & Delete
//$route['ajaxaccount'] = 'pages/ajaxaccount';
$route['request_area2'] = 'pages/request_area2';
$route['request_area1'] = 'pages/request_area1';
$route['send'] = 'pages/send';
$route['su_user/(:any)'] = 'pages/su_user/$1';
$route['u_user/(:any)'] = 'pages/u_user/$1';
$route['test_user/(:any)'] = 'pages/test_user/$1';
$route['deny_user/(:any)'] = 'pages/deny_user/$1';
$route['grant_user/(:any)'] = 'pages/grant_user/$1';
$route['resetpassword_user/(:any)'] = 'pages/resetpassword_user/$1';
$route['approved_user/(:any)'] = 'pages/approved_user/$1';
$route['delete_user'] = 'pages/delete_user';
$route['block_user/(:any)'] = 'pages/block_user/$1';
$route['logout'] = 'pages/logout';
$route['zip_download_per_quarter'] = 'pages/zip_download_per_quarter';
$route['login'] = 'pages/login';
$route['update_user'] = 'pages/update_user';
$route['user_profile'] = 'pages/user_profile';

//------------------Check Session------------------------------
$route['session/check'] = 'sessioncheck/check_status';
//------------------Check Session------------------------------

////////////////////////////////////////////////////////////////////////////
$route['register'] = 'pages/register';
///////////////////////////////////////////////////////////////////////////

$route['accounts'] = 'pages/accounts';
$route['dashboard'] = 'pages/dashboard';
$route['signup'] = 'pages/signup';
//$route['site_offline'] = 'pages/site_offline';



//Maintenance & Live
$route['default_controller'] = 'pages/view';



//Create QR Code of employee
$route['create_qr_code'] = 'Createqrcode/create_qr_code';
$route['view_qr_code'] = 'Createqrcode/view_qr_code';
$route['view_qr_code_ict'] = 'Createqrcode/view_qr_code_ict';
$route['cso'] = 'customer/cso';
$route['get_cso/(:any)'] = 'customer/get_cso/$1';
$route['update_cso'] = 'customer/update_cso';
$route['qrcode/generate_create_qr_code_all'] = 'Createqrcode/generate_create_qr_code_all';
$route['qrcode/generate_create_qr_code_all_ict'] = 'Createqrcode/generate_create_qr_code_all_ict';

//Excel
$route['auth/import_wes'] = 'ExcelImport/import_wes';

//RMS
$route['sso/rms'] = 'employees/user_token';

//Maintenance
//$route['default_controller'] = 'pages/site_offline';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





