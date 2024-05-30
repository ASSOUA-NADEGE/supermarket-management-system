<?php

namespace App\Http\Controllers;

use App\Actions\Order\DecrementOrderProductsStock;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Actions\Order\AttachCartProducts;
use Illuminate\Support\Facades\Pipeline;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        return Pipeline::send($order)
            ->through([
                AttachCartProducts::class,
                DecrementOrderProductsStock::class,
            ])
            ->thenReturn(back()->with('flash', 'Order created successfully!'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
