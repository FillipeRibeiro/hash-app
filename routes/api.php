<?php

use Illuminate\Support\Facades\Route;

Route::get('/hash/{inputText}', 'HashController@generateHash');
