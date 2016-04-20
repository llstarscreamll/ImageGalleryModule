<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('imageGallery/uploadImage', [
    'as'    => 'imageGallery.uploadImage',
    'uses'    => 'llstarscreamll\ImageGalleryModule\app\Http\Controllers\ImageGalleryController@uploadImage'
    ]);
Route::delete('imageGallery/{image}/destroyImage', [
    'as'    => 'imageGallery.destroyImage',
    'uses'    => 'llstarscreamll\ImageGalleryModule\app\Http\Controllers\ImageGalleryController@destroyImage'
    ]);
Route::get('imageGallery/{imageGallery}/slide', [
    'as'    => 'imageGallery.slide',
    'uses'    => 'llstarscreamll\ImageGalleryModule\app\Http\Controllers\ImageGalleryController@slide'
    ]);
Route::resource('imageGallery', 'llstarscreamll\ImageGalleryModule\app\Http\Controllers\ImageGalleryController');
