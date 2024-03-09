<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::redirect('/', '/registration' );

Route::view('/registration', 'registration.index')->name('registration');


$user=User::query()->first();
