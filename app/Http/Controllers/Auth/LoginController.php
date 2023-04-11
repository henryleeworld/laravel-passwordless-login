<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Grosv\LaravelPasswordlessLogin\Models\User;
use Grosv\LaravelPasswordlessLogin\PasswordlessLogin;
use Illuminate\Http\Request;

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
