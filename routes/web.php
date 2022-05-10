<?php
use Illuminate\Support\Facades\Route;
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

/**
 * New Routes
 */

// Main
Route::get('logout', 'AuthController@logout');
Route::post('/auth', 'AuthController@index');
Route::redirect('/', url('/dashboard'));

//Pages
Route::get('/dashboard','PageController@dashboard');
Route::get('/applicants','PageController@applicants');
Route::get('/applicants/{id}','PageController@applicantProfile');
Route::get('/trainings','PageController@trainings');
Route::get('/maintenance','PageController@maintenance');

//Dashboard -- Data
Route::post('/count-hiresource','DashboardController@hireSourceCount');
Route::post('/get-usage','DashboardController@getSSHRUsage');

//Modals
Route::get('/filter-applicant/show','ApplicantController@showFilterApplicants');
Route::get('/new-applicant/show','ApplicantController@showNewApplicant');
Route::get('/new-app-contact/show','ApplicantController@showNewAppContact');
Route::get('/edit-app-contact/show/{id}','ApplicantController@showEditAppContact');
Route::get('/new-app-education/show','ApplicantController@showNewAppEducation');
Route::get('/edit-app-education/show/{id}','ApplicantController@showEditAppEducation');
Route::get('/new-app-experience/show','ApplicantController@showNewAppExperience');
Route::get('/edit-app-experience/show/{id}','ApplicantController@showEditAppExperience');
Route::get('/new-app-training/show/{id}/{id2}','ApplicantController@showNewAppTraining');
Route::get('/app-training-details/show/{id}/{id2}','ApplicantController@showAppTrainingDetails');
Route::get('/new-app-training-enrolled/show/{id}','ApplicantController@showEnrolledApp');
Route::get('/enrolled-applicants/show/{id}','TrainingController@showEnrolledApp');

//Tabs
Route::get('/edit-applicant/{id}','ApplicantController@showEditApp');
Route::get('/edit-app-employment/{id}','ApplicantController@showEditAppEmployment');

// Applicants ~ Insert ~ Update
Route::post('/applicant/save','ApplicantController@saveApplicant');
Route::post('/applicant/update','ApplicantController@updateApplicant');
// Applicant Contact ~ Insert ~ Update
Route::post('/app-contact/save','ApplicantController@saveAppContact');
Route::post('/app-contact/update','ApplicantController@updateAppContact');
// Applicant Education ~ Insert ~ Update
Route::post('/app-education/save','ApplicantController@saveAppEducation');
Route::post('/app-education/update','ApplicantController@updateAppEducation');
// Applicant Experience ~ Insert ~ Update
Route::post('/app-experience/save','ApplicantController@saveAppExperience');
Route::post('/app-experience/update','ApplicantController@updateAppExperience');
// Applicant Interview ~ Insert ~ Update
Route::post('/app-interview/save','ApplicantController@saveAppInterview');
// Applicant Training ~ Insert ~ Update
Route::post('/app-training/save','ApplicantController@saveAppTraining');
Route::post('/app-training/delete','ApplicantController@removeAppTraining');
// Applicant Employment ~ Insert ~ Update
Route::post('/app-employment/save','ApplicantController@saveAppEmployment');
Route::post('/app-employment/update/req','ApplicantController@updateTagAppEmploymentWithReq');
Route::post('/app-employment/update/deploy','ApplicantController@updateTagAppEmploymentDeploy');

// Options -- Data
Route::post('/get-applicants','ApplicantController@getSSApplicants');
Route::post('/get-all-trainings','TrainingController@getSSTrainings');
Route::post('/get-municipal/{id}','OptionsController@getMunicipal');
Route::post('/get-barangay/{id}','OptionsController@getBarangay');
Route::post('/get-seasonal-dates/{date}','OptionsController@getSeasonalDateEnd');
Route::post('/get-prf/{appID}/{loc}','OptionsController@getPRF');

// Reports
Route::get('/org-app/show/{id}/{id2}','ReportController@showRPTOriginalAppointment');
Route::get('/app-rec/show/{id}','ReportController@showRPTAppRecord');
Route::get('/emp-rec/show/{id}','ReportController@showRPTEmployeeRecord');
Route::get('/app-monitoring/show','ReportController@showRPTAppMonitoring');
Route::get('/app-source/show','ReportController@showRPTAppSource');
Route::get('/failed-app/show','ReportController@showRPTFailedApp');
Route::get('/int-count/show','ReportController@showRPTIntCount');
Route::get('/trained-app/show','ReportController@showRPTTrainedApp');
