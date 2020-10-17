<?php

use Illuminate\Foundation\Inspiring;
use App\User;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('test1', function () {
    #dd(111);
    $tables = DB::select('SHOW TABLES');
    dd($tables);
});

Artisan::command('create_user', function () {
    User::forceCreate([
        'name' => "miyuki",
        'email' => "imymy130@gmail.com",
        'password' => bcrypt('miyuki130'),
    ]);
});

Artisan::command('create_user_nakagawa', function () {
    User::forceCreate([
        'name' => "nakagawa",
        'email' => "nakagawa@example.com",
        'password' => bcrypt('nakagawa1234'),
    ]);
});


