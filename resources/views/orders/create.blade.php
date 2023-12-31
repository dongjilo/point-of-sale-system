@extends('scaffholding-page')

@section('title')
    {{"Cashier - Add Order"}}
@endsection

@section('content')
    <ol class="breadcrumb rounded p-2">
        <li class="breadcrumb-item">Cashier</li>
        <li class="breadcrumb-item active">Add Order</li>
    </ol>
    @include('components.alertMessages')
    <div class="card">
        <div class="card-body">
            <form action="orders/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-8">
                        <table id="orderTable" class="table table-bordered">
                            <thead>
                            <th></th>
                            <th>Product Name</th>
                            <th>Expiry</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th><a href="#" class="btn btn-success add" id="add"><i class="fa-solid fa-plus"></i></a></th>
                            </thead>

                            <tbody class="add-more-product" id="tbody">
                            <td>1</td>
                            <td>
                                <select name="product_id[]" id="product_id" class="form-select product_id">
                                    <option value=""></option>
                                </select>
                            </td>

                            <td>
                                <input type="text" class="form-control product_expiry shadow-none" name="product_expiry[]" id="product_expiry" readonly>
                                <input type="text" class="form-control inventory_id" name="inventory_id[]" id="inventory_id" hidden="true">
                            </td>

                            <td>
                                <input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity">
                            </td>

                            <td>
                                <input type="text" class="form-control product_price shadow-none" name="product_price[]" id="product_price" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control total shadow-none" name="total[]" id="total" readonly>
                            </td>

                            <td>
{{--                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-minus"></i></a>--}}
                            </td>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4">
                        <h5 class="fw-bold">TOTAL: </h5>
                        <input type="text" name="order_total" id="order_total" class="form-control form-control-lg order_total mb-3 shadow-none" value="0.00" readonly>
                        <h5 class="fw-bold">Payment Method: </h5>
                        <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check payment_method" name="payment_method" id="payment_method1" autocomplete="off" value="Cash" checked>
                            <label class="btn btn-outline-primary" for="payment_method1">Cash</label>

                            <input type="radio" class="btn-check payment_method" name="payment_method" id="payment_method2" autocomplete="off" value="Other">
                            <label class="btn btn-outline-primary" for="payment_method2">Other</label>
                        </div>

                        <div class="row" id="select-center">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="amount_paid" id="amount_paid" class="form-control mb-3" placeholder="Amount Paid">
                                    <label for="amount_paid">Amount Paid</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating">
                            <input type="text" name="change" id="change" class="form-control shadow-none mb-3" placeholder="Change" readonly>
                            <label for="change">Change</label>
                        </div>

                        <a id="resetOrder" href="#" class="btn mt-3 btn-secondary"><i class="fa fa-fw fa-close"></i>Reset</a>
                        <button type="submit" class="btn add mt-3 float-end"  onclick="return confirm('Confirm order and checkout?')"><i class="fa fa-fw fa-credit-card"></i>Checkout</button>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let data;
        function fetchProducts(){
            $.ajax({
                url: "/orders/fetch/products",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                }, success: function (response) {
                    populateProductOptions(response);
                }, error: function (response) {
                    console.error(response);
                }
            });
        }

        function populateProductOptions(data) {
            var select = $('.product_id');
            for (const element of data) {
                select.append($('<option>', {
                    value: element.product_id,
                    'data-product-price': element.product_price,
                    'data-inventory-quantity': element.inventory_quantity,
                    'data-inventory-id': element.inventory_id,
                    'data-inventory-expiry': element.inventory_expiry,
                    text: element.product_name
                }));
            }
        }

        $(document).ready(function (){
            fetchProducts();

            setTimeout(function(){
                $("div.alert").remove();
            }, 5000 ); // 5 secs

            $('#add').on('click', function (){
                let product = $('.product_id').html();
                let numRow = ($('.add-more-product tr').length - 0) + 1;
                let tr =
                    '<tr><td class="row-number">' + numRow + '</td>' +
                    '<td><select name="product_id[]" id="product_id" class="form-select product_id">' + product + '</select></td>' +
                    '<td><input type="text" class="form-control product_expiry shadow-none" name="product_expiry[]" id="product_expiry" readonly>' +
                    '<input type="text" class="form-control inventory_id" name="inventory_id[]" id="inventory_id" hidden="true"></td>' +
                    '<td><input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity"></td>' +
                    '<td><input type="text" class="form-control product_price shadow-none" name="product_price[]" id="product_price" readonly></td>' +
                    '<td><input type="text" class="form-control total shadow-none" name="total[]" id="total" readonly></td>' +
                    '<td><a href="#" class="btn btn-danger delete"><i class="fa-solid fa-minus"></i></td></tr>';
                $('.add-more-product').append(tr);
                updateRowNumbers();
            });

            $('#resetOrder').on('click', function () {
                $('form')[0].reset();
                var firstRowHTML = $('.add-more-product tr:first').html();
                $('.add-more-product').empty();
                $('.add-more-product').append('<tr>' + firstRowHTML + '</tr>');
                updateRowNumbers();
            });

            $('.add-more-product').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                updateRowNumbers();
            });

            function updateRowNumbers() {
                $('.add-more-product tr').each(function (index) {
                    $(this).find('.row-number').html(index + 1);
                });
                totalAmount();
            }

            function totalAmount() {
                var total = 0;
                $('.total').each(function (i, e) {
                    var amount = $(this).val() - 0;
                    total += amount;
                });

                $('.order_total').val(total.toFixed(2));
            }

            function calculate(tr) {
                var price = tr.find('.product_id option:selected').attr('data-product-price');
                var available = tr.find('.product_id option:selected').attr('data-inventory-quantity');
                var expiry = tr.find('.product_id option:selected').attr('data-inventory-expiry');
                var inventory = tr.find('.product_id option:selected').attr('data-inventory-id');

                tr.find('.product_price').val(price);
                tr.find('.product_quantity').attr('max', available);
                tr.find('.product_expiry').val(expiry);
                tr.find('.inventory_id').val(inventory);

                var qty = tr.find('.product_quantity').val() - 0;
                price = tr.find('.product_price').val() - 0;
                var total = qty * price;
                tr.find('.total').val(total.toFixed(2));
                totalAmount();
            }

            function validateQuantity(tr) {
                var qty = tr.find('.product_quantity').val() - 0;
                var available = tr.find('.product_id option:selected').attr('data-inventory-quantity');
                var product = tr.find('.product_id option:selected').text();
                if (qty > available) {
                    alert(product + ' in stock: ' + available + '.');
                    tr.find('.product_quantity').val(available);
                    calculate(tr);
                }
            }

            // TODO - Prevent user from inputting duplicate products
            $('.add-more-product').delegate('.product_id', 'change', function () {
                var tr = $(this).closest('tr');
                tr.find('.product_quantity').val(1);
                calculate(tr);
            });

            $('.add-more-product').delegate('.product_quantity', 'input', function () {
                var tr = $(this).closest('tr');
                validateQuantity(tr);
                calculate(tr);
            });

            $('#amount_paid').on('input', function () {
                var paid = parseFloat($(this).val()) || 0;
                var total = parseFloat($('.order_total').val()) || 0;
                var change = (paid - total).toFixed(2);
                $('#change').val(change >= 0 ? change : 0);
            })

            $('#change').css('cursor', 'default');
            $('.total').css('cursor', 'default');
            $('#order_total').css('cursor', 'default');
            $('.product_expiry').css('cursor', 'default');
            $('.product_price').css('cursor', 'default');
        });
    </script>
@endsection
