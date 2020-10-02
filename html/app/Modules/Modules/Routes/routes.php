<?php

Route::group([
    'namespace' => 'App\Modules\Modules\Controllers\Admin',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'as' => 'module.',
], function () {
    Route::get('/admin/modules', ['uses' => 'ModulesController@index']);
    Route::post('/admin/modules', ['uses' => 'ModulesController@table']);
    Route::get('/admin/modules/create', ['uses' => 'ModulesController@create']);
    Route::get('/admin/modules/update/{key}', ['uses' => 'ModulesController@update']);
    Route::get('/admin/modules/delete/{key}', ['uses' => 'ModulesController@delete']);
});
