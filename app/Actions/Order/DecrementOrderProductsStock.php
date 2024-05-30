<?php

namespace App\Actions\Order;

use App\Models\Order;
use Closure;

class DecrementOrderProductsStock
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
     */
    public function handle(Order $order, Closure $next)
    {
        $order->products->each(fn ($product) => $product->decrement('stock', $product->pivot->quantity));

        $next($order);
    }
}
