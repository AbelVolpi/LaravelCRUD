<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'sale_id',
        'employee_id',
        'custumer_id',
        'sale_date',
        'sale_value'
    ];
    protected $primaryKey = 'sale_id';
    protected $table = 'sales_manager.sales';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sales_products');
    }

}
