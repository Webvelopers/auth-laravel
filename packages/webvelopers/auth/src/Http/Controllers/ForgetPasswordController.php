<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function create()
    {
        return view('w-auth::auth.forget-password');
    }

    public function store(Request $request) {}
}
