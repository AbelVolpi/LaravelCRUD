@extends('layouts.main')

@section('title', 'Sales Manager')

@section('content')


@section('content')
    <div class="container">
        <h1>Listagem de Vendas</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Customer Name</th>
                    <th>Date of Sale</th>
                    <th>Products</th>
                    <th>Total Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saleDetailList as $saleDetail)
                    <tr>
                        <td>{{ $saleDetail->employeeName }}</td>
                        <td>{{ $saleDetail->customerName }}</td>
                        <td>{{ $saleDetail->saleDate }}</td>
                        <td>
                            <ul>
                                @foreach ($saleDetail->productsNameList as $productName)
                                    <li>{{ $productName }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $saleDetail->totalValue }}</td>
                        <td>
                            <a href="" class="info-icon">
                                <img src="{{ asset('icons/info.svg') }}" alt="Info Icon" height="20">
                            </a>
                            <a href="" class="edit-icon">
                                <img src="{{ asset('icons/edit.svg') }}" alt="Edit Icon" height="20">
                            </a>
                            <a href="" class="delete-icon">
                                <img src="{{ asset('icons/delete.svg') }}" alt="Delete Icon" height="20">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@endsection
