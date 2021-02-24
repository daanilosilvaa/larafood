<?php

Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
Route::get('/tenants', 'Api\TenantApiController@index');


Route::get('/categories/{url}', 'Api\CategoryApiController@show');
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

Route::get('/tables/{identify}', 'Api\TableApiController@show');
Route::get('/tables', 'Api\TableApiController@tableByTenant');


// Route::get('/products/{identify}', 'Api\ProductApiController@show');
Route::get('/products', 'Api\ProductApiController@productsByTenant');


