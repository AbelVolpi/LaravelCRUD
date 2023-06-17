<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer extends Model
{
    protected $fillable = [
        'custumer_id',
        'custumer_name'
    ];
    protected $primaryKey = 'custumer_id';
    protected $table = 'sales_manager.custumers';
    public $timestamps = true;
    
}
