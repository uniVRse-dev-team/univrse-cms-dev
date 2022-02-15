<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('/dashboard', 'HomeController@dashboard')->name('home.dashboard');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Organizer
    Route::delete('organizers/destroy', 'OrganizerController@massDestroy')->name('organizers.massDestroy');
    Route::post('organizers/media', 'OrganizerController@storeMedia')->name('organizers.storeMedia');
    Route::post('organizers/ckmedia', 'OrganizerController@storeCKEditorImages')->name('organizers.storeCKEditorImages');
    Route::resource('organizers', 'OrganizerController');

    // Exhibitor
    Route::delete('exhibitors/destroy', 'ExhibitorController@massDestroy')->name('exhibitors.massDestroy');
    Route::get('exhibitors/media', 'ExhibitorController@upload')->name('exhibitors.uploadMedia');
    Route::post('exhibitors/media', 'ExhibitorController@storeMedia')->name('exhibitors.storeMedia');
    Route::post('exhibitors/ckmedia', 'ExhibitorController@storeCKEditorImages')->name('exhibitors.storeCKEditorImages');
    Route::post('exhibitors/media/upload', 'ExhibitorController@sendMedia')->name('exhibitors.sendMedia');
    Route::get('exhibitors/manageMember', 'ExhibitorController@manageMember')->name('exhibitors.mngMember');
    Route::get('exhibitors/viewMember', 'ExhibitorController@viewMember')->name('exhibitors.viewMember');
    Route::get('exhibitors/removeMember/{e_id}/{u_id}', 'ExhibitorController@removeMember')->name('exhibitors.removeMember');
    Route::post('exhibitors/addMember', 'ExhibitorController@addMember')->name('exhibitors.addMember');
    Route::resource('exhibitors', 'ExhibitorController');

    // Delegates
    Route::delete('delegates/destroy', 'DelegatesController@massDestroy')->name('delegates.massDestroy');
    Route::resource('delegates', 'DelegatesController');

    // Sponsor
    Route::delete('sponsors/destroy', 'SponsorController@massDestroy')->name('sponsors.massDestroy');
    Route::post('sponsors/media', 'SponsorController@storeMedia')->name('sponsors.storeMedia');
    Route::post('sponsors/ckmedia', 'SponsorController@storeCKEditorImages')->name('sponsors.storeCKEditorImages');
    Route::resource('sponsors', 'SponsorController');

    // Briefcase
    Route::get('briefcase/view', 'BriefcaseController@index')->name('briefcase.index');
    Route::get('briefcase/viewfile/{id}', 'BriefcaseController@viewFile')->name('briefcase.viewfile');
    Route::get('briefcase/viewpdf/{id}', 'BriefcaseController@viewPdfFile')->name('briefcase.viewpdffile');
    Route::get('briefcase/download/{id}', 'BriefcaseController@download')->name('briefcase.download');
    Route::get('briefcase/remove/{id}', 'BriefcaseController@remove')->name('briefcase.remove');
    Route::delete('briefcase/destroy', 'BriefcaseController@massDestroy')->name('briefcase.massDestroy');

    // User Briefcase
    Route::get('userbriefcase/view', 'UserBriefcaseController@index')->name('userbriefcase.index');
    Route::get('userbriefcase/create', 'UserBriefcaseController@create')->name('userbriefcase.create');
    Route::post('userbriefcase/add', 'UserBriefcaseController@add')->name('userbriefcase.add');
    Route::delete('userbriefcase/destroy', 'UserBriefcaseController@massDestroy')->name('userbriefcase.massDestroy');

    // Schedule
    Route::get('schedules/speakers', 'ScheduleController@manageSpeaker')->name('schedules.manageSpeaker');
    Route::get('schedules/speakers/remove/{sc_id}/{sp_id}', 'ScheduleController@removeSpeaker')->name('schedules.removeSpeaker');
    Route::get('schedules/speakers/add', 'ScheduleController@addSpeaker')->name('schedules.addSpeaker');
    Route::post('schedules/speakers/adding', 'ScheduleController@addingSpeaker')->name('schedules.addingSpeaker');
    Route::delete('schedules/destroy', 'ScheduleController@massDestroy')->name('schedules.massDestroy');
    Route::resource('schedules', 'ScheduleController');
    Route::post('schedules/media', 'ScheduleController@storeMedia')->name('schedules.storeMedia');
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
