<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateUser extends Command
{

    protected $signature = 'users:create';

    public function handle()
    {
        $user=new User();
        $user->name = $this->ask('Name:');
        $user->email = $this->ask('Email:');
        $user->password = $this->ask('password:');
        $user->save();

        $this->info('Пользователь создан');
    }
}
