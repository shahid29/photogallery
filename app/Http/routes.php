<?php

/*
|--------------------------------------------------------------------------
| Admin Login Start
|--------------------------------------------------------------------------
*/

Route::get('/login','AdminController@index');
Route::post('/admin_login_check','AdminController@admin_login_check');

/*
|--------------------------------------------------------------------------
| Admin Login End
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Admin Panel Maintain Start
|--------------------------------------------------------------------------
*/
Route::get('/dashboard','SuperAdminController@index');
Route::get('/logout','SuperAdminController@logout');
Route::get('/add_category','SuperAdminController@add_category');
Route::post('/save_category','SuperAdminController@save_category');
Route::get('/manage_category','SuperAdminController@manage_category');
Route::get('/unpublishedToPublished/{id}','SuperAdminController@unpublishedToPublished');
Route::get('/publishedToUnpublished/{id}','SuperAdminController@publishedToUnpublished');
Route::get('/delete_category/{id}','SuperAdminController@delete_category');
Route::get('/edit_category/{id}','SuperAdminController@edit_category');
Route::post('/update_category','SuperAdminController@update_category');
Route::get('/add_photo','SuperAdminController@add_photo');
Route::post('/save_photo','SuperAdminController@save_photo');
Route::get('/manage_photo','SuperAdminController@manage_photo');
Route::get('/unpublishedToPublishedphoto/{id}','SuperAdminController@unpublishedToPublishedphoto');
Route::get('/publishedToUnpublishedphoto/{id}','SuperAdminController@publishedToUnpublishedphoto');
Route::get('/delete_photo/{id}','SuperAdminController@delete_photo');
Route::get('/edit_photo/{id}','SuperAdminController@edit_photo');
Route::post('/save_edit_photo','SuperAdminController@save_edit_photo');
/*
|--------------------------------------------------------------------------
| Admin Panel Maintain End
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
|Front End Start
|--------------------------------------------------------------------------
*/

Route::get('/','PhotoGallaryController@index');
Route::get('/home','PhotoGallaryController@home');
Route::get('/gallery/{id}','PhotoGallaryController@gallery');
Route::get('/search','PhotoGallaryController@search');

/*
|--------------------------------------------------------------------------
|Front End End
|--------------------------------------------------------------------------
*/