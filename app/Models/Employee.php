<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'employee_name'
    ];
    protected $primaryKey = 'employee_id';
    protected $table = 'sales_manager.employees';
}
