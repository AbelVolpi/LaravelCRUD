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

 public static function rules(){
        return([
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
        ]);
    }


    public static function message(){
        return([
            'name.required' => 'Campo obrigatório',
            'category.required' => 'Campo obrigatório',
            'price.required' => 'Campo obrigatório',
            'name.string' => 'Campo precisa ser texto',
            'category.string' => 'Campo precisa ser texto',
            'price.numeric' => 'Campo precisa ser numérico'
        ]); 
    }

}
