@extends('layouts.main')

@section('title', 'Create Sale')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <div class="container">
        <h1>Create Sale</h1>
        <form action="{{ url('/sales/store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="employee">Employee:</label>
                <select id="employeeSelect" name="employeeId" class="form-control select2" required>
                    <option value="">Select employee</option>
                </select>
            </div>

            <div class="form-group">
                <label for="customer">Customer:</label>
                <select id="customerSelect" name="customerId" class="form-control select2">
                    <option value="">Select customer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sale_date">Sale Date:</label>
                <input type="date" id="sale_date" name="saleDate" class="form-control select2" placeholder="">
            </div>

            <div class="form-group">
                <label for="products">Products:</label>
                <select id="productSelect" name="productId" class="form-control select2">
                    <option value="">Select products</option>
                </select>
            </div>
            <div class="text-right">
                <button id="addProductBtn" class="btn btn-primary">Adicionar</button>
            </div>
            <div id="productList">
                <!-- Lista de produtos adicionados -->
            </div>
            <input type="hidden" id="selectedProductsInput" name="selectedProducts[]">
            <button id="create-button" type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        setUpSelect2("#employeeSelect", "{{ route('employeesList', ['']) }}");
        setUpSelect2("#customerSelect", "{{ route('customersList', ['']) }}");
        setUptMultiSelect2("#productSelect", "{{ route('productsList', ['']) }}")

        function setUpSelect2(componentId, route) {
            $(document).ready(function() {
                $(componentId).select2({
                    theme: 'bootstrap4',
                    ajax: {
                        url: route,
                        type: "get",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                searchTerm: params.term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });
            });
        }

        function setUptMultiSelect2(componentId, route) {
            $(document).ready(function() {
                $(componentId).select2({
                    theme: 'bootstrap4',
                    ajax: {
                        url: route,
                        type: "get",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                searchTerm: params.term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });
            });
        }

        $('#addProductBtn').click(function() {
            event.preventDefault();
            var productName = $('#productSelect option:selected').text()
            var productId = $('#productSelect option:selected').val()
            addProductToList(productId, productName)
        });

        function addProductToList(productId, productName) {

            if ($('#productList').find('#product-' + productId).length > 0) {
                alert('O produto já foi adicionado.');
                return;
            }

            var productItem = $('<div class="product-item" id="product-' + productId + '">');
            var productNameElement = $('<span class="product-name">' + productName + '</span>');
            var quantityElement = $('<input type="number" class="product-quantity" value="1" data-product-id="' +
                productId + '">');

            // Adiciona os elementos à div do produto
            productItem.append(productNameElement);
            productItem.append(quantityElement);

            // Adiciona a div do produto à lista
            $('#productList').append(productItem);


            updateSelectedProductsInput();
        }

        function updateSelectedProductsInput() {
            var selectedProducts = [];

            $('.product-item').each(function() {
                var productId = $(this).attr('id').split('-')[1];
                var quantity = $(this).find('.product-quantity').val();

                selectedProducts.push(productId + ':' + quantity);
            });

            $('#selectedProductsInput').val(selectedProducts.join(','));
        }
    </script>
    <style>
        #create-button {
            margin-top: 20px;
        }

        #addProductBtn {
            margin-bottom: 20px;
        }

        .product-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .product-name {
            margin-right: 10px;
        }

        .product-quantity {
            width: 80px;
            margin-left: 10px;
        }
    </style>
@endsection
