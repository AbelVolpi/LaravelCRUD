<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'sales_manager.customers';
    public $timestamps = true;
    
}
