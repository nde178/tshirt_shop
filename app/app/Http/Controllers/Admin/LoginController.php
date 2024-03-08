<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Login\LoginRequest;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('admin.login.index');
    }

    public function store(LoginRequest $loginRequest): RedirectResponse
    {
        $data = $loginRequest->validated();

        $data['admin'] = true;

        if (Auth::attempt($data)) {
            return redirect()->intended('admin');
        }

        return redirect()->back()->withInput()
            ->with('error', 'Неверный логин или пароль.');
    }
}
