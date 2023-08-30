<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductShowResource;
use App\Http\Requests\Product\ProductUpdateStatusRequest;

class ProductController extends Controller
{
    public function listAll()
    {
        return success(Product::get(['id', 'name', 'code']));
    }

    public function list() {
        return success(Product::listAdmin(listParams()));
    }

    public function create(ProductStoreRequest $request) {
        $item = Product::createAdmin($request);
        return success($item);
    }

    public function show($id) {
        $item = Product::find($id);
        if(!$item) {
            return fail('not found.');
        }
        return success(new ProductShowResource($item));
    }

    public function update($id, ProductUpdateRequest $request) {
        Product::updateAdmin($id, $request);
        return success();
    }

    public function delete($id) {
        $item = Product::find($id);
        if(!$item) {
            return fail('not found.');
        }

        $item->delete();
        return success();
    }

    public function status(ProductUpdateStatusRequest $request, $id)
    {
        $item = Product::find($id);

        if(!$item)
            return fail('Product not found.');

        $item->update($request->only('enable_status'));

        return success();
    }
}
