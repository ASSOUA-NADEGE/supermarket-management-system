<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('vendor/order/Index', [
            'orders' => fn () => Order::with('vendor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $attributes = $request->safe();

        /** @var Order $order */
        $order = Order::query()->create([
            'vendor_id' => auth()->user()->getAuthIdentifier()
        ]);

        collect($attributes['products'])->each(fn ($product) => $order->products()->attach($product['id'], ['quantity' => $product['quantity']]));

        return back()->with('flash', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $attributes = $request->safe();

        $products = collect($attributes['products']);

        $order
            ->products()
            ->syncWithPivotValues(
                $products->map(fn ($p) => $p['id'])->toArray(),
                $products->map(fn ($p) => $p['quantity'])->toArray()
            );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return back();
    }
}
