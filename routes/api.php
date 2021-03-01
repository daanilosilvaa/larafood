<?php


Route::post('/auth/register', 'Api\Auth\RegisterApiController@store');

Route::post('/auth/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function(){

    $version = "v1";
    Route::get('/auth/me' , 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');

    Route::post('/auth/{$version}/orders/{identifyOrder}/evaluations', 'Api\EvaluationApiController@store');

    Route::get('/auth/{$version}/my-orders', 'Api\OrderApiController@myOrders');
    Route::post('/auth/{$version}/orders', 'Api\OrderApiController@store');



});
Route::group([
    'prefix' => 'v1',
    'namespace'=> 'Api',
], function(){
    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tableByTenant');

    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');

    

    Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');
    
    
    
});




