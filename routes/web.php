<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome'); // resources/views/blocks/hero.blade.php
});

