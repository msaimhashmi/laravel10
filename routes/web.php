<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/secure-password', function(){
    // Generate Secure Passwords
    // You'll find a new password() method on the Str class. This method - which can be adjusted to your preferred criteria - will generate a secure password for you.
    // Examples
    echo 'random passowrd = '.str()->password();
    echo '<br>';
    echo 'limit passowrd = '.str()->password(10);
    echo '<br>';
    echo 'without integere passowrd = '.str()->password(10, numbers: false);
    echo '<br>';
    echo 'without symbols passowrd = '.str()->password(10, symbols: false);
});