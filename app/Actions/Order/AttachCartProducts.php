<?php

namespace App\Actions\Order;

use App\Models\Order;
use Closure;

class AttachCartProducts
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
        collect(request('cart'))
            ->each(fn ($product) => $order->products()->attach($product['id'], ['quantity' => $product['quantity']]));

        $next($order);
    }
}
