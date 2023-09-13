<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthorizationController extends Controller
{

    public function login(): View
    {
        return view('auth.login');
    }

    public function authorization(AuthorizationRequest $request): RedirectResponse
    {
        if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
            return redirect(route('login'))->withErrors(['phone' => 'The phone or password entered is incorrect']);
        }
        return redirect(route('questionnaires'));
    }
}
