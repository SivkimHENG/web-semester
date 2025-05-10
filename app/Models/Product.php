<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'image',
        'is_out',
        'description',
        'category_id',
    ];

    protected $casts = [
        'product_name' => 'string',
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'is_out' => 'boolean',
        'description' => 'string',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
