<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('demo-backend', [App\Http\Controllers\API\DinningController::class, 'demoGetRequestFromBackend']);

Route::post('login', [App\Http\Controllers\API\DinningController::class, 'backendLogin']);
Route::get('/unauthorized', [App\Http\Controllers\API\DinningController::class, 'unauthorized'])->name('unauthorized');
Route::get('logout', [App\Http\Controllers\API\BackendUserController::class, 'logout']);
Route::get('/role/list', [App\Http\Controllers\API\RoleController::class, 'list']);

Route::middleware('auth:backend-api')->group(function () {
 
    Route::prefix('role/')->group(function () {
        
        Route::get('{id}/delete', [App\Http\Controllers\API\RoleController::class, 'delete']);
        // Route::get('list', [App\Http\Controllers\API\RoleController::class, 'list']);
        Route::get('{id}/get-by-id', [App\Http\Controllers\API\RoleController::class, 'upsert']);
        
        Route::post('create', [App\Http\Controllers\API\RoleController::class, 'upsert']);
        Route::get('tree', [App\Http\Controllers\API\RoleController::class, 'getUserTree']);
        
        Route::post('sync', [App\Http\Controllers\API\RoleController::class, 'syncPermission']);
        
    });
    
    Route::prefix('user/')->group(function () {
        
        Route::post('create', [App\Http\Controllers\API\BackendUserController::class, 'upsert']);
        Route::get('{id}/delete', [App\Http\Controllers\API\BackendUserController::class, 'delete']);
        Route::get('list', [App\Http\Controllers\API\BackendUserController::class, 'list']);
        Route::get('{id}/get-by-id', [App\Http\Controllers\API\BackendUserController::class, 'upsert']);
        
    });
    
    Route::prefix('permission/')->group(function () {
        
        Route::get('list', [App\Http\Controllers\API\BackendUserController::class, 'permissionList']);

    });
    
});