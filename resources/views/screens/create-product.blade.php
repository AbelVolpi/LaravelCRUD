@extends('layouts.main')

@section('title', 'Create Product')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <input type="text" name="category" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
