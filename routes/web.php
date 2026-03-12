<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome'); // resources/views/blocks/hero.blade.php
});

Route::get('/hi', function () {
    return 'Hello from Acorn!';
});

Route::get('/test-hero', function () {
    return \Livewire\Livewire::mount('hero')->html();
});