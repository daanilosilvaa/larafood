<?php

// use App\Models\Client;

// Route::get('teste', function(){

//     $client = Client::first();

//     $token = $client->createToken('token-teste');
//     dd($token->plainTextToken);
// });

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){

        /**
         * Orders
         */

        Route::get('orders', 'OrderController@index')->name('orders.index');


        /**
         * Role x User
         */
        Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.roles.detch');
        Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRoleUser')->name('users.roles.attach');
        Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
        Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
        Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');


        /**
         * Permissions x Role
         */
        Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permission.detch');
        Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
        Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

        /**
         * Routes Roles
         */
        Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
        Route::resource('roles', 'ACL\RoleController');


        /**
         * Route State X City
         */
        Route::delete('state/{urlState}/cities/{idCity}', 'CityStateController@destroy' )->name('cities.state.destroy');
        Route::get('state/{urlState}/cities/create', 'CityStateController@create' )->name('cities.state.create');
        Route::get('state/{urlState}/cities/{idCity}', 'CityStateController@show' )->name('cities.state.show');
        Route::put('state/{urlState}/cities/{idCity}', 'CityStateController@update' )->name('cities.state.update');
        Route::get('state/{urlState}/cities/{idCity}/edit', 'CityStateController@edit' )->name('cities.state.edit');
        Route::post('state/{urlState}/cities', 'CityStateController@store' )->name('cities.state.store');
        Route::get('state/{urlState}/cities', 'CityStateController@index' )->name('cities.state.index');




        /**
         * Routes States
         */
        Route::any('states/search', 'StateController@search')->name('states.search');
        Route::resource('states', 'StateController');

        /**
         * Route Tenant X address
         */
        Route::delete('tenant/{urlTenant}/address/{idAddress}', 'AddressTenantController@destroy' )->name('addresses.tenant.destroy');
        Route::get('tenant/{urlTenant}/address/create', 'AddressTenantController@create' )->name('addresses.tenant.create');
        Route::get('tenant/{urlTenant}/address/{idAddress}', 'AddressTenantController@show' )->name('addresses.tenant.show');
        Route::put('tenant/{urlTenant}/address/{idAddress}', 'AddressTenantController@update' )->name('addresses.tenant.update');
        Route::get('tenant/{urlTenant}/address/{idAddress}/edit', 'AddressTenantController@edit' )->name('addresses.tenant.edit');
        Route::post('tenant/{urlTenant}/address', 'AddressTenantController@store' )->name('addresses.tenant.store');
        Route::get('tenant/{urlTenant}/address', 'AddressTenantController@index' )->name('addresses.tenant.index');

        /**
         * Routes Company
         */
        Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
        Route::resource('tenants', 'TenantController');

        /**
         * Routes Sale
         */
        Route::any('sales/search', 'SaleController@search')->name('sales.search');
        Route::resource('sales', 'SaleController');


        /**
         * Routes Table
         */
        Route::get('tables/qrcode/{identify}', 'TableController@qrcode')->name('tables.qrcode');
        Route::any('tables/search', 'TableController@search')->name('tables.search');
        Route::resource('tables', 'TableController');


        /**
         * Products x Category
         */
        Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detch');
        Route::post('products/{id}/categories', 'CategoryProductController@attachCategorysProduct')->name('products.categories.attach');
        Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
        Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
        Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');


        /**
         * Routes Products
         */
        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');



        /**
         * Routes Categories
         */
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');


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
        Route::get('/', 'DashboardController@home')->name( 'admin.index');

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
