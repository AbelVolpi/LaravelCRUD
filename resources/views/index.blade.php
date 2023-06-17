@extends('layouts.main')

@section('title', 'Sales Manager')
   
@section('content')


@section('content')
    <div class="container">
        <h1>Listagem de Vendas</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->sale_id }}</td>
                        <td>{{ $sale->sale_date }}</td>
                        <td>{{ $sale->sale_value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@endsection