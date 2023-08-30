<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return success([
            'count_all_category' => Category::count(),
            'count_all_products' => Product::count(),
            'count_all_orders' => Order::count(),
            'count_pending_orders' => Order::where('status', 'pending')->count()
        ]);
    }
}
