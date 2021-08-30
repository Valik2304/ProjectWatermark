<?php

namespace App\Http\Controllers\UserCabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        return view('user-cabinet.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            //            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'phone'             => 'required|string|min:3|max:20',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (!$request->filled('password')) {
            $user->fill($input)->save();

            return back()->with('success', __('voyager.generic.successfully_updated'));
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();

        return back()->with('success', __('voyager.generic.successfully_updated'));
    }

}
