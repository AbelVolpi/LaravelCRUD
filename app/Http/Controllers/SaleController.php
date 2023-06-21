<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\SaleDetail;

class SaleController extends Controller
{

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

    public function create()
    {
        return view('screens/create-sale');
    }

    public function store(Request $request)
    {

        $sale = new Sale();
        $sale->employee_id = $request->employeeId;
        $sale->customer_id = $request->customerId;
        $sale->sale_date = $request->saleDate;
        $sale->save();

        $selectedProducts = $request->selectedProducts;

        foreach ($selectedProducts as $selectedProduct) {
            list($productId, $quantity) = explode(':', $selectedProduct);
            $sale->products()->attach($productId, ['quantity' => $quantity]);
        }

        return redirect()->to(route('index'));
    }

    public function show($id)
    {
        $sale = Sale::find($id);
        $saleDetail = $this->saleSaleDetailMapper($sale);

        return view('screens/sale-description', ['saleDetail' => $saleDetail]);
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $employees = Employee::all();
        $customers = Customer::all();
        $products = Product::all();

        return view('screens/edit-sale', ['sale' => $sale, 'employees' => $employees, 'customers' => $customers, 'products' => $products,]);
    }

    public function update(Request $request, $sale_id)
    {
        $sale = Sale::find($sale_id);
        $sale->employee_id = $request->employeeId;
        $sale->customer_id = $request->customerId;
        $sale->sale_date = $request->saleDate;
        $sale->save();

        $selectedProducts = json_decode($request->selectedProducts);

        // Remove todos os produtos existentes da venda antes de atualizá-los
        $sale->products()->detach();


        foreach ($selectedProducts as $selectedProduct) {
            list($productId, $quantity) = explode(':', $selectedProduct);
            $sale->products()->attach($productId, ['quantity' => $quantity]);
        }

        return redirect()->to(route('index'));
    }

    public function destroy($sale_id)
    {
        $sale = Sale::find($sale_id);
        $sale->products()->detach();
        $sale->delete();
        return redirect()->to(route('index'));
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
        $products = $sale->products()->get();
        $saleDetail->productsList = $products;

        //total value
        $total = 0;
        foreach ($products as $product) {
            $total += $product->product_price * $product->pivot->quantity;
        }

        $saleDetail->totalValue = $total;

        return $saleDetail;
    }
}