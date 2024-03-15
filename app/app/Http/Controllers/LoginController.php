<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login\StoreRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data=$request->validated();

        if (! Auth::attempt($data)) {
            return redirect()->back()->withErrors(['email' => 'Wrong email or password']);
        }

        return redirect()->route('login');

}
}
