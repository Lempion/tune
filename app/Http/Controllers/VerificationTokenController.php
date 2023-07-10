<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class VerificationTokenController extends Controller
{

    static function createToken(int $minutes = 10)
    {
//        return cookie()->make('confirm_token', Hash::make(strtoupper(substr(md5(time()), 0, 6))), 10);
        return cookie()->make('confirm_token', Hash::make('password'), 10);
    }

    static function checkToken($token, $cookieToken)
    {
        return Hash::check($token, $cookieToken);
    }
}
