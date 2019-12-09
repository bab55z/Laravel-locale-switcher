<?php

Route::middleware(['web'])->group(function () {
    Route::get('lang/{lang}', 'Bab55z\LaravelLocaleSwitcher\LanguageController@swap');
});
