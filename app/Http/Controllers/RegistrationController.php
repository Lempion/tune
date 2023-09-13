<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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

    public function registration(RegistrationRequest $request): JsonResponse
    {
        $user = new User();
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);

        // Логика по отправке кода на телефон

        return response()->json(['success' => ['link' => route('verification.index')]])->cookie(VerificationTokenController::createToken());
    }

}
