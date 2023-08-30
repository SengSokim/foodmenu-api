<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserVerifyCodes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\AdminLoginRequest;
use App\Http\Requests\User\Auth\AdminForgotPasswordVerifyRequest;

class AuthController extends Controller
{
    public function login(AdminLoginRequest $request)
    {
        $auth = User::login($request);

        if (!$auth) {
            return fail('Invalid Email or Password.');
        }

        return success($auth);
    }

    public function logout()
    {
        return success();
    }

    public function forgotPassword(Request $request)
    {
        DB::beginTransaction();
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return fail('Invalid email address.');
        }

        $response = UserVerifyCodes::generateForgetCode($user);

        DB::commit();

        return success([
            'code' => app()->environment() != 'production' ? optional($response)->code : null
        ]);
    }

    public function verify(AdminForgotPasswordVerifyRequest $request)
    {
        DB::beginTransaction();

        $token = UserVerifyCodes::verifyCode($request->email, $request->code);
        if (!$token) {
            return fail(__('messages.invalid.verify_code'));
        }

        DB::commit();
        return success([
            'token' => $token
        ]);
    }

    public function forgotPasswordReset(Request $request)
    {
        DB::beginTransaction();
        if (!UserVerifyCodes::verifyForgetToken($request->token, $request->email)) {
            return fail(__('messages.can_not.reset_password'));
        }

        $user = User::active()->where('email', $request->email)->first();

        if (!$user) {
            return fail(__('messages.can_not.reset_password'));
        }

        $user->update([
            'password' => $request->password
        ]);

        DB::commit();

        return success(__('messages.reset_password_successfully'));
    }
}
