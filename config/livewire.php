<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    | Tell Livewire where to auto-discover your components
    */
    'class_namespace' => 'App\\Blocks', // matches your Hero.php namespace
    'class_path'      => app_path('Blocks'), // points to frontend/app/Blocks

    'view_path'       => resource_path('views/blocks'), // points to frontend/resources/views/blocks
];