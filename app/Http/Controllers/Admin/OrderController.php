<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatusHistory;
use App\Http\Requests\AdminOrder\OrderStoreOrModifiedRequest;
use App\Http\Resources\AdminOrder\OrderShowResource;
use App\Http\Resources\AdminOrder\OrderViewDetailResource;
use App\Models\OrderPriceHistory;
use App\Http\Requests\AdminOrder\OrderStatusRequest;
use DB;

class OrderController extends Controller
{
    public function list()
    {
        return success(Order::listAdmin(listParams()));
    }

    public function create(OrderStoreOrModifiedRequest $request)
    {
        $item = Order::createWeb($request);
        return success(['id' => $item->id]);
    }

    public function show($id)
    {
        $item = Order::find($id);

        if (!$item) {
            return fail('Order not found.');
        }

        return success(new OrderShowResource($item));
    }

    public function update($id, OrderStoreOrModifiedRequest $request)
    {
        $item = Order::updateAdmin($id, $request);

        return success(['id' => $item->id]);
    }

    public function delete($id)
    {
        $item = Order::find($id);
        if (!$item) {
            return fail('Order not found.');
        }

        $item->delete();
        return success();
    }

    public function status(OrderStatusRequest $request, $id)
    {
        DB::beginTransaction();
        $order = Order::find($id);
        if (is_null($order)) {
            return fail("Order not found!'");
        }

        $order->update([
            'status' => request('status')
        ]);

        DB::commit();

        return success();
    }

    public function viewDetail($id)
    {
        $item = Order::find($id);
        if (!$item) {
            return fail('Order not found.');
        }
        return success(new OrderViewDetailResource($item));
    }

    public function updateTotalOrder($id)
    {
        DB::beginTransaction();
        $order = Order::find($id);
        if (is_null($order)) {
            return fail("Order not found!'");
        }

        $order->update([
            'total' => request('total')
        ]);

        DB::commit();

        return success();
    }

    public function removeProduct($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return fail('Order not found.');
        }

        $order->products()->detach(request('product_id'));

        // $order->update([
        //     'total' => $order->total - $order->
        // ]);

        // $order->total -= $order->products->total;

        return success([
            'id' => $order->id
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $item = Order::find($id);

        if(!$item) {
            return false;
        }

        $data = $request->only('status');
        $item->update($data);

        return success($item);
    }
}
