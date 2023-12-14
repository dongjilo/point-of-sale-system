<x-layout>
<div class="card p-5">
    <div class="card-body">
        <table class="table table-striped table-left table-bordered">
            <thead>
                <th></th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th><a href="#" class="btn btn-success add"><i class="bi bi-plus-lg"></i></th>
            </thead>

            <tbody class="add-more-product">
                <td>1</td>
                <td>
                    <select name="product[]" id="product" class="form-select product">
                        <option value=""></option>
                        @foreach($products as $product)
                            <option value="{{$product->product_id}}" data-product-price="{{$product->product_price}}">{{$product->product_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity">
                </td>

                <td>
                    <input type="text" class="form-control product_price" name="product_price[]" id="product_price" readonly>
                </td>

                <td>
                    <input type="text" class="form-control total" name="total[]" id="total" readonly>
                </td>

                <td>
                    <a href="#" class="btn btn-danger"><i class="bi bi-x-lg"></i></a>
                </td>

            </tbody>
        </table>

        <span><h4>Total:</h4><p name="order-total" id="order-total" class="order-total">0.00</p></span>


        <span>
            <label for="amount-paid">Amount Paid</label>
            <input type="text" name="amount-paid" id="amount-paid" class="form-control w-50 mb-3" placeholder="Amount Paid">
            <label for="change">Change</label>
            <input type="text" name="change" id="change" class="form-control w-50" placeholder="Change" readonly>
        </span>
    </div>
</div>

    <script>
        $(document).ready(function (){
           $('.add').on('click', function (){
               var product = $('.product').html();
               var numRow = ($('.add-more-product tr').length - 0) + 1;

               var tr =
                   '<tr><td class="row-number">' + numRow + '</td>' +
                   '<td><select name="product[]" id="product" class="form-select product">' + product + '</select></td>' +
                   '<td><input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity"></td>' +
                   '<td><input type="text" class="form-control product_price" name="product_price[]" id="product_price" readonly></td>' +
                   '<td><input type="number" class="form-control total" name="total[]" id="total"></td>' +
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

               $('.order-total').html(total.toFixed(2));
           }

           function calculate(tr) {
               var price = tr.find('.product option:selected').attr('data-product-price');
               tr.find('.product_price').val(price);
               var qty = tr.find('.product_quantity').val() - 0;
               var price = tr.find('.product_price').val() - 0;
               var total = qty * price;
               tr.find('.total').val(total);
               totalAmount();
           };

           $('.add-more-product').delegate('.product', 'change', function () {
               var tr = $(this).closest('tr');
               calculate(tr);
           });

            $('.add-more-product').delegate('.product_quantity', 'input', function () {
                var tr = $(this).closest('tr');
                calculate(tr);
            });

            $('#amount-paid').on('input', function () {
                var paid = parseFloat($(this).val()) || 0;
                var total = parseFloat($('.order-total').text()) || 0;
                var change = (paid - total).toFixed(2);
                $('#change').val(change >= 0 ? change : 0);
            })
        });
    </script>
</x-layout>

