<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'price',
        'path_img',
        'description',
        'stock',
        'status',
        'category_id',
    ];
    public $timestamps = true;

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategories::class, 'category_id', 'id');
    }
}
