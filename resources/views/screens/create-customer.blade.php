@extends('layouts.main')

@section('title', 'Create Customer')

@section('content')
    <div class="container">
        <h1>Create Customer</h1>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
