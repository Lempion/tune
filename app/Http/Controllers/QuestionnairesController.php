<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionnairesController extends Controller
{

    public function index(): View
    {
        return view('main.home');
    }
}
