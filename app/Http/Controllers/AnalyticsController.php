<?php

namespace App\Http\Controllers;

use App\Models\ClickAnalytic;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    /**
     * Record a click event from front-end marketplace buttons.
     */
    public function recordClick(Request $request): JsonResponse
    {
        try {
            $platformInput = $request->input('platform') ?? $request->json('platform', 'other');
            $rawPlatform = strtolower(trim((string) $platformInput));
            $platform = in_array($rawPlatform, ['shopee', 'tiktok', 'whatsapp']) ? $rawPlatform : 'other';

            $productIdInput = $request->input('product_id') ?? $request->json('product_id');
            if ($productIdInput !== null && is_numeric($productIdInput)) {
                $productId = (int) $productIdInput;
                if (!Product::where('id', $productId)->exists()) {
                    $productId = null;
                }
            } else {
                $productId = null;
            }

            $productNameInput = $request->input('product_name') ?? $request->json('product_name', 'General');
            $productName = trim((string) $productNameInput) ?: 'General';

            $buttonLocationInput = $request->input('button_location') ?? $request->json('button_location', 'General');
            $buttonLocation = trim((string) $buttonLocationInput) ?: 'General';

            $click = ClickAnalytic::create([
                'platform'        => $platform,
                'product_id'      => $productId,
                'product_name'    => substr($productName, 0, 255),
                'button_location' => substr($buttonLocation, 0, 255),
                'ip_address'      => $request->ip() ?: '127.0.0.1',
                'user_agent'      => substr((string) $request->userAgent(), 0, 500),
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Click tracked successfully',
                'id'      => $click->id,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 200);
        }
    }

    /**
     * Display the Admin Analytics & Click Tracker Dashboard.
     */
    public function index(): View
    {
        $today = now()->startOfDay();

        // Summary Metric Counters
        $totalClicks   = ClickAnalytic::count();
        $clicksToday   = ClickAnalytic::where('created_at', '>=', $today)->count();

        $shopeeTotal   = ClickAnalytic::where('platform', 'shopee')->count();
        $shopeeToday   = ClickAnalytic::where('platform', 'shopee')->where('created_at', '>=', $today)->count();

        $tiktokTotal   = ClickAnalytic::where('platform', 'tiktok')->count();
        $tiktokToday   = ClickAnalytic::where('platform', 'tiktok')->where('created_at', '>=', $today)->count();

        $waTotal       = ClickAnalytic::where('platform', 'whatsapp')->count();
        $waToday       = ClickAnalytic::where('platform', 'whatsapp')->where('created_at', '>=', $today)->count();

        // Breakdown by Platform
        $platformBreakdown = ClickAnalytic::select('platform', DB::raw('count(*) as total'))
            ->groupBy('platform')
            ->orderByDesc('total')
            ->get();

        // Breakdown by Location
        $locationBreakdown = ClickAnalytic::select('button_location', DB::raw('count(*) as total'))
            ->groupBy('button_location')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        // Top Clicked Products Leaderboard
        $topProducts = ClickAnalytic::select('product_name', 'product_id', DB::raw('count(*) as total'))
            ->whereNotNull('product_name')
            ->groupBy('product_name', 'product_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Recent Click Logs (Pagination)
        $recentClicks = ClickAnalytic::with('product')
            ->latest()
            ->paginate(15);

        return view('admin.analytics.index', compact(
            'totalClicks',
            'clicksToday',
            'shopeeTotal',
            'shopeeToday',
            'tiktokTotal',
            'tiktokToday',
            'waTotal',
            'waToday',
            'platformBreakdown',
            'locationBreakdown',
            'topProducts',
            'recentClicks'
        ));
    }
}
