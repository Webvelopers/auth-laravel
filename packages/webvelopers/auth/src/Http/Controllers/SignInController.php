<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function create()
    {
        return view('webvelopers-auth::auth.sign-in');
    }

    public function store(Request $request) {}
}
