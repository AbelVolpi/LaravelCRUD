@extends('layouts.main')

@section('title', 'Sale Details')

@section('content')
    <div class="container">
        <h1>Sale Details</h1>
        <p><strong>Employee Name:</strong> {{ $saleDetail->employeeName }}</p>
        <p><strong>Customer Name:</strong> {{ $saleDetail->customerName }}</p>
        <p><strong>Date of Sale:</strong> {{ $saleDetail->saleDate }}</p>
        <h2>Products:</h2>
        <ul>
            @foreach ($saleDetail->productsList as $product)
                <li>{{ $product->product_name }} | Qtd: {{ $product->pivot->quantity }}</li>
            @endforeach
        </ul>
        <p><strong>Total Value:</strong> {{ $saleDetail->totalValue }}</p>
    </div>
@endsection
