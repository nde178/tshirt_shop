<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/registration' );

Route::view('/registration', 'registration.index')->name('registration');


