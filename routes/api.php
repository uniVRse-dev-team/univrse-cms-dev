<?php
use App\Http\Controllers\Api\V1\Admin\ExhibitorApiController;
use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use App\Http\Controllers\Api\V1\Admin\OrganizerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('media/{id}', [ExhibitorApiController::class, 'getmedia']);

Route::post('uploadMedia', [ExhibitorApiController::class, 'uploadMedia']);

//User register/login/logout
Route::post('/registerUser', [UsersApiController::class, 'registerUser']);
Route::post('/loginUser', [UsersApiController::class, 'loginUser']);

// Customize booth
Route::put('/customBooth', [ExhibitorApiController::class, 'customizeBooth']);

// Add speaker
Route::post('/speaker', [OrganizerApiController::class, 'addSpeaker']);

Route::group(['middleware' => ['auth:sanctum']], function(){
Route::post('/logoutUser', [UsersApiController::class, 'logoutUser']);

});


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api/V1/Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Organizer
    Route::post('organizers/media', 'OrganizerApiController@storeMedia')->name('organizers.storeMedia');
    Route::apiResource('organizers', 'OrganizerApiController');


    // Delegates
    Route::apiResource('delegates', 'DelegatesApiController');

    // Briefcase
    Route::apiResource('media', 'BriefcaseController');

    // Sponsor
    Route::post('sponsors/media', 'SponsorApiController@storeMedia')->name('sponsors.storeMedia');
    Route::apiResource('sponsors', 'SponsorApiController');

    // Schedule
    Route::apiResource('schedules', 'ScheduleApiController');
});
