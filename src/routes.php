<?php

Route::middleware(['web'])->group(function () {
    Route::get('lang/{lang}', 'Williems\LaravelLangSwitcher\LanguageController@swap');
});
