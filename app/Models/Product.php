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
        'is_out',
        'description',
        'category_id',
    ];

    protected $casts = [
        'product_name' => 'string',
        'quantity' => 'integer',
        'price' => 'decimal',
        'is_out' => 'boolean',
        'description' => 'string',
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
