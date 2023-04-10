<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmPasswordRequest;
use Illuminate\Http\Response;

class ConfirmablePasswordController extends Controller
{
    /**
     * Confirm the user's password.
     */
    public function store(ConfirmPasswordRequest $request): Response
    {
        $request->session()->put('auth.password_confirmed_at', time());

        return response()->noContent();
    }
}
