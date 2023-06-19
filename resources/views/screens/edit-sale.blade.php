@extends('layouts.main')

@section('title', 'Editar Venda')

@section('content')
    <div class="container">
        <h1>Edit Sale</h1>
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="employee_id">ID do Funcionário</label>
                <input type="text" name="employee_id" id="employee_id" value="{{ $sale->employee_id }}">
            </div>

            <div class="form-group">
                <label for="customer_id">ID do Cliente</label>
                <input type="text" name="customer_id" id="customer_id" value="{{ $sale->customer_id }}">
            </div>

            <div class="form-group">
                <label for="sale_date">Data da Venda</label>
                <input type="text" name="sale_date" id="sale_date" value="{{ $sale->sale_date }}">
            </div>

            <div class="form-group">
                <label for="sale_value">Valor da Venda</label>
                <input type="text" name="sale_value" id="sale_value" value="{{ $sale->sale_value }}">
            </div>

            <button type="submit">Salvar</button>
        </form>
    </div>
@endsection
