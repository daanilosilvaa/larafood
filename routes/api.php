<?php



Route::post('/auth/register', 'Api\Auth\RegisterApiController@store');

Route::post('/auth/token', 'Api\Auth\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    Route::get('/auth/me' , 'Api\Auth\AuthClientController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClientController@logout');

    Route::post('/auth/v1/orders/{identifyOrder}/evaluations', 'Api\EvaluationApiController@store');

    Route::get('/auth/v1/my-orders', 'Api\OrderApiController@myOrders');
    Route::post('/auth/v1/orders', 'Api\OrderApiController@store');



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

    Route::get('/states', 'StateApiController@index');
    Route::get('/states/{uuidState}', 'StateApiController@cities');
    Route::get('/states/{uuidState}/city/{uuid}', 'StateApiController@city');




});

/**
 * Test Api
 */

Route::get('/', function() {
    return response()->json(['message' => 'ok']);
});




