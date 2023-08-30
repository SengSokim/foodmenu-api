<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminUserStoreRequest;
use App\Http\Requests\User\AdminUserUpdateRequest;
use App\Http\Requests\User\AdminUserUpdatePasswordRequest;
use App\Http\Resources\User\AdminUserResource;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function list_all()
    {
        return success(User::get(['id', 'name']));
    }
	
	public function list()
	{
		return success(User::listAdmin(listParams()));
	}

	public function show($id)
	{
		$item = User::find($id);

		if(!$item) {
			return fail('User not found.');
		}

		return success(new AdminUserResource($item));
	}

	public function create(AdminUserStoreRequest $request)
	{
        $item = User::createAdmin($request);

		return success([
            'id' => $item->id
        ]);
	}

	public function update(AdminUserUpdateRequest $request)
	{
		User::updateAdmin($request);

		return success();
	}

	public function updatePassword(AdminUserUpdatePasswordRequest $request, $id) 
	{
		DB::BeginTransaction();
		$user = User::find($id);
		
        $user->update([
			'password' => $request->password
		]);

        DB::commit();
        return success();
	}

	public function delete($id)
	{
		$item = User::find($id);

		if(!$item) {
			return fail('User not found.');
		}

		$item->delete();

		return success();
	}
}
