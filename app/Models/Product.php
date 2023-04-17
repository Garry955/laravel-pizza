<?php

namespace App\Models;

use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price', 'image'];

    protected $casts = ['created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class, 'product_id');
    }
}
