<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// TODO use this model to show index view
class SaleDetail
{
    public $sale_id;
    public $employeeName;
    public $customerName;
    public $saleDate;
    public $productsNameList = [];
    public $totalValue;

}