@extends('scaffholding-page')
@section('title')
    {{"Order - Cart"}}
@endsection

@section('content')
<div class="card p-5">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="col-6 align-self-center">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>

            @endforeach
        </div>
    @endif
    <form action="orders/store" method="post">
        @csrf
        <div class="card-body">
            <table class="table table-striped table-left table-bordered">
                <thead>
                    <th></th>
                    <th>Product Name</th>
                    <th>Inventory</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th><a href="#" class="btn btn-success add"><i class="bi bi-plus-lg"></i></a></th>
                </thead>

                <tbody class="add-more-product">
                    <td>1</td>
                    <td>
                        <select name="product_id[]" id="product_id" class="form-select product_id">
                            <option value=""></option>
                        </select>
                    </td>
                    <td>
                        <select name="inventory_id[]" id="inventory_id" class="form-select inventory_id">
                            <option value=""></option>
                        </select>
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
                        <a href="#" class="btn btn-danger"><i class="bi bi-x-lg"></i></a>
                    </td>
                </tbody>
            </table>

            <span><h4>Total:</h4><input type="text" name="order_total" id="order_total" class="form-control order_total" value="0.00" readonly></span>

            <h3>Payment method</h3>
            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check payment_method" name="payment_method" id="payment_method1" autocomplete="off" value="cash">
                <label class="btn btn-outline-primary" for="payment_method1">Cash</label>

                <input type="radio" class="btn-check payment_method" name="payment_method" id="payment_method2" autocomplete="off" value="bank">
                <label class="btn btn-outline-primary" for="payment_method2">Bank</label>
            </div>

            <div class="container-fluid" id="payment_cash">
                <label for="amount_paid">Amount Paid</label>
                <input type="text" name="amount_paid" id="amount_paid" class="form-control w-50 mb-3" placeholder="Amount Paid">
                <label for="change">Change</label>
                <input type="text" name="change" id="change" class="form-control w-50 shadow-none" placeholder="Change" readonly>
            </div>

            <button class="btn btn-primary">Checkout</button>
        </div>
    </form>
</div>

    <script>
        let data;
        function fetchProducts(){
            $.ajax({
                url: "/cart/fetch/products",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                }, success: function (response) {
                    console.log(response)
                    populateProductOptions(response);
                }, error: function (response) {
                    console.error(response);
                }
            });
        }

        function fetchInventories(){
            $.ajax({
                url: "/cart/fetch/inventories",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                }, success: function (response) {
                    populateInventoryOptions(response);
                }, error: function (response) {
                    console.error(response);
                }
            })
        }

        function populateProductOptions(data) {
            var select = $('.product_id');
            for (const element of data) {
                select.append($('<option>', {
                    value: element[0],
                    'data-product-price': element[2],
                    text: element[1]
                }));
            }
        }

        function populateInventoryOptions(data) {
            var select = $('.inventory_id');
            for (const element of data) {
                select.append($('<option>', {
                    value: element[0],
                    text: element[1]
                }));
            }
        }

        fetchProducts();
        fetchInventories();


        $(document).ready(function (){
            setTimeout(function(){
                $("div.alert").remove();
            }, 5000 ); // 5 secs

           $('.add').on('click', function (){
               let product = $('.product_id').html();
               let inventory = $('.inventory_id').html();
               let numRow = ($('.add-more-product tr').length - 0) + 1;
               let tr =
                   '<tr><td class="row-number">' + numRow + '</td>' +
                   '<td><select name="product_id[]" id="product_id" class="form-select product_id">' + product + '</select></td>' +
                   '<td><select name="inventory_id[]" id="inventory_id" class="form-select inventory_id">' + inventory + '</select></td>' +
                   '<td><input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity"></td>' +
                   '<td><input type="text" class="form-control product_price shadow-none" name="product_price[]" id="product_price" readonly></td>' +
                   '<td><input type="text" class="form-control total shadow-none" name="total[]" id="total" readonly></td>' +
                   '<td><a href="#" class="btn btn-danger delete"><i class="bi bi-x-lg"></i></a></td></tr>';
               $('.add-more-product').append(tr);
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
               tr.find('.product_price').val(price);
               var qty = tr.find('.product_quantity').val() - 0;
               var price = tr.find('.product_price').val() - 0;
               var total = qty * price;
               tr.find('.total').val(total);
               totalAmount();
           };

           $('.add-more-product').delegate('.product_id', 'change', function () {
               var tr = $(this).closest('tr');
               calculate(tr);
           });

            $('.add-more-product').delegate('.product_quantity', 'input', function () {
                var tr = $(this).closest('tr');
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
            $('.product_price').css('cursor', 'default');
        });
    </script>
@endsection

