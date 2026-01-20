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
}
