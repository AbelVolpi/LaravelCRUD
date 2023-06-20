<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('screens/create-product');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->name;
        $product->product_category = $request->category;
        $product->product_price = $request->price;
        $product->save();

        return redirect()->to(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getProducts(Request $request)
    {
      
        if (isset($request->searchTerm) && !empty($request->searchTerm) && !ctype_space($request->searchTerm)) {
            $products = Product::where('product_name', 'LIKE', '%' . $request->searchTerm . '%')->get();
        } else {
            $products = Product::all();
        }

        $response = [];

        foreach ($products as $product) {
            $response[] = array("id" => $product->product_id, "text" => $product->product_name);
        }

        return response()->json($response);
    }
}
