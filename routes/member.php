<?php

Route::get('/', 'Member\PelayananController@home')->name('pelayanan.home');

Route::resource('pelayanan', 'Member\PelayananController');



Route::resource('anggota', 'Member\AnggotaController');

Route::resource('profilmember', 'Member\ProfilMemberController');