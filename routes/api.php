<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DinningController;

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

// Public routes
Route::post('login', [DinningController::class, 'login']);
Route::post('general-form-submit', [DinningController::class, 'saveForm']); // stage 0 , old pdf ui
Route::post('general-form-submit-phase1', [DinningController::class, 'saveFormPhase1']); // new pdf with images stage 1
Route::post('backend/ios/login', [DinningController::class, 'iosFormLogin']);

// Protected routes with API token
Route::middleware('APIToken')->group(function () {
    Route::get('rooms-list', [DinningController::class, 'getRoomList']);
    Route::post('order-list', [DinningController::class, 'getOrderList']);
    Route::post('item-list', [DinningController::class, 'getItemList']);
    Route::post('update-order', [DinningController::class, 'updateOrder']);
    Route::post('demo-get-report-data', [DinningController::class, 'getCategoryWiseData']);
    Route::post('demo-get-room-data', [DinningController::class, 'getRoomData']);
    Route::post('get-user-data', [DinningController::class, 'getUserData']);
    Route::post('print-order-data', [DinningController::class, 'printOrderData']);
    // Route::post('general-form-submit', [DinningController::class, 'saveForm']);
    Route::post('send-email', [DinningController::class, 'sendEmail']);
    Route::post('form-details', [DinningController::class, 'getFormDetails']);
    Route::post('edit-form', [DinningController::class, 'editGeneratedFormResponse']); // old working api stage 0
    Route::post('list-forms', [DinningController::class, 'getGeneratedForms']);
    Route::post('delete-form', [DinningController::class, 'deleteFormResponse']);
    Route::post('complete-log', [DinningController::class, 'completeFormLog']);
    // Route::post('get-report-data', [DinningController::class, 'getCategoryWiseDataDemo']);
    Route::post('demo-order-list', [DinningController::class, 'getDemoOrderList']);
    Route::post('demo-form-submit', [DinningController::class, 'saveForm1']);
    Route::post('delete-form-attachment', [DinningController::class, 'deleteFormAttachment']);
    Route::post('add-form-attachment', [DinningController::class, 'addAttachmentsToExistingForm']); 
    Route::post('guest-order-list', [DinningController::class, 'getGuestOrderList']);
    
    // Phase 1 endpoints
    Route::post('edit-form-phase1', [DinningController::class, 'editGeneratedFormResponsePhase1']);
    Route::post('add-form-attachment-phase1', [DinningController::class, 'addAttachmentsToExistingFormPhase1']);
    Route::post('delete-form-attachment-phase1', [DinningController::class, 'deleteFormAttachmentPhase1']);
});

// Backend API authenticated routes
Route::middleware('auth:backend-api')->group(function () {
    Route::post('temp-send-email', [DinningController::class, 'tempSendMail']);
    Route::post('temp-form-response-list', [DinningController::class, 'getTempFormResponseList']);
    Route::get('get-temp-form-list', [DinningController::class, 'getTempFormTypesList']);
    Route::post('temp-form-save', [DinningController::class, 'saveTempForm']);
    Route::get('demo-form-fields-by-id/{id}', [DinningController::class, 'getDynamicFormDemoDataById']);
    Route::get('temp-get-user-data', [DinningController::class, 'getTempUserData']);
    Route::get('{id}/temp-form-response-delete', [DinningController::class, 'deleteTempFormResponse']);

    // Website routes
    Route::post('temp-form-save-by-user', [DinningController::class, 'saveTempFormByUser']);
    Route::get('temp-form-type/{id}/delete', [DinningController::class, 'deleteTempFormType']);
    Route::get('temp-form-type-list', [DinningController::class, 'tempFormTypeList']);
    Route::get('{id}/temp-form-type-by-id', [DinningController::class, 'tempFormTypeById']);
    
    Route::post('edit-temp-form', [DinningController::class, 'editGeneratedTempFormResponse']);
    
    Route::post('delete-temp-form-attachment', [DinningController::class, 'deleteTempFormAttachment']);
    Route::post('add-temp-form-attachment', [DinningController::class, 'addAttachmentsToExistingTempForm']);
});

// Additional public routes
Route::post('get-report-data', [DinningController::class, 'getCategoryWiseDataDemo']);
Route::post('get-charges-report', [DinningController::class, 'reportData']);
Route::post('temp-form-details', [DinningController::class, 'getTempFormDetails']);
Route::get('temp-form-template-download', [DinningController::class, 'getTempFormDownload']);
Route::post('save-temp-form-pdf', [DinningController::class, 'saveFormTempPdf']);
Route::post('print-combined-order-data', [DinningController::class, 'printOrderDataTemp']);
Route::post('temp-get-charges-report', [DinningController::class, 'reportDataTemp2']);
Route::post('multi-order-update', [DinningController::class, 'updateOrderBulk']);