<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Http\Requests\Web\User\UpdateRequest;

use Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        Auth::user()->update($request->validated());

        return back();
    }
}
