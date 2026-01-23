<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard dengan statistik
     */
    public function index()
    {
        $statistics = $this->getStatistics();
        return view('dashboard', $statistics);
    }

    /**
     * Mengambil semua statistik dashboard
     */
    public function getStatistics()
    {
        return [
            'totalProductsSold' => $this->getTotalProductsSold(),
            'totalRevenue' => $this->getTotalRevenue(),
            'orderStats' => $this->getOrderStats(),
            'recentOrders' => $this->getRecentOrders(),
            'topProducts' => $this->getTopProducts(),
        ];
    }

    /**
     * Menghitung total jumlah produk terjual
     */
    public function getTotalProductsSold()
    {
        return OrderProduct::sum('jumlah') ?? 0;
    }

    /**
     * Menghitung total pendapatan dari semua order
     */
    public function getTotalRevenue()
    {
        return Order::sum('total') ?? 0;
    }

    /**
     * Mendapatkan statistik status pesanan
     * Mengembalikan jumlah order berdasarkan status pembayaran
     */
    public function getOrderStats()
    {
        $stats = Order::select('status_pembayaran', DB::raw('count(*) as count'))
            ->groupBy('status_pembayaran')
            ->get()
            ->keyBy('status_pembayaran')
            ->map(function ($item) {
                return $item->count;
            })
            ->toArray();

        // Pastikan semua status ada dalam array
        return [
            'pending' => $stats['pending'] ?? 0,
            'confirmed' => $stats['confirmed'] ?? 0,
            'completed' => $stats['completed'] ?? 0,
            'cancelled' => $stats['cancelled'] ?? 0,
        ];
    }

    /**
     * Mendapatkan order terbaru (5 order terakhir)
     */
    public function getRecentOrders()
    {
        return Order::with(['user', 'products'])
            ->latest()
            ->limit(5)
            ->get();
    }

    /**
     * Mendapatkan produk terlaris (top 5)
     */
    public function getTopProducts()
    {
        return OrderProduct::select('product_id', DB::raw('SUM(jumlah) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->with('product')
            ->get()
            ->map(function ($item) {
                $item->product->total_sold = $item->total_sold;
                return $item->product;
            });
    }

    /**
     * Mendapatkan statistik revenue per bulan
     */
    public function getMonthlyRevenue()
    {
        return Order::select(
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('YEAR(tanggal) as year'),
            DB::raw('sum(total) as total')
        )
        ->groupBy(DB::raw('YEAR(tanggal), MONTH(tanggal)'))
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->limit(12)
        ->get();
    }

    /**
     * Mendapatkan statistik ringkas untuk card di dashboard
     */
    public function getSummaryStats()
    {
        return [
            'total_orders' => Order::count(),
            'total_products_sold' => $this->getTotalProductsSold(),
            'total_revenue' => $this->getTotalRevenue(),
            'pending_orders' => Order::where('status_pembayaran', 'pending')->count(),
            'confirmed_orders' => Order::where('status_pembayaran', 'confirmed')->count(),
            'completed_orders' => Order::where('status_pembayaran', 'completed')->count(),
            'cancelled_orders' => Order::where('status_pembayaran', 'cancelled')->count(),
        ];
    }
}
