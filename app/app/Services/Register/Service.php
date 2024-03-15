<?php

namespace App\Services\Register;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function register($data)

    {

        $user=User::query()->create($data);
        event(new Registered($user));

    }
}
?>
