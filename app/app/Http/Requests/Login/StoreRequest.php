<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //rules for user model
            'email' => ['required', 'string', 'email', 'max:255'], #'exist:users' - проверка существования email
            'password' => ['required', 'string', 'min:3'],
        ];
    }
}
