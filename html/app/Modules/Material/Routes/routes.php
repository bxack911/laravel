<?php Route::group( [
    'namespace' => 'App\Modules\Material\Controllers',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'as' => 'material.',
], function(){
    Route::get('/material', ['uses' => 'MaterialController@index']);
});

Route::group([
    'namespace' => 'App\Modules\Material\Controllers\Admin',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'as' => 'material.',
], function () {
    Route::get('/admin/material', ['uses' => 'MaterialController@index']);
});


Route::group(['namespace' => 'App\Modules\Dashboard\Controllers\Admin',
    'as' => 'dashboard.',
], function () {
    Route::get('/admin', ['uses' => 'DashboardController@index']);
});
