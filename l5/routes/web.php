<?php
Route::any("Pipedrive", "UserController@index");
Route::any("Pipedrive/login", "UserController@index");
Route::any("Pipedrive/dashboard/setting", "UserController@setting");
Route::any("Pipedrive/dashboard/addedituser", "UserController@addedituser");
Route::any("Pipedrive/logout", "UserController@logout");
Route::any("Pipedrive/dashboard", "pd_cermController@dashboard");
Route::any("Pipedrive/dashboard/connecter", "pd_cermController@index");
Route::any('Pipedrive/dashboard/addeditNC', 'pd_cermController@addeditNC');
Route::any('Pipedrive/dashboard/addeditNC/{id}', 'pd_cermController@addeditNC');
Route::any('Pipedrive/dashboard/dealswebhook', 'PipedriveController@dealswebhook');
Route::get('Pipedrive/dashboard/clearcache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::any('Pipedrive/dashboard/Testcontroller', 'Testcontroller@index');