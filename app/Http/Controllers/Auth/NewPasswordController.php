<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    /**
     * Handle an incoming new password request.
     */
    public function store(NewPasswordRequest $request): JsonResponse
    {
        $payload = $request->only('token', 'email', 'password', 'password_confirmation');

        $status = Password::reset($payload, $this->changePassword($request));

        if ($status != Password::PASSWORD_RESET) {
            throw ValidationException::withMessages([
                'email' => [trans($status)],
            ]);
        }

        return response()->json(['status' => trans($status)]);
    }

    /**
     * Update the password for the given user.
     */
    private function changePassword(NewPasswordRequest $request): callable
    {
        return function ($user) use ($request) {
            $user->forceFill([
                'password' => $request->password,
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        };
    }
}
