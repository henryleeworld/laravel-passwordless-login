<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Grosv\LaravelPasswordlessLogin\Models\User;
use Grosv\LaravelPasswordlessLogin\PasswordlessLogin;

class LoginController extends Controller
{
    /**
     * Send Login Link.
     *
     * @param Request $request
     * @param string  $id
     *
     * @return Response
     */
    public function sendLink(Request $request, $id)
    {
        return PasswordlessLogin::forUser(User::find($id))->generate();
    }
}
