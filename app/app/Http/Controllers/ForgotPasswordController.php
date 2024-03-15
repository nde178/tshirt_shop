<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Forgotpassword\StoreRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(StoreRequest $request)
    {
        $data=$request->validated();

        $status = Password::sendResetLink($data);

        if ($status == Password::RESET_LINK_SENT) {
            return [
                'message' => trans($status),
                'status' => __('$status'),
            ];
        }
       throw ValidationException::withMessages([
           'email' => [trans($status)],
       ]);
    }
}

