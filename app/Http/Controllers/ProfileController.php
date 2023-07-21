<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $profile = null;

    public function index()
    {
        if (empty($this->profile)){
            $this->profile = Auth::user()->profile;
        }


        return view('main.profile', ['profile' => $this->profile]);
    }

}
