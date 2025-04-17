<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'API\DinningController@login');
Route::post('general-form-submit', 'API\DinningController@saveForm'); // stage 0 , old pdf ui

Route::post('general-form-submit-phase1', 'API\DinningController@saveFormPhase1'); // new pdf with images stage 1

Route::post('backend/ios/login', 'API\DinningController@iosFormLogin');

Route::group(['middleware' => 'APIToken'], function () {
    
    Route::get('rooms-list', 'API\DinningController@getRoomList');
    Route::post('order-list', 'API\DinningController@getOrderList');
    Route::post('item-list', 'API\DinningController@getItemList');
    Route::post('update-order', 'API\DinningController@updateOrder');
    Route::post('demo-get-report-data', 'API\DinningController@getCategoryWiseData');
    Route::post('demo-get-room-data', 'API\DinningController@getRoomData');
    Route::post('get-user-data', 'API\DinningController@getUserData');
    Route::post('print-order-data', 'API\DinningController@printOrderData');
    // Route::post('general-form-submit', 'API\DinningController@saveForm');
    Route::post('send-email', 'API\DinningController@sendEmail');
    Route::post('form-details', 'API\DinningController@getFormDetails');
    Route::post('edit-form', 'API\DinningController@editGeneratedFormResponse'); // old working api stage 0
    Route::post('list-forms', 'API\DinningController@getGeneratedForms');
    Route::post('delete-form', 'API\DinningController@deleteFormResponse');
    Route::post('complete-log', 'API\DinningController@completeFormLog');
    // Route::post('get-report-data', 'API\DinningController@getCategoryWiseDataDemo');
    Route::post('demo-order-list', 'API\DinningController@getDemoOrderList');
    Route::post('demo-form-submit', 'API\DinningController@saveForm1');
    Route::post('delete-form-attachment', 'API\DinningController@deleteFormAttachment');
    Route::post('add-form-attachment', 'API\DinningController@addAttachmentsToExistingForm'); 
    Route::post('guest-order-list', 'API\DinningController@getGuestOrderList');
    
    Route::post('edit-form-phase1', 'API\DinningController@editGeneratedFormResponsePhase1'); // new api stage 1
    Route::post('add-form-attachment-phase1', 'API\DinningController@addAttachmentsToExistingFormPhase1'); // new api stage 1
    Route::post('delete-form-attachment-phase1', 'API\DinningController@deleteFormAttachmentPhase1'); // new api stage 1

});

Route::group(['middleware' => 'auth:backend-api'] , function () {
 
    Route::post('temp-send-email', 'API\DinningController@tempSendMail');
    Route::post('temp-form-response-list' , 'API\DinningController@getTempFormResponseList');
    Route::get('get-temp-form-list', 'API\DinningController@getTempFormTypesList');
    Route::post('temp-form-save', 'API\DinningController@saveTempForm');
    Route::get('demo-form-fields-by-id/{id}', 'API\DinningController@getDynamicFormDemoDataById');
    Route::get('temp-get-user-data', 'API\DinningController@getTempUserData');
    Route::get('{id}/temp-form-response-delete', 'API\DinningController@deleteTempFormResponse');

    //website routes
    Route::post('temp-form-save-by-user', 'API\DinningController@saveTempFormByUser'); //Get-temp-form-list
    Route::get('temp-form-type/{id}/delete', 'API\DinningController@deleteTempFormType');
    Route::get('temp-form-type-list', 'API\DinningController@tempFormTypeList');
    Route::get('{id}/temp-form-type-by-id', 'API\DinningController@tempFormTypeById');
    
    Route::post('edit-temp-form', 'API\DinningController@editGeneratedTempFormResponse');
    // Route::post('temp-form-details', 'API\DinningController@getTempFormDetails');
    
    Route::post('delete-temp-form-attachment', 'API\DinningController@deleteTempFormAttachment');
    Route::post('add-temp-form-attachment', 'API\DinningController@addAttachmentsToExistingTempForm');
    
});
Route::post('get-report-data', 'API\DinningController@getCategoryWiseDataDemo');

Route::post('get-charges-report', 'API\DinningController@reportData');
// Route::post('temp-form-save-by-user', 'API\DinningController@saveTempFormByUser'); //Get-temp-form-list
    Route::post('temp-form-details', 'API\DinningController@getTempFormDetails');
    
Route::get('temp-form-template-download', 'API\DinningController@getTempFormDownload');
Route::post('save-temp-form-pdf', 'API\DinningController@saveFormTempPdf');
Route::post('print-combined-order-data', 'API\DinningController@printOrderDataTemp');

Route::post('temp-get-charges-report', 'API\DinningController@reportDataTemp2');

Route::post('multi-order-update', 'API\DinningController@updateOrderBulk');
    
