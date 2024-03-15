<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\StoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegitrationController extends BaseController
{
  public function store(StoreRequest $request)
  {
    $data=$request->validated();

    $this->service->register($data);

    return redirect()->route('registration');

    }
}
