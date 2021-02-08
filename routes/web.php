<?php

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){

    /**
     * Routes Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /**
     * Plans x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachPlanProfile')->name('plans.profiles.detch');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachPlanProfile')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

    /**
     * Profile x Permissions
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detch');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permission.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permission.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permission');
    Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');



    /**
     * Routes Permissions
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Routes Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

    /**
     * Route Details Plans
     */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy' )->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create' )->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show' )->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update' )->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit' )->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store' )->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index' )->name('details.plan.index');

    /***
     * Route Plans
     */
    Route::any('plans/search', 'PlanController@search')->name( 'plans.search');
    Route::get('plans', 'PlanController@index')->name( 'plans.index');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name( 'plans.edit');
    Route::put('plans/{url}', 'PlanController@update')->name( 'plans.update');
    Route::get('plans/create', 'PlanController@create')->name( 'plans.create');
    Route::post('plans/create', 'PlanController@store')->name( 'plans.store');
    Route::get('plans/{url}', 'PlanController@show')->name( 'plans.show');
    Route::delete('plans/{url}', 'PlanController@destroy')->name( 'plans.destroy');
    
    /**
     * Home Dashboard
     */
    Route::get('/', 'PlanController@index')->name( 'admin.index');

});



/**
 * Site route
 */
Route::namespace('Site')
    ->group(function(){
        Route::get('/plans/{url}', 'SiteController@plans')->name('plan.subscription');
        Route::get('/', 'SiteController@index')->name('site.home');
});
/**
 * Auth Routes
 */

Auth::routes();
