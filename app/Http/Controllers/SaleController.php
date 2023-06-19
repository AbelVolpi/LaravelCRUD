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

        foreach ($sales as $sale) {
            $saleDetail = $this->saleSaleDetailMapper($sale);
            array_push($saleDetailList, $saleDetail);
        }

        return view('screens/index', ['saleDetailList' => $saleDetailList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens/create-sale');
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
    public function show($id)
    {
        $sale = Sale::find($id);
        $saleDetail = $this->saleSaleDetailMapper($sale);

        return view('screens/sale-description', ['saleDetail' => $saleDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        $products = $sale->products();

        return view('screens/edit-item', ['sale' => $sale, 'products' => $products]);
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

    private function saleSaleDetailMapper(Sale $sale)
    {
        $saleDetail = new SaleDetail();

        // sale id
        $saleDetail->sale_id = $sale->getAttribute('sale_id');

        // name of employee who sold
        // método load faz o carregamento do relacionamento de 'customer'
        $sale->load('employee');
        $saleDetail->employeeName = $sale->employee->employee_name;

        // custumer name
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

        return $saleDetail;
    }
}