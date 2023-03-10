<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function update(User $user , ProfileRequest $request)
    {
        $email = $request->email ?: Auth::user()->email;
        $password = Hash::make($request->password)?: Auth::user()->password;

        $user->update([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        return redirect()->back();
        // return dump(Auth::user()->password);
    }
}
