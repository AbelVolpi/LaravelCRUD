@extends('layouts.main')

@section('title', 'Sales Manager')

@section('content')

@section('content')
    <div class="container">
        <h1>Sales List</h1>
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
                                @foreach ($saleDetail->productsList as $product)
                                    <li>{{ $product->product_name }} | Qtd: {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $saleDetail->totalValue }}</td>
                        <td>
                            <a href="/sales/{{ $saleDetail->sale_id }}" class="info-icon">
                                <img src="{{ asset('icons/info.svg') }}" alt="Info Icon" height="20">
                            </a>
                            <a href="{{ route('sales.edit', ['sale_id' => $saleDetail->sale_id]) }}" class="edit-icon">
                                <img src="{{ asset('icons/edit.svg') }}" alt="Edit Icon" height="20">
                            </a>
                            <span class="delete-icon" id="deleteIcon" data-id="{{ $saleDetail->sale_id }}">
                                <img src="{{ asset('icons/delete.svg') }}" alt="Delete Icon" height="20">
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sale delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want delete this sale??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" id="btnYes" name="btnYes" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".delete-icon", function() {
            var id = $(this).data('id');
            $("#btnYes").attr('data-id', id); // Adicione o ID como atributo ao botão "Sim"
            $('#exampleModal').modal('show'); // Abre o modal de exclusão
        });

        $(document).on("click", "#btnYes", function() {
            var id = $(this).attr('data-id');
            window.location = '/sales/delete/' + id;
        });
    </script>

@endsection

@endsection
