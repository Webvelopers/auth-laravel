<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function create()
    {
        return view('webvelopers-auth::auth.sign-up');
    }

    public function store(Request $request) {}
}
