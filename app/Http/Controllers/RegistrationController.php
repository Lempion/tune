<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{

    public function register(): View
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'digits:11', 'unique:users,phone'],
            'password' => ['required', 'confirmed', 'min:5', 'max:30'],
        ]);

        $user = new User();
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);

        // Логика по отправке кода на телефон

        return response()->json(['success' => ['link' => route('verification.index')]])->cookie(VerificationTokenController::createToken());
    }

}
