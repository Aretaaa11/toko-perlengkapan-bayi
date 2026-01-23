<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'foto',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori_id',
    ];

    /**
     * Get the category that owns the product.
     */
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    /**
     * Get the order products for this product.
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get the orders that contain this product.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
}
