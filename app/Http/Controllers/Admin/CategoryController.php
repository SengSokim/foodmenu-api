<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\Category\CategoryShowResource;
use App\Http\Requests\Product\CategoryUpdateStatusRequest;

class CategoryController extends Controller
{
    public function listAll() {
        return success(Category::get(['id', 'name']));
    }

    public function list() {
        return success(Category::listAdmin(listParams()));
    }
    public function listWeb() {
        return success(Category::listWeb(listParams()));
    }

    public function create(CategoryStoreRequest $request) {
        $item = Category::createAdmin($request);
        return success();
    }

    public function show($id) {
        $item = Category::find($id);
        if(!$item) {
            return fail('Category not found.');
        }
        return success(new CategoryShowResource($item));
    }

    public function update($id, CategoryStoreRequest $request) {
        $item = Category::updateAdmin($id, $request);
        return success();
    }

    public function delete($id) {
        $item = Category::find($id);
        if(!$item) {
            return fail('Category not found.');
        }

        $item->delete();
        return success();
    }

    public function status(CategoryUpdateStatusRequest $request, $id)
    {
        $item = Category::find($id);

        if(!$item)
            return fail('Category not found.');

        $item->update($request->only('enable_status'));

        return success();
    }
}
