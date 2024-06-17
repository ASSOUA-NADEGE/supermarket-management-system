<?php

namespace App\Actions\Order;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class GetYearlySales
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Invoke the class instance.
     *
     * @param Builder        $query         The orders query
     * @param Closure(): void $next
     */
    public function __invoke(Builder $query, Closure $next)
    {
        $query = $query
            ->with('products')
            ->whereDate('created_at', '>=', now()->subMonths(12))
            ->get()
            ->groupBy(
                fn ($product) => Carbon::parse($product->created_at)->format('Y-m')
            )
            ->map(
                fn ($orders) => $orders->reduce(fn ($acc, $order) => $acc + $order->products->sum('price'),
                0
            ));

        return $next($query);
    }
}
