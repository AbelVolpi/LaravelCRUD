<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\SaleDetail;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        $saleDetailList = array();
        $employeeController = new EmployeeController();

        foreach ($sales as $sale) {
            $saleDetail = new SaleDetail();

            // sale id
            $saleDetail->sale_id = $sale->getAttribute('sale_id');

            // name of employee who sold
            $employeeId = $sale->getAttribute('employee_id');
            $employeeRegister = $employeeController->getEmployeeById($employeeId);
            $employeeName = $employeeRegister->getAttribute('employee_name');
            $saleDetail->employeeName = $employeeName;

            //custumer name
            // método load faz o carregamento do relacionamento de 'customer'
            $sale->load('customer');
            $saleDetail->customerName = $sale->customer->customer_name;
            
            // sale date
            $saleDetail->saleDate = $sale->getAttribute('sale_date');

            // products name
            $products = $sale->products();
            $saleDetail->productsNameList = $products->pluck('product_name')->all();

            //total value
            $saleDetail->totalValue = $products->sum('product_price');

            array_push($saleDetailList, $saleDetail);
        }
        $products = $sales[0]->products()->get();

        return view('index', ['saleDetailList' => $saleDetailList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}