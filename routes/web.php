<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\VAT;
use App\Http\Controllers\RentControllerController;
use App\Http\Controllers\DurationController;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('loglog.login');
});

Auth::routes();
//السندات
Route::get('/revenues', 'BondsController@revenues');
Route::post('pay_return', 'BondsController@pay_return');
Route::post('pay_penalty', 'BondsController@pay_penalty');
Route::resource('general_bonds', 'BondsController');
Route::get('/bonds_detils/{id}', 'BondsController@edit');
Route::get('/generate-pdf/{id}', 'BondsController@generatePDF')->name('pdf.generate');
Route::get('/generate-pdf-download/{id}', 'BondsController@generatePDFDownload')->name('pdf.generate');


//السندات
//*************************************************************************************************************

//شجرة الحسابات
Route::resource('tree', 'AccountTreeController');

//شجرة الحسابات
//*************************************************************************************************************
//الصناديق
Route::resource('treasures', 'UserTreasureController');
Route::get('/All_treasures/{id}', 'UserTreasureController@All_treasures');
Route::post('/tranfer_mony', 'UserTreasureController@tranfer_mony')->name('tranfer_mony');

//الصناديق
//*************************************************************************************************************


// عقود التشغيل
Route::get('/rentupdate/{id}', 'ContractController@edit');
Route::resource('end_contract', 'EndContractController');
Route::post('/contract_update', 'ContractController@update');
Route::get('/getemp_name/{id}', 'RentControllerController@getemp_name');
Route::get('/ser_cont/{id}', 'RentControllerController@ser_cont');
Route::get('/print_cont/{id}', 'RentControllerController@print_contract');
Route::get('/rentcont/{id}', 'RentControllerController@create');
Route::post('rent_comment', 'RentControllerController@rent_comment');
Route::post('upd_exp_sada', 'RentControllerController@upd_exp_sada');
Route::post('/serach_rent', 'ContractController@serach_rent');
Route::resource('avavailable_maid', 'AvavailableMaidController');

Route::resource('change_emp', 'MaidMovmoentController');
Route::get('/contract_detils/{id}', 'ContractController@contract_detils');
Route::post('/export_contract', 'RentControllerController@export_contract');
// عقود التشغيل

// عقود الاستقدام
//*************************************************************************************************************
Route::get('/recruitmentcont/{id}', 'RecruitmentContractController@create');
Route::resource('recruitment', 'RecruitmentContractController');

Route::resource('offers_recruitment', 'RecruitmentOffersController');
Route::get('add_recruitment', 'RecruitmentOffersController@add_recruitment');
Route::get('/get_offer_rec/{nash}/{emp_typ}/{Age}/{religion}/{emp_exp}', 'RecruitmentOffersController@get_offer_rec');
Route::get('/get_offer_rec_typ/{nash}/{emp_typ}', 'RecruitmentOffersController@get_offer_rec_typ');
Route::get('/getdataoffer_value/{id}', 'RecruitmentOffersController@getdataoffer_value');
Route::get('/recruitment_detils/{id}', 'RecruitmentContractController@recruitment_detils');

//*************************************************************************************************************
// عقود الاستقدام


Route::get('/agent_details/{id}', 'AgentsController@agent_details');


Route::get('/send-sms','RentControllerController@send_sms');
Route::resource('rent', 'RentControllerController');
Route::get('download_att/{company_number}/{file_name}', 'ContractController@get_file');
Route::post('delete_file_att', 'ContractController@destroy')->name('delete_file');
Route::get('View_file_att/{company_number}/{file_name}', 'ContractController@open_file');
Route::resource('contractAttachments', 'ContractAttachmentsController');
Route::resource('maids', 'MaidsController');


Route::post('Search_maids', 'MaidsController@Search_maids');

Route::get('/nash/{id}', 'ContractController@getoffer');
Route::get('/getdataoffer/{id}', 'ContractController@getdataoffer');


Route::post('/maids_upload_img', 'MaidsAttachmentsController@update');

Route::get('/maidsDetails/{id}', 'MaidsController@showDetails');
Route::resource('wakel', 'WakelController');
Route::resource('call', 'CallCenterController');
Route::resource('agents', 'AgentsController');
Route::resource('offers', 'OffersController');
Route::get('add_offer', 'OffersController@addoffer');

Route::resource('forword', 'forword_controller');
Route::resource('block', 'block_agents');
Route::resource('unbloock', 'unblock');
Route::resource('vist', 'vist_controller');

Route::get('/rent_cont/{id}/{agent_name}/{agent_id}/{agent_phone}', 'RentControllerController@index');
Route::get('/contract/{id}/{agent_name}/{agent_id}/{agent_phone}', 'ContractController@index');



Route::get('wait_forword', 'AgentsController@forword');
Route::get('agents_block', 'AgentsController@block');


Route::get('contact_agent', 'AgentsController@contact');
Route::get('/call_center/{id}', 'CallCenterController@edit');
Route::resource('nationality', 'NationalitiesController');
Route::resource('employees', 'EmployeesController');
Route::resource('emp_groups', 'EmpGroupsController');
Route::resource('companys', 'CompanysController');
Route::get('show_offer', 'OffersController@show_offer');

Route::resource('Durations', 'DurationController');
Route::get('/Duration/{id}', 'DurationController@getcost');

Route::resource('report_agents', 'AgentsReportController');
Route::post('Search_report', 'AgentsReportController@Search_report');
Route::post('Search_agents', 'AgentsController@Search_agents');

Route::resource('citys', 'CitysController');
Route::resource('groups', 'GroupsController');
Route::resource('careers', 'CareersController');
Route::resource('sections', 'SectionsController');
Route::resource('items', 'ItemsController');

Route::get('/Details_groups/{id}/{groups_name}', 'GroupsController@index');
Route::get('/agents_edit/{id}', 'AgentsController@edit');
Route::resource('CompanysAttachments', 'CompanysAttachmentsController');
Route::get('/companysDetails/{id}', 'CompanysDetailsController@edit');
Route::get('/AgentsDetails/{id}', 'AgentsDetailsController@edit');
Route::get('ReadNotification/{id}','AgentsDetailsController@ReadNotification')->name('ReadNotification');

Route::get('/edit_companys/{id}', 'CompanysController@edit');
Route::get('/edit_employees/{id}', 'EmployeesController@edit');
Route::get('download/{company_number}/{file_name}', 'CompanysDetailsController@get_file');
Route::post('delete_file', 'CompanysDetailsController@destroy')->name('delete_file');
Route::get('View_file/{company_number}/{file_name}', 'CompanysDetailsController@open_file');

Route::get('MarkAsRead_all','AgentsController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});

Route::get('online-user', [UserController::class, 'online']);
//Route::get('Export_agents', 'AgentsController@export');
Route::get('/Export_agents', [AgentsController::class,'export']);


//*******************************************************************
Route::get('/qr', [QRController::class, 'index'])->name('qr-form');
Route::post('/generate-qr-image', [QRController::class, 'generate'])->name('generate-qr-image');
Route::get('/generate-qr-image/{id}', [QRController::class, 'generate_vat'])->name('generate-qr-vat');
//************************************************************************
Route::get('/{page}', 'AdminController@index');
