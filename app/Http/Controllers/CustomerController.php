<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens/create-customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->customer_name = $request->name;
        $customer->save();

        return redirect()->to(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function getCustomers(Request $request)
    {
      
        if (isset($request->searchTerm) && !empty($request->searchTerm) && !ctype_space($request->searchTerm)) {
            $customers = Customer::where('customer_name', 'LIKE', '%' . $request->searchTerm . '%')->get();
        } else {
            $customers = Customer::all();
        }

        $response = [];

        foreach ($customers as $customer) {
            $response[] = array("id" => $customer->customer_id, "text" => $customer->customer_name);
        }

        return response()->json($response);
    }
}
