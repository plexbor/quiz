<?php

Route::get('user', 'UserController@edit')->name('user.edit');
Route::post('user', 'UserController@update')->name('user.update');
