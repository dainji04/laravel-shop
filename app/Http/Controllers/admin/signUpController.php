<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\User;

class signUpController extends Controller
{
    public function index(): View
    {
        return view('signUp');
    }
    public function register(Request $request)
    {
        // dd($request->input());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect('/');
    }
}
