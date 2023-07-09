<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthorizationController extends Controller
{

    public function login(): View
    {
        return view('auth.login');
    }

    public function authorization(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'numeric', 'exists:users,phone'],
            'password' => ['required', 'min:5'],
        ]);

        if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
            return redirect(route('login'))->withErrors(['phone' => 'The phone or password entered is incorrect', 'password' => ' ']);
        }
        return redirect(route('home'));
    }
}
