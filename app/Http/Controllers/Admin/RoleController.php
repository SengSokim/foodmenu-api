<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Http\Resources\Role\RoleShowResource;
use Illuminate\Http\Request;
use App\Models\Role;
use DB;

class RoleController extends Controller
{
    public function listAll() 
    {
        return success(Role::get(['id', 'name']));
    }

    public function list() 
    {
        return success(Role::listAdmin(listParams()));
    }

    public function create(RoleStoreRequest $request) 
    {
        Role::createAdmin($request);

        return success();
    }

    public function show($id) 
    {
        $role = Role::find($id);

        if(!$role) {
            fail('Role not found!');
        }

        return success(new RoleShowResource($role));
    }
    
    public function update(RoleUpdateRequest $request, $id)
    {
        Role::updateAdmin($request, $id);

        return success();
    }

    public function delete($id) 
    {
		$role = Role::find($id);

        if(!$role) {
            return fail('Role not found!');
        }
        
		$role->delete();

        return success();
    }
}
