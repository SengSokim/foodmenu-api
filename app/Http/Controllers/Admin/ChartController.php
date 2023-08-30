<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function dailyOrder($year, $month)
    {
        $daysInMonth = Carbon::parse($year . '-' . $month)->daysInMonth;
        $total = array_fill(0, $daysInMonth, 0);

        Order::selectRaw('DATE_FORMAT(created_at, "%d") as date, SUM(total) as total')
            // ->where('status', 'confirmed')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('date')
            ->get()
            ->map(function ($item) use (&$total) {
                $total[$item->date - 1] = floatval($item->total);
            });

        return success([
            'total' => $total
        ]);
    }

    public function monthlyOrder($year)
    {
        $grand_total = array_fill(0, 12, 0);
        Order::selectRaw('MONTH(orders.created_at) as month, SUM(total) as grand_total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->get()
            ->map(function($item) use(&$grand_total) {
                $grand_total[$item->month - 1] = floatval($item->grand_total);
            });

        return success([
            'total' => $grand_total,
        ]);
    }
}
