<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Process;
use Illuminate\Process\Pool;

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


// NEW PROCESS FACADE

/* This facade, built on top of Symfony's excellent Process component, allows you to easily invoke and execute shell commands, 
 and even run them asynchronously in the background. */

Route::get('/process-facade', function(){
    $result = Process::run('ls -la')->output();
    return $result->output();
});

Route::get('/process-facade-fake', function(){
    // all process would be fake by using this
    Process::fake();

    // we can fake only scpecific process by using this 
    // Process::fake(['git log' => 'a git log is fake']);
    
    Process::run('git log');
    Process::run('ls -la');
});


Route::get('/process-facade-pool', function(){
    [$first, $second, $third] = Process::concurrently(function (Pool $pool) {
        $pool->command('cat first.txt');
        $pool->command('cat second.txt');
        $pool->command('cat third.txt');
    });
     
    return $first->output();
});