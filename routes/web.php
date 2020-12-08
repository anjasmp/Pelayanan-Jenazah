<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/', 'HomepageController@index');

// Route::get('/donation', 'DonationController@create')->name('donation.create');
// Route::get('/donation/list', 'DonationController@index')->name('donation.list');


Route::get('/postlist', 'HomepageController@list_post')->name('post.list');

Route::get('/post/{slug}', 'HomepageController@detail_post')->name('post.detail');

Route::get('/categorylist/{category}', 'HomepageController@list_category')->name('post.category');

Route::get('/tagslist/{tags}', 'HomepageController@list_tags')->name('post.tags');

Route::get('/search', 'HomepageController@search')->name('post.search');

Route::get('/donationlist', 'HomepageController@list_donation')->name('donation.list');

Route::get('/donationdetail/{slug}', 'DetailDonationController@index')->name('donation.detail');



Route::post('/donationcheckout/{id}', 'CheckoutController@process')
->name('donation.checkout-process');

Route::get('/donationcheckout/{id}', 'CheckoutController@index')
->name('donation.checkout');

Route::post('/donationcheckout/create/{detail_id}', 'CheckoutController@create')
->name('donation.checkout-success');

Route::get('/donationcheckout/confirm/{id}', 'CheckoutController@success')
->name('donation.checkout-success');


Route::get('/lazhaq', 'LazhaqController@index')
->name('lazhaq.index');

Route::get('/qurban', 'QurbanController@index')
->name('qurban.index');



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/profil/sejarah', 'ProfilController@sejarah')
->name('profil.sejarah');

Route::get('/profil/struktur', 'ProfilController@struktur')
->name('profil.struktur');

Route::get('/profil/proker', 'ProfilController@proker')
->name('profil.proker');

Route::get('/profil/struktur-operasional', 'ProfilController@struktur_opera')
->name('profil.struktur_opera');


Route::get('/result', 'JadwalSholatController@result')->name('result');


Route::resource('upj', 'UpjController');

