<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AdminUserUpdatePasswordRequest;
use App\Http\Requests\User\Profile\AdminUserUpdateProfileRequest;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    public function get()
    {
        auth('users')->user()->load('media');

        return success(auth('users')->user()->only('id', 'name', 'gender', 'phone', 'address', 'media'));
    }

    public function update(AdminUserUpdateProfileRequest $request)
    {
        return success(User::updateProfile($request));
    }

    public function updatePassword(AdminUserUpdatePasswordRequest $request)
    {
        DB::BeginTransaction();

        if(!User::updatePassword($request)) {
            return fail(__('messages.invalid.old_password'));
        }

        DB::commit();
        return success();
    }

    public function loginResource()
    {
        return success(User::getToken(auth('users')->user()));
    }
}
