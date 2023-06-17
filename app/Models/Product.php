<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'product_category',
        'product_price'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'sales_manager.products';
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sales_products');
    }
}
