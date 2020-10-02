<?php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'namespace' => 'App\Modules\Dashboard\Controllers\Admin',
    'as' => 'material.',
], function () {
    Route::get('/admin', ['uses' => 'DashboardController@index']);
});
