<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{

    public function index()
    {
        $phone = Auth::user()->phone;

        // Запилить проверку на то что код уже был выслан юзеру

        if (($errors = Session::get('errors')) !== null && $errors->getBag('default')->has('verif_phone')) {
            $token = VerificationTokenController::createToken();
            return response(view('auth.verification', compact('phone')))->withCookie($token);
        }

        return view('auth.verification', compact('phone'));
    }

    public function verification(Request $request): JsonResponse
    {
        $request->validate([
            'confirm_code' => 'required',
        ]);

        $token = Cookie::get('confirm_token');

        if (empty($token)) {
            return response()->json(['errors' => ['confirm_code' => ['The code is no longer valid.']]], 422);
        }

        if (!VerificationTokenController::checkToken($request->confirm_code, $token)) {
            return response()->json(['errors' => ['confirm_code' => ['Code entered incorrectly']]], 422);
        }

        $user = Auth::user();
        $user->phone_verified_at = date('H:i:s');
        $user->save();

        return response()->json(['success' => ['link' => route('questionnaires')]]);
    }

    public function sendNewCode(): JsonResponse
    {

        if (Cookie::get('sms_send') !== null) {
            return response()->json(['errors' => ['confirm_code' => ['Unable to request a new code']]], 422);
        }

        $timer = cookie()->make('sms_send', 1, 5);

        // Логика по отправке кода на телефон

        $token = VerificationTokenController::createToken();

        return response()->json(['success' => Cookie::get('sms_send')])->cookie($token)->cookie($timer);
    }
}
