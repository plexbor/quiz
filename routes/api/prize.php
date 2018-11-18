<?php

Route::prefix('prize')->name('prize.')->group(function () {
    Route::get('list', 'PrizeController@list')->name('list');
    Route::post('create', 'PrizeController@create')->name('create');

    Route::post('{prize}/confirm', 'PrizeController@confirm')->name('confirm');
});
