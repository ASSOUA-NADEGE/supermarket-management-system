<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    protected $appends = ['total'];

    protected function casts()
    {
        return [
            'status' => OrderStatus::class
        ];
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function total(): Attribute
    {
        return new Attribute(
            get: fn () => $this
                ->products
                ->reduce(
                    fn ($sum, $product) => $sum + ($product->pivot->quantity * $product->price),
                    0
                )
        );
    }
}
