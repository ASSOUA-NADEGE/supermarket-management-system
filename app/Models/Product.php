<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([\App\Observers\ProductObserver::class])]
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function image(): Attribute
    // {
    //     return new Attribute(get: fn ($value) => '/storage/' . $value);
    // }
}
